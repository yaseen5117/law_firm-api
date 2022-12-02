<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LimitationCalculatorCase;
use App\Models\LimitationCalculatorCaseAnswer;
use App\Models\LimitationCalculatorCaseQuestion;
use App\Models\LimitationCalculatorCaseSubAnswer;
use Illuminate\Http\Request;

class LimitationCalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getLimitationCalculatorCases()
    {
        try {
            $limitation_calculator_cases = LimitationCalculatorCase::get();
            return response([
                'limitation_calculator_cases' => $limitation_calculator_cases,
                'message' => 'all limitation calculator cases'
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getLimitationCalculatorCaseQuestions(Request $request)
    {
        try {
            $caseQuestion = LimitationCalculatorCaseQuestion::where('limitation_calculator_case_id', $request->case_id)->first();
            $caseQuestionAnswers = null;
            if ($caseQuestion) {
                $caseQuestionAnswers = $this->limitationCalculatorCaseQuestionAnswers($caseQuestion->id);
            }
            return response([
                "caseQuestion" => $caseQuestion,
                "caseQuestionAnswers" => $caseQuestionAnswers,
                "message" => "limitation calculator case Question and answers"
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function limitationCalculatorCaseQuestionAnswers($question_id)
    {
        try {
            $caseQuestionAnswers = LimitationCalculatorCaseAnswer::where('limitation_calculator_question_id', $question_id)->get();
            return $caseQuestionAnswers;
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getlimitationCalculatorCaseSubAnswers(Request $request)
    {
        try {
            $subAnswers = LimitationCalculatorCaseSubAnswer::where("limitation_calculator_answer_id", $request->anser_id)->get();
            return response([
                "subAnswers" => $subAnswers,
                "message" => "All Sub Answers against answer ID: " . $request->anser_id,
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
