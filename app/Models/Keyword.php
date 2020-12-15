<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keyword extends Model
{
    use HasFactory;

    public function document_keywords(): HasMany
    {
        return $this->hasMany(DocumentKeyword::class);
    }

    public function advisor_keywords(): HasMany
    {
        return $this->hasMany(AdvisorKeyword::class);
    }

    public function department_keywords(): HasMany
    {
        return $this->hasMany(DepartmentKeyword::class);
    }
}
