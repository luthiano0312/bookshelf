<?php

namespace App\Models;

use Carbon\Carbon;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ["studentName","book_id","returnDate","school_id"];

    public function getReturnDateFormattedAttribute()
    {
        return Carbon::parse($this->returnDate)->format('d/m/Y');
    }

    public function setReturnDateAttribute($value)
    {
        if (preg_match('/\d{2}\/\d{2}\/\d{4}/', $value)) {
            $value = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }

        $this->attributes['returnDate'] = $value;
    }

    protected static function booted() {
        static::addGlobalScope(new SchoolScope);
    }
}
