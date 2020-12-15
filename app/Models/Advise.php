<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Advise extends Model
{
    use HasFactory;

    public function revisions(): HasMany
    {
        return $this->hasMany(Revision::class);
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function advisor(): BelongsTo
    {
        return $this->belongsTo(Advisor::class);
    }
}
