<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        return User::with('super')->where('identity',$identity)->first();
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
