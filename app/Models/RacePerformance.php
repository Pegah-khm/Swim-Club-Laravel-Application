<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RacePerformance extends Model
{
    /** @use HasFactory<\Database\Factories\RacePerformanceFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'squad_id',
        'event_id',
        'race_date',
        'distance',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
