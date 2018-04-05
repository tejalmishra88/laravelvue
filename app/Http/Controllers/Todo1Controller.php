<?php

namespace App\Http\Controllers;

use App\Todo1;
use Illuminate\Http\Request;
use App\Http\Requests\Todo1Request;

class Todo1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $term = null)
    {   
         if($term !=null)
        { //$term="new";
       $tasks['data'] = Todo1::where('name', 'like', '%'.$term.'%')->get();
       //return $term;
        return request()->json(200,$tasks);
      // return $term;
        }
       
        $tasks = Todo1::orderBy('id','desc')->paginate(3);
        return request()->json(200,$tasks);
       
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
        $todo = Todo1::create($request->all());
        if($todo){
           // $tasks = Todo1::all();
            $tasks = Todo1::orderBy('id','desc')->paginate(3);
            //return $tasks;
            return request()->json(200,$tasks);
        }

      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo1  $todo1
     * @return \Illuminate\Http\Response
     */
    public function show(Todo1 $todo1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo1  $todo1
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo1 $task)
    {
        //
        return request()->json(200, $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo1  $todo1
     * @return \Illuminate\Http\Response
     */
    public function update(Todo1Request $request, Todo1 $task)
    {
        //
        $task->name = $request->name;
        $task->save();
      //  return"hehe";
       if( $task->save()){
        $tasks = Todo1::orderBy('id','desc')->paginate(3);
        return request()->json(200,$tasks);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo1  $todo1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo1 $task)
    {
       if( $task->delete()){
         $tasks = Todo1::orderBy('id','desc')->paginate(3);
        return request()->json(200,$tasks);}
        else return response()->json(425, ['delete'=>"error deleting record"]);
  
    }
    public function _getRecord(){
        $tasks = Todo1::orderBy('id','desc')->paginate(3);
        return request()->json(200,$tasks);
    }
}
