<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Advisor extends Model
{
    use HasFactory;

    public function advises(): HasMany
    {
        return $this->hasMany(Advise::class);
    }

    public function occupations(): HasMany
    {
        return $this->hasMany(Occupation::class);
    }

    public function examiners(): HasMany
    {
        return $this->hasMany(Examiner::class);
    }

    public function proposals(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }

    public function rejected_proposals(): HasMany
    {
        return $this->hasMany(RejectedProposal::class);
    }

    public function advisor_keywords(): HasMany
    {
        return $this->hasMany(AdvisorKeyword::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
