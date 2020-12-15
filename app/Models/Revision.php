<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Revision extends Model
{
    use HasFactory;

    public function advise(): BelongsTo
    {
        return $this->belongsTo(Advise::class);
    }
}
