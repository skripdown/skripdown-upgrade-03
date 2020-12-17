<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

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

    public static function findOrCreate(
        $identity,
        $role  = 'student',
        $name  = 'temp_name',
        $email = 'temp_email',
        $pass  = 'temp_pass'
    ): User {
        if (User::all()->where('identity',$identity)->count() == 0) {
            $temp_user = new User();
            $temp_user->identity = $identity;
            $temp_user->name     = $name;
            $temp_user->email    = $email;
            $temp_user->role     = $role;
            $temp_user->password = Hash::make($pass);
            $temp_user->save();
            return $temp_user;
        }
        return User::all()->where('identity',$identity)->first();
    }

    public function scopeRole($query, $type = 'super') {
        return $query->where('role',$type);
    }

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
