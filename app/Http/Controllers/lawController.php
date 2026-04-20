<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lawController extends Controller
{
        public function privacity()
    {

        return view('law.privacity');
    }

    public function terms()
    {

        return view('law.terms');
    }
}
