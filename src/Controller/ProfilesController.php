<?php

declare(strict_types=1);
namespace Src\Controller;

use Src\Repository\ProfilesRepository;
class ProfilesController {
    public function __construct(
        private ProfilesRepository $profilesRepository
    ) {
    }

    public function indexProfiles(): void
    {
        $profiles = $this->profilesRepository->getAll();
        echo json_encode($profiles);
    }

    public function showProfiles(int $id): void 
    {
        $profile = $this->profilesRepository->getById($id);
        echo json_encode($profile->jsonSerialize());
    }
}