<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPerformance extends Model
{
    /** @use HasFactory<\Database\Factories\TrainingPerformanceFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'squad_id',
        'performance_date',
        'distance',
        'time',
        'stroke',
        'event',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }
}
