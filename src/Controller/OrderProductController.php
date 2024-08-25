<?php 

declare(strict_types = 1);

namespace Src\Controller;

use Src\Repository\OrderProductRepository;

class OrderProductController 
{
    public function __construct(
        private OrderProductRepository $orderProductRepository
    ){
    }

    public function indexOrderProduct(): void {
        $orderProduct = $this->orderProductRepository->getAll();
        echo json_encode($orderProduct);
    }

    public function showOrderProduct(int $id): void {
        $orderProduct = $this->orderProductRepository->getById($id);
        echo json_encode($orderProduct);
    }
}
