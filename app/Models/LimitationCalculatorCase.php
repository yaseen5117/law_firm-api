<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitationCalculatorCase extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function limitation_calculator_questions()
    {
        return $this->hasMany('App\Models\LimitationCalculatorCaseQuestion');
    }
}
