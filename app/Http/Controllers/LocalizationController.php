<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function index($locale)
    {
        App::setLocale($locale);
        session()->put('lang', $locale);
        return redirect()->back();
    }
}
