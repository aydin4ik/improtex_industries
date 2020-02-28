<?php

namespace App\Http\Controllers;

use App\Post;
use App\Project;
use App\Partner;
use Carbon;


class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'PUBLISHED')
        ->orderBy('created_at', 'DESC')
        ->limit(7)
        ->offset(0)
        ->get();

        
        $bigPost = $posts->first();
        $mediumPosts = $posts->slice(1, 2);
        $smallPosts = $posts->slice(3);
        // dd($posts

        $project1 = Project::where('status', 'PUBLISHED')
        ->orderBy('created_at', 'ASC')
        ->first();

        $project2 = Project::where('id', '>', $project1->id)
        ->where('status', 'PUBLISHED')
        ->orderBy('created_at', 'ASC')
        ->first();

        return view('layouts.pages.home.index',[
            // posts
            'bigPost' => $bigPost,
            'mediumPosts' => $mediumPosts,
            'smallPosts' => $smallPosts,

            // projects
            'project1' => $project1,
            'project2' => $project2,

            // partners
            'partners' => Partner::orderBy('order', 'asc')->get(),

        ]);
    }
}
