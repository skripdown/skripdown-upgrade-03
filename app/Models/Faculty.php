<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    use HasFactory;

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
