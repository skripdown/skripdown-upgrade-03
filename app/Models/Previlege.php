<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Previlege extends Model
{
    use HasFactory;

    public function token(): BelongsTo
    {
        return $this->belongsTo(Token::class);
    }
}
