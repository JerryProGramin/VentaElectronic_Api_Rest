<?php 
declare (strict_types = 1);

namespace Src\Repository;

use PDO;
use Src\Database\Conexion;
use Src\Model\Users;

class UsersRepository{

    private PDO $pdo;
    public function __construct(){
        $conexion = new Conexion();
        $this->pdo = $conexion->getConexion();
    }

    public function getAll(): array
    {
        $pdo = $this->pdo;
        foreach ($pdo->query('SELECT * From users') as $fila) {
            $users[] = $fila;
        }

        return $users;
    }

    public function getById(int $usersId): Users
    {
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindParam(':id', $usersId, PDO::PARAM_INT);
        $stmt->execute();

        $users = $stmt->fetchAll();
        return new Users(
            id: $users[0]['id'],
            email: $users[0]['email'],
            password: $users[0]['password']
        );
    }
}