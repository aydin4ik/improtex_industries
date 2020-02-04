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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scope  $scope
     * @return \Illuminate\Http\Response
     */
    public function edit(Scope $scope)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scope  $scope
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scope $scope)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scope  $scope
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scope $scope)
    {
        //
    }
}
