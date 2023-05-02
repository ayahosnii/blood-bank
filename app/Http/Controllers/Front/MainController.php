<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function about()
    {
        return view('front.about');
    }

    public function donations()
    {
        return view('front.donations');
    }

    public function articles()
    {
        return view('front.articles');
    }

    public function contactUs()
    {
        return view('front.contact-us');
    }

    public function whoAreUs()
    {
        return view('front.who-are-us');
    }
}
