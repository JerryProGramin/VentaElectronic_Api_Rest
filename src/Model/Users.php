<?php 

declare (strict_types = 1);

namespace Src\Model;

class Users 
{
    public function __construct(
        private int $id,
        private string $email,
        private ?string $password = null
    )
    {
    }
    public function jsonSerialize(): array
    {
        $data = [
            'id' => $this->id,
            'email' => $this->email,
        ];

        if(!empty($this->password)){
            $data['email'] = $this->password;
        }
        return $data;
    }
}