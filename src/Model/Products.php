<?php

declare(strict_types = 1);

namespace Src\Model;

class Products
{

    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private float $price,
        private int $stock,
        private Categories $categoryId,
        private Suppliers $supplierId
    ) {
    }
    public function jsonSerialize(): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
            
        if(!empty($this->price)){
            $data['price'] = $this->price;
        }

        if(!empty($this->stock)){
            $data['stock'] = $this->stock;
        }

        if(!empty($this->categoryId)){
            $data['category_id'] = $this->categoryId;
        }

        if(!empty($this->supplierId)){
            $data['supplier_id'] = $this->supplierId;
        }

        return $data;
    }
}