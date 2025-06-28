<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    /** @use HasFactory<\Database\Factories\SquadFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'coach_id'
    ];


    /**
     * Relationships
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function swimmers()
    {
        return $this->hasMany(User::class, 'squad_id')->where('role', 'swimmer');
    }

    public function coaches()
    {
        return $this->belongsTo(User::class, 'coach_id')->where('role', 'coach');
    }
    public function trainingPerformances()
    {
        return $this->hasMany(TrainingPerformance::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
