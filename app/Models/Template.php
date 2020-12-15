<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Template extends Model
{
    use HasFactory;

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function super(): BelongsTo
    {
        return $this->belongsTo(Super::class);
    }
}
