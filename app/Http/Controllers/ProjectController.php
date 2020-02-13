<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Carbon;

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
                            ->limit(4)
                            ->offset(0)
                            ->with('translations')
                            ->get();


        $projects = $projects->translate(app()->getLocale());
        
        $projects = $projects->each(function ($project, $key) {

            $project->image = Voyager::image( $project->image );

            $project->date = Carbon::parse($project->created_at)->translatedFormat('d F Y');
            
            $project->url = route('projects.show', $project->slug);

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

        $projects = $projects->each(function ($project, $key) {
            $project->image = Voyager::image( $project->image );

            $project->date = $project->created_at->toFormattedDateString();
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
