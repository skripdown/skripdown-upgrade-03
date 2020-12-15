<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'identity',
        'pic',
        'has_pic',
        'role',
        'pic_color',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student(): HasOne {
        return $this->hasOne(Student::class);
    }

    public function advisor(): HasOne {
        return $this->hasOne(Advisor::class);
    }

    public function department(): HasOne {
        return $this->hasOne(Department::class);
    }

    public function faculty(): HasOne {
        return $this->hasOne(Faculty::class);
    }

    public function super(): HasOne {
        return $this->hasOne(Super::class);
    }
}
