<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitationCalculatorCaseSubAnswer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function limitationCalculatorCaseAnswer()
    {
        return $this->belongsTo('App\Models\LimitationCalculatorCaseAnswer', "limitation_calculator_answer_id", "id");
    }
}
