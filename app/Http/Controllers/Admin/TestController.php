<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Programm;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Programm $programm)
    {
        $tests = $programm->tests;
        return view('admin.test.test', compact('programm', 'tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Programm $programm)
    {
        return view('admin.test.test-edit', compact('programm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Programm $programm, Request $request)
    {
        Test::create([
            't_programm_id' => $programm->p_id,
            't_name_ru' => $request->t_name_ru,
            't_name_kz' => $request->t_name_kz,
            't_name_en' => $request->t_name_en,
            't_attempts' => $request->t_attempts,
            't_sort_num' => $request->t_sort_num
        ]);

        return redirect('/admin/'.$programm->p_id.'/tests');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Programm $programm, Test $test)
    {
        return view('admin.test.test-edit', compact('programm', 'test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programm $programm, Test $test)
    {
        $test->update([
            't_name_ru' => $request->t_name_ru,
            't_name_kz' => $request->t_name_kz,
            't_name_en' => $request->t_name_en,
            't_attempts' => $request->t_attempts,
            't_sort_num' => $request->t_sort_num
        ]);

        return redirect('/admin/'.$programm->p_id.'/tests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programm $programm, Test $test)
    {
        $test->delete();
    }
}
