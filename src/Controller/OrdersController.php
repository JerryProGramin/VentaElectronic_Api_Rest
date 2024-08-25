<?php 

declare(strict_types = 1);

namespace Src\Controller;

use Src\Repository\OrdersRepository;

class OrdersController 
{
    public function __construct(
        private OrdersRepository $ordersRepository
    ){
    }

    public function indexOrders(): void {
        $orders = $this->ordersRepository->getAll();
        echo json_encode($orders);
    }

    public function showOrders(int $id): void {
        $orders = $this->ordersRepository->getById($id);
        echo json_encode($orders);
    }
}

