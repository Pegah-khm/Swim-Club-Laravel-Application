<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'password',
        'forename',
        'surname',
        'dob',
        'email',
        'phone',
        'address',
        'postcode',
        'role',
        'squad_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'dob' => 'date',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relationships
     */
    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }

    public function coachedSquad()
    {
        return $this->hasOne(Squad::class, 'coach_id');
    }


    public function trainingPerformances()
    {
        return $this->hasMany(TrainingPerformance::class);
    }
//    protected function casts(): array
//    {
//        return [
//            'dob' => 'date',
//            'email_verified_at' => 'datetime',
//            'password' => 'hashed',
//        ];
//    }
}
