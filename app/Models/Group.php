<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends BaseModel
{
    public function individuals(): BelongsToMany
    {
        return $this->belongsToMany(Individual::class);
    }
}
