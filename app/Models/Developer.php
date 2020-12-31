<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Developer extends Model
{
    use HasFactory;

    public static function findOrCreate($identity) {
        $user = User::findOrCreate($identity,'developer');
        if (Developer::all()->where('user_id',$user->id)->count() == 0) {
            $developer = new Developer();
            $developer->user_id = $user->id;
            $developer->save();
        }
        return Developer
            ::with([
                'user'=>function($query) use ($identity) {
                    $query->where('identity',$identity);
                }
            ])
            ->where('user_id',$user->id)
            ->first();
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
