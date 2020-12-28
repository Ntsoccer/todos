<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Todo;

use Illuminate\Support\Facades\DB;

use Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $search=$request->input('search');
        
        // $query=DB::table('todos');        

        // if($search==='0'){
        //  $query
        //   ->where('status',0)
        //   ->orWhere('status',1);
        // }
        // else if($search==='1'){
        //  $query->where('status',0);
        // }
        // else if($search==='2'){
        //  $query->where('status',1);
        // };

        // $todos=$query
        // ->select('id','comment','status')
        // ->get();

        $todos=Todo::all();

        return view('todo.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todo.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $rules=['comment'=>'required|max:100'];
        $messages=['comment.max'=>'100文字以内で記入してください。'];
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
          return redirect('todo/index')
          ->withErrors($validator)
          ->withInput();
        }

        $todo=new Todo;
        
        $todo->comment=$request->comment;
    
        $todo->save();

        return redirect('todo/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $todo=Todo::find($id);
        if($todo->status===0){
          $todo->status=1;
          $todo->save();
        }
        else if($todo->status===1){
          $todo->status=0;
          $todo->save();
        };
        
        return redirect('todo/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $todo=Todo::find($id);
        $todo->delete();
        return redirect('todo/index');
    }
}