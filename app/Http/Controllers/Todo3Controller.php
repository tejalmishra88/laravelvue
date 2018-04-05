<?php

namespace App\Http\Controllers;

use App\Todo3;
use Illuminate\Http\Request;

class Todo3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Todo3::all();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo3  $todo3
     * @return \Illuminate\Http\Response
     */
    public function show(Todo3 $todo3)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo3  $todo3
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo3 $todo3)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo3  $todo3
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo3 $todo3)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo3  $todo3
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo3 $todo3)
    {
        //
    }
}
