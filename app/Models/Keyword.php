<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keyword extends Model
{
    use HasFactory;

    public static function findOrCreate($key): Keyword{
        $keyword = null;
        if (Keyword::all()->where('key',$key)->count() == 0) {
            $keyword       = new Keyword();
            $keyword->key  = $key;
            $keyword->save();
        }
        else {
            $keyword       = Keyword::all()->where('key',$key)->first();
            $keyword->year = intval(date('Y'));
        }
        return $keyword;
    }

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
