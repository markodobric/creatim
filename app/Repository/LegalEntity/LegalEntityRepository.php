<?php

declare(strict_types=1);

namespace App\Repository\LegalEntity;

use App\Models\LegalEntity;
use App\Repository\BaseRepository;

class LegalEntityRepository extends BaseRepository implements LegalEntityRepositoryInterface
{
    public function __construct(LegalEntity $legalEntity)
    {
        parent::__construct($legalEntity);
    }
}
