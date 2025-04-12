<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    public function schema()
    {
        return $this->belongsTo(Schema::class);
    }
}
