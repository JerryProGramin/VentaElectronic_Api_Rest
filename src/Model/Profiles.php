<?php 

declare (strict_types = 1);

namespace Src\Model;

class Profiles
{

    public function __construct(
        private int $id,
        private Users $user_id,
        private string $name,
        private string $lastName,
        private string $nameUser,
        private string $dni,
    ){
    }
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id->jsonSerialize(),
            'name' => $this->name,
            'lastName' => $this->lastName,
            'nameUser' => $this->nameUser,
            'dni' => $this->dni,
        ];
    }
}