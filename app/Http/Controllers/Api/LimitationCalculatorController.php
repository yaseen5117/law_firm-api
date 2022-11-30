<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LimitationCalculatorCase;
use App\Models\LimitationCalculatorCaseAnswer;
use App\Models\LimitationCalculatorCaseQuestion;
use App\Models\LimitationCalculatorCaseSubAnswer;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

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
        try {
            $limitationCalculatorCase = LimitationCalculatorCase::updateOrCreate(['id' => $request->id], $request->except('editMode'));
            return response([
                "limitationCalculatorCase" => $limitationCalculatorCase,
                "message" => "Save Successfully"
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
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
        try {
            $record = LimitationCalculatorCase::find($id);

            if ($record) {
                $record->delete();
                return response([
                    "message" => "Record Deleted Successfully"
                ], 200);
            } else {
                return response('Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
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
            $caseQuestion = LimitationCalculatorCaseQuestion::with("limitationCalculatorAnswers")->where('limitation_calculator_case_id', $request->case_id)->first();

            return response([
                "caseQuestion" => $caseQuestion,
                "message" => "limitation calculator case Question and answers"
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function getLimitationCalculatorCaseQuestionsAndAnswersBYQuestionId(Request $request)
    {
        try {

            $caseQuestion = LimitationCalculatorCaseQuestion::with("limitationCalculatorAnswers", "limitationCalculatorAnswers.limitation_calculator_sub_answers")->where("id", $request->question_id)->first();
            return response([
                "caseQuestion" => $caseQuestion,
                "message" => "limitation calculator case Question and answers BY Question ID"
            ], 200);
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
    public function getAllLimitationCalculatorCaseQuestions()
    {
        try {
            $caseQuestions = LimitationCalculatorCaseQuestion::with('limitationCalculatorAnswers', 'limitation_calculator_case')->get();
            return response([
                "caseQuestions" => $caseQuestions,
                "message" => "All Questions"
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function saveQuestionAndAnswers(Request $request)
    {
        //return response($request->all(), 403);
        try {
            $question = LimitationCalculatorCaseQuestion::updateOrCreate(["id" => $request->id], $request->except('answers', 'limitation_calculator_answers'));
            $saved_answer = "";
            $subAnswers = [];
            if (!empty($request->limitation_calculator_answers)) {
                foreach ($request->limitation_calculator_answers as $answer) {
                    //Saving Answers
                    if (!empty($answer['answer'])) {
                        $saved_answer = $this->saveAnswer($answer, $question);
                        foreach ($answer["limitation_calculator_sub_answers"] as  $sub_answer)
                            //return response($sub_answer, 403);
                            if (!empty($sub_answer['sub_answer'])) {
                                //Saving Sub Answers                                        
                                $subAnswers = $this->saveSubAnswer($saved_answer, $sub_answer);
                            }
                    }
                }
            }
            return response([
                "question" => $question,
                "answers" => $saved_answer,
                "subAnswers" => $subAnswers,
                "message" => "Save Successfully"
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function saveAnswer($answer, $question)
    {
        $new_array = [
            "limitation_calculator_question_id" => $question->id,
            "answer" => $answer["answer"],
        ];
        //$answer["limitation_calculator_question_id"] = $question->id;
        $answer = LimitationCalculatorCaseAnswer::updateOrCreate(["id" => $answer["id"]], $new_array);
        return $answer;
    }
    public function saveSubAnswer($saved_answer, $sub_answer)
    {
        $sub_answer["limitation_calculator_answer_id"] = $saved_answer->id;
        $sub_answer = LimitationCalculatorCaseSubAnswer::updateOrCreate(["id" => $sub_answer["id"]], $sub_answer);
        return $sub_answer;
    }

    public function deleteLimitationCalculatorCaseQuestion($question_id)
    {
        try {
            $record = LimitationCalculatorCaseQuestion::find($question_id);

            if ($record) {
                $record->delete();
                return response([
                    "message" => "Record Deleted Successfully"
                ], 200);
            } else {
                return response('Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function deleteLimitationCalculatorCaseAnswer($answer_id)
    {
        try {
            $record = LimitationCalculatorCaseAnswer::find($answer_id);

            if ($record) {
                $record->delete();
                return response([
                    "message" => "Record Deleted Successfully"
                ], 200);
            } else {
                return response('Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function deleteLimitationCalculatorCaseSubAnswer($sub_answer_id)
    {
        try {
            $record = LimitationCalculatorCaseSubAnswer::find($sub_answer_id);

            if ($record) {
                $record->delete();
                return response([
                    "message" => "Record Deleted Successfully"
                ], 200);
            } else {
                return response('Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
