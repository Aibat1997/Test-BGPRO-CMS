<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QuestionImport;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Test $test)
    {
        $questions = $test->questions()->where('q_is_active', 1)->get();
        return view('admin.question.question', compact('test', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Test $test)
    {
        return view('admin.question.question-edit', compact('test'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Test $test)
    {
        if ($request->hasFile('q_file')) {
            Excel::import(new QuestionImport(['test_id' => $test->t_id, 'lang' => $request->lang]), $request->file('q_file'));
            return redirect('/admin/'.$test->t_id.'/questions');
        } 

        Question::create([
            'q_test_id' => $test->t_id,
            'q_name' => $request->q_name,
            'q_lang' => $request->q_lang,
            // 'q_name_ru' => $request->q_name_ru,
            // 'q_name_kz' => $request->q_name_kz,
            // 'q_name_en' => $request->q_name_en
        ]);

        return redirect('/admin/'.$test->t_id.'/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function createExcel(Test $test)
    {
        return view('admin.question.question-excel', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test, Question $question)
    {
        return view('admin.question.question-edit', compact('test', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test, Question $question)
    {
        $question->update([
            'q_name' => $request->q_name,
            'q_lang' => $request->q_lang,
            // 'q_name_ru' => $request->q_name_ru,
            // 'q_name_kz' => $request->q_name_kz,
            // 'q_name_en' => $request->q_name_en
        ]);

        return redirect('/admin/'.$test->t_id.'/questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test, Question $question)
    {
        $question->delete();
    }
}
