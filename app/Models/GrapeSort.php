<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrapeSort extends Model
{
    public function wines()
    {
        return $this->belongsToMany(Wine::class);
    }
}
