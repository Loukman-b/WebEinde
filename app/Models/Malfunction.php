<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class malfunction extends Model
{
    use HasFactory;

    // Een storing behoort tot één machine
    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    // Een storing heeft één status
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    // Een storing kan toegewezen zijn aan één gebruiker
    public function user()
    {
        return $this->belongsTo(User::class)->nullable();
    }
}
