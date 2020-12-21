<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    use HasFactory;

    public static function findOrCreate($identity) {
        $user = User::findOrCreate($identity,'faculty');
        if (Faculty::all()->where('user_id',$user->id)->count() == 0) {
            $faculty = new Faculty();
            $faculty->user_id = $user->id;
            $faculty->save();
        }
        return Faculty
            ::with('user','departments','departments.documents','departments.documents.student','departments.occupations.advisor')
            ->where('identity',$identity)->first();
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function super(): BelongsTo
    {
        return $this->belongsTo(Super::class);
    }
}
