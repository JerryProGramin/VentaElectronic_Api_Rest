<?php 
declare(strict_types = 1);

namespace Src\Repository;

use PDO;
use Src\Database\Conexion;
use Src\Model\Categories;

class CategoriesRepository
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
        foreach ($pdo->query('SELECT * From categories') as $fila) {
            $categories[] = $fila;
        }

        return $categories;
    }

    public function getById(int $categoriesId): Categories
    {
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->bindParam(':id', $categoriesId, PDO::PARAM_INT);
        $stmt->execute();

        $categories = $stmt->fetchAll();
        return new Categories(
            id: $categories[0]['id'],
            name: $categories[0]['name'],
            description: $categories[0]['description']
        );
    }
}