<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Department extends Model
{
    use HasFactory;

    public static function findOrCreate($identity) {
        $user = User::findOrCreate($identity,'department');
        if (Department::all()->where('user_id',$user->id)->count() == 0) {
            $department = new Faculty();
            $department->user_id = $user->id;
            $department->save();
        }
        return Department
            ::with('user','faculty','super','occupations.advisor','documents','documents.student')
            ->where('identity',$identity)->first();
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function occupations(): HasMany
    {
        return $this->hasMany(Occupation::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function department_keywords(): HasMany
    {
        return $this->hasMany(DepartmentKeyword::class);
    }

    public function plagiarism(): HasOne
    {
        return $this->hasOne(Plagiarism::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }
}
