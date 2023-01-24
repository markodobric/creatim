<?php

declare(strict_types=1);

namespace App\Repository\Individual;

use App\Models\Individual;
use App\Repository\BaseRepository;

class IndividualRepository extends BaseRepository implements IndividualRepositoryInterface
{
    public function __construct(Individual $individual)
    {
        parent::__construct($individual);
    }
}
