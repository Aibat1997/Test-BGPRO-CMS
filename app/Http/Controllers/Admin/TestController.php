<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();
        return view('admin.test.test', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.test.test-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lang = "";
        foreach ($request->t_lang as $value) {
            $lang .= $value;
        }

        Test::create([
            't_name_ru' => $request->t_name_ru,
            't_name_kz' => $request->t_name_kz,
            't_name_en' => $request->t_name_en,
            't_sort_num' => $request->t_sort_num,
            't_lang' => $lang
        ]);

        return redirect('/admin/tests');
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
    public function edit(Test $test)
    {
        return view('admin.test.test-edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        $lang = "";
        foreach ($request->t_lang as $value) {
            $lang .= $value;
        }

        $test->update([
            't_name_ru' => $request->t_name_ru,
            't_name_kz' => $request->t_name_kz,
            't_name_en' => $request->t_name_en,
            't_sort_num' => $request->t_sort_num,
            't_lang' => $lang
        ]);

        return redirect('/admin/tests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();
    }
}
