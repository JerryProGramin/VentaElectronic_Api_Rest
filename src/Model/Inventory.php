<?php 

declare(strict_types = 1);

namespace Src\Model;
use DateTime;

class Inventory
{
    public function __construct(
        private int $id,
        private Products $productId,
        private int $quantity,
        private DateTime $lastUpdated
    ){
    }
    
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'productId' => $this->productId,
            'quantity' => $this->quantity,
            'lastUpdated' => $this->lastUpdated
        ];
    }
}