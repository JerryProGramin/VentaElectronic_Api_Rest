<?php 
declare(strict_types = 1);

namespace Src\Repository;

use PDO;
use Src\Database\Conexion;
use Src\Model\Inventory;

class InventoryRepository
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
        foreach ($pdo->query('SELECT * From inventory') as $fila) {
            $inventory[] = $fila;
        }

        return $inventory;
    }

    public function getById(int $inventoryId): Inventory
    {
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM inventory WHERE id = :id');
        $stmt->bindParam(':id', $inventoryId, PDO::PARAM_INT);
        $stmt->execute();

        $inventory = $stmt->fetchAll();
        return new Inventory(
            id: $inventory[0]['id'],
            productId: $inventory[0]['product_id'],
            quantity: $inventory[0]['quantity'],
            lastUpdated: $inventory[0]['last_updated']
        );
    }
}