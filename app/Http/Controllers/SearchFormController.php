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

        $posts = Post::searchInTranslations($query, ['title', 'body', 'excerpt'])
        ->where('status', 'PUBLISHED')
        ->get();    

        $projects = Project::searchInTranslations($query, ['title', 'body', 'excerpt', 'scope'])
        ->where('status', 'PUBLISHED')
        ->get();  

        if (!isset($query)) {
            $posts = collect([]);
            $projects = collect([]);
        }
        
        return view('layouts.pages.search', [
            'query' => $query,
            'posts' => $posts,
            'projects' => $projects
            ]);
    }
}
