<?php 
declare(strict_types = 1);

namespace Src\Repository;

use PDO;
use Src\Database\Conexion;
use Src\Model\PaymentMethods;
use Src\Model\Users;

class OrdersRepository
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
        foreach ($pdo->query('SELECT * From orders') as $fila) {
            $orders[] = $fila;
        }

        return $orders;
    }

    public function getById(int $id): array
    {
        $query = 'SELECT o.*, u.id as user_id, u.email, p.id as payment_method_id, p.name, p.details
                FROM orders o
                INNER JOIN users u ON o.user_id = u.id
                INNER JOIN payment_methods p ON o.payment_method_id = p.id
                WHERE o.id = :id';
                
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($order === false) {            
            return null;
        }    

        $user = new Users(
            id: (int)$order['user_id'],
            email: $order['email'],
        );
        $paymentMethod = new PaymentMethods(
            id: (int)$order['payment_method_id'],
            name: $order['name'],
            details: $order['details']
        );
        return [
            'id' => (int)$order['id'],
            'user' => $user->jsonSerialize(),
            'date' => $order['date'],
            'payment_method' => $paymentMethod->jsonSerialize(),
            'total' => $order['total'],
            'order_number' => $order['order_number']
        ];
    }
}