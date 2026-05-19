<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function __invoke(Request $request)
    {
        $supported = config('app.supported_locales', ['es', 'en']);
        $locale = $request->input('locale');

        if (in_array($locale, $supported)) {
            auth()->user()->update(['lang' => $locale]);
        }

        return redirect()->back();
    }
}
