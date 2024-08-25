<?php 
declare(strict_types = 1);

namespace Src\Repository;

use PDO;
use Src\Database\Conexion;
use Src\Model\Users;
use Src\Model\PaymentMethods;
use Src\Model\OrderProduct;
use Src\Model\Orders;
use Src\Model\Suppliers;
use Src\Model\Categories;
use Src\Model\Products;
use DateTime;

class OrderProductRepository
{
    private PDO $pdo;
    public function __construct()
    {
        $conexion = new Conexion();
        $this->pdo = $conexion->getConexion();
    }

    public function getAll(): array
    {
        $pdo = $this->pdo;
        foreach ($pdo->query('SELECT * From order_product') as $fila) {
            $orderProduct[] = $fila;
        }

        return $orderProduct;
    }

    public function getById(int $id): ?array
{
    $query = 'SELECT 
                op.id AS order_product_id,
                op.price_unit AS order_product_price_unit,
                op.quantity AS order_product_quantity,
                op.subtotal AS order_product_subtotal,
                o.id AS order_id,
                o.date AS order_date,
                o.total AS order_total,
                o.order_number AS order_number,
                p.id AS product_id,
                p.name AS product_name,
                p.description AS product_description,
                p.price AS product_price,
                p.stock AS product_stock,
                p.category_id AS product_category_id,
                p.supplier_id AS product_supplier_id,
                u.id AS user_id,
                u.email AS user_email,
                pm.id AS payment_method_id,
                pm.name AS payment_method_name,
                pm.details AS payment_method_details,
                c.id AS category_id,
                c.name AS category_name,
                c.description AS category_description,
                s.id AS supplier_id,
                s.name AS supplier_name,
                s.contact_info AS supplier_contact_info
            FROM order_product op
            INNER JOIN orders o ON op.order_id = o.id
            INNER JOIN products p ON op.product_id = p.id
            INNER JOIN users u ON o.user_id = u.id
            INNER JOIN payment_methods pm ON o.payment_method_id = pm.id
            INNER JOIN categories c ON p.category_id = c.id
            INNER JOIN suppliers s ON p.supplier_id = s.id
            WHERE op.id = :id';

    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($order === false) {
        return null;
    }

    $dateOrder = new DateTime($order['order_date']);

    $user = new Users(
        id: (int)$order['user_id'],
        email: $order['user_email']
    );

    $paymentMethod = new PaymentMethods(
        id: (int)$order['payment_method_id'],
        name: $order['payment_method_name'],
        details: $order['payment_method_details']
    );

    $orders = new Orders(
        id: (int)$order['order_id'],
        userId: $user,
        date: $dateOrder,
        paymentMethodId: $paymentMethod,
        total: (float)$order['order_total'],
        orderNumber: $order['order_number']
    );

    $supplier = new Suppliers(
        id: (int)$order['supplier_id'],
        name: $order['supplier_name'],
        contactInfo: $order['supplier_contact_info']
    );

    $category = new Categories(
        id: (int)$order['category_id'],
        name: $order['category_name'],
        description: $order['category_description']
    );

    $products = new Products(
        id: (int)$order['product_id'],
        name: $order['product_name'],
        description: $order['product_description'],
        price: isset($order['product_price']) ? (float)$order['product_price'] : 0.0,
        stock: (int)$order['product_stock'],
        supplierId: $supplier,
        categoryId: $category
    );

    return [
        'id' => (int)$order['order_product_id'],
        'order_id' => $orders->jsonSerialize(),
        'product_id' => $products->jsonSerialize(),
        'price_unit' => isset($order['order_product_price_unit']) ? (float)$order['order_product_price_unit'] : 0.0,
        'quantity' => (int)$order['order_product_quantity'],
        'subtotal' => isset($order['order_product_subtotal']) ? (float)$order['order_product_subtotal'] : 0.0,
    ];
}

}
