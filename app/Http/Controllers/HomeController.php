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
        $bigPost = Post::where('status', 'PUBLISHED')
        ->orderBy('created_at', 'ASC')
        ->first();

        $mediumPosts = Post::where('id', '>', $bigPost->id)
        ->where('status', 'PUBLISHED')
        ->orderBy('created_at', 'ASC')
        ->limit(2)
        ->offset(0)
        ->get();

        $lastMediumPost = $mediumPosts->last();


        $smallPosts = Post::where('id', '>', $lastMediumPost->id)
        ->where('status', 'PUBLISHED')
        ->orderBy('created_at', 'ASC')
        ->limit(4)
        ->offset(0)
        ->get();


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
