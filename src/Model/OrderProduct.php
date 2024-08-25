<?php 

declare (strict_types = 1);

namespace Src\Model;

class OrderProduct 
{
    public function __construct(
        private int $id,
        private Orders $orderId,
        private Products $productId,
        private int $quantity,
        private float $subtotal
    ){
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'orderId' => $this->orderId->jsonSerialize(),
            'productId' => $this->productId->jsonSerialize(),
            'quantity' => $this->quantity,
            'subtotal' => $this->subtotal
        ];
    }
}