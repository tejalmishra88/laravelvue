<?php

namespace App\Http\Controllers;

use App\Todo4;
//use App\Todo1;
use Illuminate\Http\Request;
use App\Http\Requests\Todo1Request;

class Todo4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    if ($term !=null){
        $tasks['data'] = Todo1::where('name','like','%','$term','%')->get();
    
        //
    // $tasks = Todo4::all();
      //  $tasks = Todo4::orderBy('id','desc')->paginate(3);
        //return $tasks;
        return request()->json(200,$tasks);
    }
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
    public function store(Todo1Request $request)
    {
        //
        $todo = Todo4::create($request->all());
        if($todo){
           // $tasks = Todo1::all();
            $tasks = Todo4::orderBy('id','desc')->paginate(3);
            //return $tasks;
            return request()->json(200,$tasks);
        }

      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo4  $todo1
     * @return \Illuminate\Http\Response
     */
    public function show(Todo4 $todo4)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo4  $todo1
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo4 $task)
    {
        //
       $tasks= Todo4::all();
        return request()->json(200, $task);
    // return $tasks;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo4  $todo1
     * @return \Illuminate\Http\Response
     */
    public function update(Todo1Request $request, Todo4 $task)
    {
        //
        $task->name = $request->name;
        $task->save();
      //  return"hehe";
       if( $task->save()){
        $tasks = Todo4::orderBy('id','desc')->paginate(3);
        return request()->json(200,$tasks);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo4  $todo1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo4 $todo1)
    {
        //
    }
}
