<?php

namespace App\Models;

use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','school_id'];

    protected static function booted() {
        static::addGlobalScope(new SchoolScope);
    }
}
