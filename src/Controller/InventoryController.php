<?php 

declare(strict_types = 1);

namespace Src\Controller;

use Src\Repository\InventoryRepository;

class InventoryController 
{
    public function __construct(
        private InventoryRepository $inventoryRepository
    ){
    }

    public function indexInventory(): void {
        $inventory = $this->inventoryRepository->getAll();
        echo json_encode($inventory);
    }

    public function showInventory(int $id): void {
        $inventory = $this->inventoryRepository->getById($id);
        echo json_encode($inventory->jsonSerialize());
    }
}