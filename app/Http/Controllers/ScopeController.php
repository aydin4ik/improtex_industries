<?php

namespace App\Http\Controllers;

use App\Scope;
use Illuminate\Http\Request;

class ScopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.pages.scope.index', 
        [   
            'scopes' => Scope::orderBy('order', 'asc')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scope  $scope
     * @return \Illuminate\Http\Response
     */
    public function show(Scope $scope)
    {
        return view('layouts.pages.scope.show',[
            'scope' => $scope
        ]);
    }
}
