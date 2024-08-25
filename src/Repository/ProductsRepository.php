<?php 
declare (strict_types = 1);

namespace Src\Repository;

use PDO;
use Src\Database\Conexion;
use Src\Model\Products;

class ProductsRepository{

    private PDO $pdo;
    public function __construct(){
        $conexion = new Conexion();
        $this->pdo = $conexion->getConexion();
    }

    public function getAll(): array
    {
        $pdo = $this->pdo;
        foreach ($pdo->query('SELECT * From products') as $fila) {
            $products[] = $fila;
        }

        return $products;
    }

    public function getById(int $productsId): Products
    {
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->bindParam(':id', $productsId, PDO::PARAM_INT);
        $stmt->execute();

        $products = $stmt->fetchAll();
        return new Products(
            id: $products[0]['id'],
            name: $products[0]['name'],
            description: $products[0]['description'],
            price: $products[0]['price'],
            stock: $products[0]['stock'],
            categoryId: $products[0]['category_id'],
            supplierId: $products[0]['supplier_id'],
        );
    }
}