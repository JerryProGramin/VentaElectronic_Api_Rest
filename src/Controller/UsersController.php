<?php 

declare(strict_types = 1);

namespace Src\Controller;

use Src\Repository\UsersRepository;

class UsersController {
    public function __construct(
        private UsersRepository $userRepository
    ) {
    }

    public function indexUsers(): void 
    {
        $users = $this->userRepository->getAll();
        echo json_encode($users);
    }

    public function showUsers(int $id): void 
    {
        $user = $this->userRepository->getById($id);
        echo json_encode($user->jsonSerialize());
    }
}