<?php 
declare (strict_types = 1);

namespace Src\Repository;

use PDO;
use Src\Database\Conexion;
use Src\Model\Profiles;

class ProfilesRepository{

    private PDO $pdo;
    public function __construct(){
        $conexion = new Conexion();
        $this->pdo = $conexion->getConexion();
    }

    public function getAll(): array
    {
        $pdo = $this->pdo;
        foreach ($pdo->query('SELECT * From profiles') as $fila) {
            $profiles[] = $fila;
        }

        return $profiles;
    }

    public function getById(int $profilesId): Profiles
    {
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM profiles WHERE id = :id');
        $stmt->bindParam(':id', $profilesId, PDO::PARAM_INT);
        $stmt->execute();

        $profiles = $stmt->fetchAll();
        return new Profiles(
            id: $profiles[0]['id'],
            user_id: $profiles[0]['user_id'],
            name: $profiles[0]['name'],
            lastName: $profiles[0]['last_name'],
            nameUser: $profiles[0]['name_user'],
            dni: $profiles[0]['dni']
        );
    }
}