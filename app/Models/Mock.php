<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mock extends Model
{
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function auth(): BelongsTo
    {
        return $this->belongsTo(Auth::class);
    }

    public function usage(): BelongsTo
    {
        return $this->belongsTo(Usage::class);
    }

    public function parameter(): HasMany
    {
        return $this->hasMany(Parameter::class);
    }

    public function response(): HasOne
    {
        return $this->hasOne(Response::class);
    }
}
