<?php

declare(strict_types=1);
namespace Src\Controller;

use Src\Repository\SuppliersRepository;

class SuppliersController {
    public function __construct(
        private SuppliersRepository $suppliersRepository
    ){
    }

    public function indexSuppliers(): void {
        $suppliers = $this->suppliersRepository->getAll();
        echo json_encode($suppliers);
    }

    public function showSuppliers(int $id): void {
        $supplier = $this->suppliersRepository->getById($id);
        echo json_encode($supplier->jsonSerialize());
    }
}