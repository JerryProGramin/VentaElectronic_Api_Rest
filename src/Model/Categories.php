<?php 

declare(strict_types = 1);

namespace Src\Model;

class Categories 
{
    public function __construct(
        private int $id,
        private string $name,
        private string $description
    ){
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description
        ];
    }
}