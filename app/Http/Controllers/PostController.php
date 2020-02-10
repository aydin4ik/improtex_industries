<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Carbon;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status', 'PUBLISHED')
                            ->orderBy('created_at', 'DESC')
                            ->limit(4)
                            ->offset(0)
                            ->with('translations')
                            ->get();


        $posts = $posts->translate(app()->getLocale());
        
        $posts = $posts->each(function ($post, $key) {

            $post->image = Voyager::image( $post->image );

            $post->date = Carbon::parse($post->created_at)->translatedFormat('d F Y');
            
            $post->url = route('news.show', [$post->category, $post->slug]);

            return $post;
        });

        return view('layouts.pages.post.index', compact('posts'));
    }

        /**
     * Load a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function load(Request $request)
    {
        if (isset($request->offset)) {
            $offset = $request->offset;
        } else {
            $offset = 0;
        }

        $posts = Post::where('status', 'PUBLISHED')
                            ->orderBy('created_at', 'DESC')
                            ->limit(4)
                            ->offset($offset)
                            ->get();

        $posts = $posts->each(function ($post, $key) {
            $post->image = Voyager::image( $post->image );

            $post->date = $post->created_at->toFormattedDateString();
        });

        return $posts;
    }


    /**
     * Display the specified category resource.
     *
     * @param 
     * @param  $category
     * @return \Illuminate\Http\Response
     */
    public function category(Category $category)
    {
        
        $posts = $category->posts()
                            ->where('status', 'PUBLISHED')
                            ->orderBy('created_at', 'ASC')
                            ->limit(4)
                            ->offset(0)
                            ->with('translations')
                            ->get();

        
        $posts = $posts->translate(app()->getLocale());
        
        $posts = $posts->each(function ($post, $key) {

            $post->image = Voyager::image( $post->image );

            $post->date = Carbon::parse($post->created_at)->translatedFormat('d F Y');
            
            $post->url = route('news.show', [$post->category, $post->slug]);

            return $post;
        });

        return view('layouts.pages.post.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Post $post)
    {
        return view('layouts.pages.post.show',[
            'post' => $post
        ]);
    }

    
}
