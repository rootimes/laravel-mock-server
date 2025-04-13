<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Response extends Model
{
    public function mocks(): HasMany
    {
        return $this->hasMany(Mock::class);
    }
}
