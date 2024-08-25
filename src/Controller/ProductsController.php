<?php

declare(strict_types=1);
namespace Src\Controller;

use Src\Repository\ProductsRepository;
class ProductsController {
    public function __construct(
        private ProductsRepository $productsRepository
    ) {
    }

    public function indexProducts(): void
    {
        $products = $this->productsRepository->getAll();
        echo json_encode($products);
    }

    public function showProducts(int $id): void 
    {
        $products = $this->productsRepository->getById($id);
        echo json_encode($products->jsonSerialize());
    }
}