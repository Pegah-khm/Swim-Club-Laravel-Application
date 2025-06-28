<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $table = 'events';
    protected $fillable = [
        'name',
        'description',
        'location',
        'date',
        'time',
        'squad_id',
    ];

    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }
}
