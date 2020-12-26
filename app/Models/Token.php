<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Token extends Model
{
    use HasFactory;

    public static function make(): string {
        $token = self::makeToken();
        while (Token::all()->where('token',$token)->count() > 1) {
            $token = self::makeToken();
        }
        return $token;
    }

    private static function makeToken(): string {
        $alphabet = '_-abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $token    = '';
        $length   = strlen($alphabet);
        for ($i = 0; $i < 70; $i++) {
            $token .= $alphabet[rand(0, $length - 1)];
        }
        return $token;
    }

    public function previlege(): HasOne
    {
        return $this->hasOne(Previlege::class);
    }

    public function super(): BelongsTo
    {
        return $this->belongsTo(Super::class);
    }
}
