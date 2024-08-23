<?php 

declare (strict_types = 1);

namespace Src\Model;

class PaymentMethods
{
    public function __construct(
        private int $id,
        private string $name,
        private string $details
    ){
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'details' => $this->details
        ];
    }
}