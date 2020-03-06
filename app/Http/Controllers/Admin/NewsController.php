<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Helpers;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();           
        return view('admin.news.news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.edit-news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('news_image')) {
            $result = Helpers::storeImg('news_image', 'image', $request);
        }

        News::create([
            'news_name_ru' => $request->news_name_ru,
            'news_name_kz' => $request->news_name_kz,
            'news_name_en' => $request->news_name_en,
            'news_short_desc_ru' => $request->news_short_desc_ru,
            'news_short_desc_kz' => $request->news_short_desc_kz,
            'news_short_desc_en' => $request->news_short_desc_en,
            'news_desc_ru' => $request->news_desc_ru,
            'news_desc_kz' => $request->news_desc_kz,
            'news_desc_en' => $request->news_desc_en,
            'news_image' => $result
        ]);
        
        return redirect("/admin/news");
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
    public function edit(News $news)
    {
        return view('admin.news.edit-news', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $result = $news->news_image;
        if ($request->hasFile('news_image')) {
            $result = Helpers::storeImg('news_image', 'image', $request);
        }

        $news->update([
            'news_name_ru' => $request->news_name_ru,
            'news_name_kz' => $request->news_name_kz,
            'news_name_en' => $request->news_name_en,
            'news_short_desc_ru' => $request->news_short_desc_ru,
            'news_short_desc_kz' => $request->news_short_desc_kz,
            'news_short_desc_en' => $request->news_short_desc_en,
            'news_desc_ru' => $request->news_desc_ru,
            'news_desc_kz' => $request->news_desc_kz,
            'news_desc_en' => $request->news_desc_en,
            'news_image' => $result
        ]);

        return redirect("/admin/news");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete(); 
    }
}
