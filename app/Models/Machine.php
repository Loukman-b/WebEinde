<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class machine extends Model
{
    use HasFactory;

    // Een machine kan meerdere malfuncties hebben
    public function malfunctions()
    {
        return $this->hasMany(Malfunction::class);
    }
}
