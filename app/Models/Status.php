<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;
    
    // Een status kan gekoppeld zijn aan meerdere malfuncties
    public function malfunctions()
    {
        return $this->hasMany(Malfunction::class);
    }
}
