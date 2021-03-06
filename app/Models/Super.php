<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Super extends Model
{
    use HasFactory;

    public static function findOrCreate($identity) {
        $user = User::findOrCreate($identity,'super');
        if (Super::all()->where('user_id',$user->id)->count() == 0) {
            $super = new Super();
            $super->user_id = $user->id;
            $super->save();
        }
        return Super
            ::with('user','faculties','documents','faculties.departments','faculties.departments.students','faculties.departments.occupations.advisor')
            ->where('identity',$identity)->first();
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function templates(): HasMany
    {
        return $this->hasMany(Template::class);
    }

    public function domains(): HasMany {
        return $this->hasMany(Domain::class);
    }

    public function token(): HasOne
    {
        return $this->hasOne(Token::class);
    }

    public function registration(): HasOne {
        return $this->hasOne(Registration::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
