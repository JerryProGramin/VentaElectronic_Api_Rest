<?php 
declare(strict_types = 1);

namespace Src\Repository;

use PDO;
use Src\Database\Conexion;
use Src\Model\PaymentMethods;

class PaymentMethodsRepository
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
        foreach ($pdo->query('SELECT * From payment_methods') as $fila) {
            $paymentMethods[] = $fila;
        }

        return $paymentMethods;
    }

    public function getById(int $paymentMethodsId): PaymentMethods
    {
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM payment_methods WHERE id = :id');
        $stmt->bindParam(':id', $paymentMethodsId, PDO::PARAM_INT);
        $stmt->execute();

        $paymentMethod = $stmt->fetchAll();
        return new PaymentMethods(
            id: $paymentMethod[0]['id'],
            name: $paymentMethod[0]['name'],
            details: $paymentMethod[0]['details']
        );
    }
}