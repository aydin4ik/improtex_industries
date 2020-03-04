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

        $projects = Project::where('status', 'PUBLISHED')
        ->orderBy('created_at', 'DESC')
        ->limit(2)
        ->offset(0)
        ->get();

        $project1 = $projects->first();
        
        if($projects->count() > 1){
            $project2 = $projects->last();
        }else{
            $project2 = null;
        }

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
