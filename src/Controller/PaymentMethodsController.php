<?php

declare(strict_types=1);
namespace Src\Controller;

use Src\Repository\PaymentMethodsRepository;
class PaymentMethodsController {
    public function __construct(
        private PaymentMethodsRepository $paymentMethodsRepository
    ) {
    }

    public function indexPaymentMethods(): void
    {
        $paymentMethods = $this->paymentMethodsRepository->getAll();
        echo json_encode($paymentMethods);
    }

    public function showPaymentMethods(int $id): void 
    {
        $paymentMethods = $this->paymentMethodsRepository->getById($id);
        echo json_encode($paymentMethods->jsonSerialize());
    }
}