<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        $answers = $question->answers;
        return view('admin.answer.answer', compact('question', 'answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Question $question)
    {
        return view('admin.answer.answer-edit', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        Answer::create([
            'a_question_id' => $question->q_id,
            'a_name_ru' => $request->a_name_ru,
            'a_name_kz' => $request->a_name_kz,
            'a_name_en' => $request->a_name_en,
            'a_is_correct' => $request->a_is_correct
        ]);

        return redirect('/admin/'.$question->q_id.'/answers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Answer $answer)
    {
        return view('admin.answer.answer-edit', compact('question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, Answer $answer)
    {
        $answer->update([
            'a_name_ru' => $request->a_name_ru,
            'a_name_kz' => $request->a_name_kz,
            'a_name_en' => $request->a_name_en,
            'a_is_correct' => $request->a_is_correct
        ]);

        return redirect('/admin/'.$question->q_id.'/answers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer)
    {
        $answer->delete();
    }
}
