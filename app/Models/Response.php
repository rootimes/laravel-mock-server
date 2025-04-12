<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public function mock()
    {
        return $this->belongsTo(Mock::class);
    }
}
