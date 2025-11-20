<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ["cnpj","name","email"];

    public function getCnpjFormattedAttribute()
    {
        return preg_replace(
            '/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/',
            '$1.$2.$3/$4-$5',
            $this->cnpj
        );
    }

    public function setCnpjAttribute($value)
    {
        $this->attributes['cnpj'] = preg_replace('/\D/', '', $value);
    }
}
