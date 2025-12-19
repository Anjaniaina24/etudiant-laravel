<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        $lang = $request->get('lang', 'fr');

        if (in_array($lang, ['fr', 'en'])) {
            Cookie::queue('lang', $lang, 60 * 24 * 30); // 30 jours
        }

        return redirect()->back();
    }
}
