<?php 
declare (strict_types = 1);

namespace Src\Repository;

use PDO;
use Src\Database\Conexion;
use Src\Model\Suppliers;

class SuppliersRepository{

    private PDO $pdo;
    public function __construct(){
        $conexion = new Conexion();
        $this->pdo = $conexion->getConexion();
    }

    public function getAll(): array
    {
        $pdo = $this->pdo;
        foreach ($pdo->query('SELECT * From suppliers') as $fila) {
            $Suppliers[] = $fila;
        }

        return $Suppliers;
    }

    public function getById(int $SuppliersId): Suppliers
    {
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM suppliers WHERE id = :id');
        $stmt->bindParam(':id', $SuppliersId, PDO::PARAM_INT);
        $stmt->execute();

        $Suppliers = $stmt->fetchAll();
        return new Suppliers(
            id: $Suppliers[0]['id'],
            name: $Suppliers[0]['name'],
            contactInfo: $Suppliers[0]['contact_info'],
            phone: $Suppliers[0]['phone'],
            email: $Suppliers[0]['email'],
            address: $Suppliers[0]['address'],
            country: $Suppliers[0]['country']
        );
    }
}