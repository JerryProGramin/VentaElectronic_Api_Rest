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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'category_id' => $this->categoryId->jsonSerialize(),
            'supplier_id' => $this->supplierId->jsonSerialize()
        ];
    }
}