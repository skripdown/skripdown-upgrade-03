<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
    use HasFactory;

    public function advises(): HasMany
    {
        return $this->hasMany(Advise::class);
    }

    public function proposals(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }

    public function rejected_proposals(): HasMany
    {
        return $this->hasMany(RejectedProposal::class);
    }

    public function document_keywords(): HasMany
    {
        return $this->hasMany(DocumentKeyword::class);
    }

    public function exam(): HasOne
    {
        return $this->hasOne(Exam::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function super(): BelongsTo
    {
        return $this->belongsTo(Super::class);
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
