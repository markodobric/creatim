<?php

declare(strict_types=1);

namespace App\Actions\Group;

use App\Models\Group;
use App\Repository\Group\GroupRepositoryInterface;

class CreateGroupAction
{
    public function __construct(private GroupRepositoryInterface $groupRepository)
    {
    }

    public function __invoke(array $individualIds): Group
    {
        /** @var Group $group */
        $group = $this->groupRepository->create([]);

        $group->individuals()->sync($individualIds);

        return $group;
    }
}
