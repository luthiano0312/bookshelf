<?php

namespace App\Models;

use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ["title","author","school_id","category_id"];

    protected static function booted() {
        static::addGlobalScope(new SchoolScope);
    }
}
