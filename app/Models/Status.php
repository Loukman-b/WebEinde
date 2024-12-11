<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    // De $fillable array maakt het mogelijk om nieuwe statussen aan te maken of bestaande te updaten.
    protected $fillable = [
        'name',
    ];
}
