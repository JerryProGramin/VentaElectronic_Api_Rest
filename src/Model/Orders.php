<?php 

declare (strict_types = 1);

namespace Src\Model;
use DateTime;

class Orders 
{
    public function __construct(
        private int $id,
        private Users $userId,
        private DateTime $date,
        private PaymentMethods $paymentMethodId,
        private float $total,
        private string $orderNumber
    ){
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'userId' => $this->userId->jsonSerialize(),
            'date' => $this->date,
            'paymentMethodId' => $this->paymentMethodId->jsonSerialize(),
            'total' => $this->total,
            'orderNumber' => $this->orderNumber
        ];
    }
}