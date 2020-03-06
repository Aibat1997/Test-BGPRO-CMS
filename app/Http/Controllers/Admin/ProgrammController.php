<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Programm;
use Illuminate\Http\Request;

class ProgrammController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programms = Programm::orderBy('updated_at', 'desc')->get();
        return view('admin.programm.programm', compact('programms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.programm.programm-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Programm::create([
            'p_name_ru' => $request->p_name_ru,
            'p_name_kz' => $request->p_name_kz,
            'p_name_en' => $request->p_name_en,
            'p_duration' => $request->p_duration,
            'p_cost' => $request->p_cost,
            'p_sort_num' => $request->p_sort_num,
        ]);

        return redirect('/admin/programms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programm  $programm
     * @return \Illuminate\Http\Response
     */
    public function show(Programm $programm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programm  $programm
     * @return \Illuminate\Http\Response
     */
    public function edit(Programm $programm)
    {
        return view('admin.programm.programm-edit', compact('programm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programm  $programm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programm $programm)
    {
        $programm->update([
            'p_name_ru' => $request->p_name_ru,
            'p_name_kz' => $request->p_name_kz,
            'p_name_en' => $request->p_name_en,
            'p_duration' => $request->p_duration,
            'p_cost' => $request->p_cost,
            'p_sort_num' => $request->p_sort_num,
        ]);

        return redirect('/admin/programms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programm  $programm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programm $programm)
    {
        $programm->delete();
    }
}
