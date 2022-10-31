<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $todos = DB::table('todo_lists')->where('id_user', $user_id)->where('status', ['not yet', 'on progress'] )->get();
        $completed = DB::table('todo_lists')->where('status', 'done')->get();
        return view('app', ['todo_lists' => $todos, 'completed' => $completed]);
    }

    public function doneTask($id){

        TodoList::whereId($id)->update([
            'status' => 'done',
        ]);

        // redirect
        return redirect()->route('users.index-home')->with('status', 'Task Completed!');
    }

    public function saveTask(Request $request){
        $user_id = Auth::user()->id;
        
        // validate the form
        $request->validate([
            'name' => 'required|max:200'
        ]);

        // store the data
        DB::table('todo_lists')->where('id')->insert([
            'name' => $request->name,
            'id_user' => $user_id
        ]);

        return redirect()->route('users.index-home')->with('status', 'Task added!');
        // return redirect()->route('pegawai.krs-index')->with('success', 'KRS Telah Ditambahkan');
    }
    
    public function updateTask(Request $request, $id){
        // validate the form
        $request->validate([
            'name' => 'required|max:200'
        ]);

        // update the data
        DB::table('todo_lists')->where('id', $id)->update([
            'name' => $request->name
        ]);
        
        // redirect
        return redirect()->route('users.index-home')->with('status', 'Task updated!');
    }

    public function deleteTask($id){
        // delete the todo
        DB::table('todo_lists')->where('id', $id)->delete();

        // redirect
        return redirect()->route('users.index-home')->with('status', 'Task removed!');
    }

    public function editTask(){
        return view('index');
    }
}
