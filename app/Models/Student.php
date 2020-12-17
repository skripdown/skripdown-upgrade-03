<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    public static function findOrCreate($identity) {
        $user = User::findOrCreate($identity);
        if (Student::all()->where('user_id',$user->id)->count() == 0) {
            $student = new Student();
            $student->user_id = $user->id;
            $student->save();
        }
        return User::with('student')->where('identity',$identity)->first();
    }

    public function document(): HasOne
    {
        return $this->hasOne(Document::class);
    }

    public function proposals(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }

    public function exam(): HasOne
    {
        return $this->hasOne(Exam::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
