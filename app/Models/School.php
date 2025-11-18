<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ["cnpj","name","email"];

    public function users()
    {
        return $this->hasMany(User::class, 'school_id');
    }
}
