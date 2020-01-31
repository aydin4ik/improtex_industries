<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Feature;
use App\Slide;
use App\Certificate;
use App\Partner;

class ShowAbout extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('layouts.pages.about', 
        [   'about' => About::first(),
            'features' => Feature::all(),
            'slides' => Slide::orderBy('order', 'asc')->get(),
            'certificates' => Certificate::orderBy('order', 'asc')->get(),
            'partners' => Partner::orderBy('order', 'asc')->get(),
        ]);
    }
}
