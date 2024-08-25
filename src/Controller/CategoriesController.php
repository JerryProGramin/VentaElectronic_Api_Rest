<?php 

declare(strict_types = 1);

namespace Src\Controller;

use Src\Repository\CategoriesRepository;

class CategoriesController 
{
    public function __construct(
        private CategoriesRepository $categoriesRepository
    ){
    }

    public function indexCategories(): void {
        $categories = $this->categoriesRepository->getAll();
        echo json_encode($categories);
    }

    public function showCategories(int $id): void {
        $category = $this->categoriesRepository->getById($id);
        echo json_encode($category->jsonSerialize());
    }
}

