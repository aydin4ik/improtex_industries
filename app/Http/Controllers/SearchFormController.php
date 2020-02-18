<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Project;

class SearchFormController extends Controller
{
    public function submit(Request $request)
    {

        $query = $request->input('query') ?? $request->get('q');
        // Perform the db query, and return the results

        $posts = Post::search($query)
        ->with('category')
        ->get();

        $projects = Project::search($query)
        ->get();


        return view('layouts.pages.search', [
            'results' => $query,
            'posts' => $posts,
            'projects' => $projects
            ]);
    }
}
