<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Carbon;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('status', 'PUBLISHED')
        ->orderBy('created_at', 'DESC')
        ->limit(1)
        ->offset(0)
        ->with('translations')
        ->get();


        $projects = $projects->each(function ($project, $key) {

            $project->imageMobile = Voyager::image( $project->thumbnail('big'));
            $project->image = Voyager::image( $project->thumbnail('wide'));
            $project->title = $project->getTranslatedAttribute('title', app()->getLocale());
            $project->excerpt = $project->getTranslatedAttribute('excerpt', app()->getLocale());
            $project->title = Str::limit($project->title, 100); 
            $project->excerpt = Str::limit($project->excerpt, 200); 
            $project->date = Carbon::parse($project->created_at)->translatedFormat('d F Y');            
            $project->url = route('projects.show', [$project->slug]);

            return $project;
        });

        return view('layouts.pages.project.index', compact('projects'));
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

        $projects = Project::where('status', 'PUBLISHED')
        ->orderBy('created_at', 'DESC')
        ->limit(4)
        ->offset($offset)
        ->get();

        $projects = $projects->each(function ($project, $key) use(&$request) {  

            $locale = $request->locale;
            $project->imageMobile = Voyager::image( $project->thumbnail('big'));
            $project->image = Voyager::image( $project->thumbnail('wide'));
            $project->title = $project->getTranslatedAttribute('title', $locale);
            $project->excerpt = $project->getTranslatedAttribute('excerpt', $locale);
            $project->title = Str::limit($project->title, 100); 
            $project->excerpt = Str::limit($project->excerpt, 200); 
            $project->date = Carbon::parse($project->created_at)->translatedFormat('d F Y');            
            $project->url = route('projects.show', [$project->slug], true, $request->locale );

            return $project;
        });

        return $projects;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $prev = Project::where('id', '<', $project->id)
        ->where('status', 'PUBLISHED')
        ->orderBy('id', 'DESC')
        ->first();

        $next = Project::where('id', '>', $project->id)
        ->where('status', 'PUBLISHED')
        ->orderBy('id')
        ->first();

        return view('layouts.pages.project.show',[
            'project' => $project,
            'prev' => $prev,
            'next' => $next
        ]);
    }

}
