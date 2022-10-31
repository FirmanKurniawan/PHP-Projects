<?php

namespace App\Http\Controllers;

use App\Models\TaskDetail;
use App\Models\TodoList;
use Illuminate\Http\Request;

class TaskDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $todos = DB::table('todo_lists')->where('id_user', $user_id)->where('status', ['not yet', 'on progress'] )->get();
        $completed = DB::table('todo_lists')->where('status', 'done')->get();
        return view('app', ['todo_lists' => $todos, 'completed' => $completed]);
        $todolist = TodoList::all();
        return view('');
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
     * @param  \App\Models\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TaskDetail $taskDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskDetail $taskDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskDetail $taskDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskDetail $taskDetail)
    {
        //
    }
}
