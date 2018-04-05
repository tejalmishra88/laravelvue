<?php

namespace App\Http\Controllers;

use App\http\requests\Todo2Request;
use Illuminate\Http\Request;

class Todo2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Todo2::all();
        return request()->json(200,$tasks);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Todo2Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo2  $todo2
     * @return \Illuminate\Http\Response
     */
    public function show(Todo2 $todo2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo2  $todo2
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo2 $todo2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo2  $todo2
     * @return \Illuminate\Http\Response
     */
    public function update(Todo2Request $request, Todo2 $todo2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo2  $todo2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo2 $todo2)
    {
        //
    }
}
