<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitationCalculatorCaseQuestion extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function limitationCalculatorAnswers()
    {
        return $this->hasMany('App\Models\LimitationCalculatorCaseAnswer', 'limitation_calculator_question_id');
    }
    public function limitation_calculator_case()
    {
        return $this->belongsTo('App\Models\LimitationCalculatorCase');
    }
}
