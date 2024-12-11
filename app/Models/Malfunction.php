<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class malfunction extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'status_id',
        'user_id',
        'description',
        'finished_at',
    ];

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
        return $this->belongsTo(User::class); // Een storing behoort tot een gebruiker
    }
}
