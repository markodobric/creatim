<?php

declare(strict_types=1);

namespace App\Repository\Group;

use App\Models\Group;
use App\Repository\BaseRepository;

class GroupRepository extends BaseRepository implements GroupRepositoryInterface
{
    public function __construct(Group $group)
    {
        parent::__construct($group);
    }
}
