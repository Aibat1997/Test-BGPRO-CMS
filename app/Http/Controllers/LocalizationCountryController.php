<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationCountryController extends Controller
{
    public function index($locale)
    {
        session()->put('country', $locale);
        return redirect()->back();
    }
}
