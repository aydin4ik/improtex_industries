<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchFormController extends Controller
{
    public function submit(Request $request)
    {
        $query = $request->get('q');

        // Perform the db query, and return the results

        return view('layouts.pages.search', ['results' => $query]);
    }
}
