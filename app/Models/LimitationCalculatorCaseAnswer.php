<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitationCalculatorCaseAnswer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function limitation_calculator_sub_answers()
    {
        return $this->hasMany('App\Models\LimitationCalculatorCaseSubAnswer', "limitation_calculator_answer_id");
    }
    public function limitation_calculator_question()
    {
        return $this->belongsTo('App\Models\LimitationCalculatorCaseQuestion');
    }
}
