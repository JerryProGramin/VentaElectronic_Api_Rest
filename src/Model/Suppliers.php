<?php 

declare(strict_types = 1);

namespace Src\Model;

class Suppliers
{
    public function __construct(
        private int $id,
        private string $name,
        private string $contactInfo,
        private ?string $phone = null,
        private ?string $email = null,
        private ?string $address = null,
        private ?string $country = null
    ){
    }

    public function jsonSerialize(): array
    {
        $data = [
            'id' => $this->id,
        ];
            
        if(!empty($this->name)){
            $data['name'] = $this->name;
        }

        if(!empty($this->contactInfo)){
            $data['contact_info'] = $this->contactInfo;
        }

        if(!empty($this->phone)){
            $data['phone'] = $this->phone;
        }
    
        if(!empty($this->email)){
            $data['email'] = $this->email;
        }

        if(!empty($this->address)){
            $data['address'] = $this->address;
        }

        if(!empty($this->country)){
            $data['country'] = $this->country;
        }
        return $data;
    }
}