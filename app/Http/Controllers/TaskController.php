<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class TaskController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth')->except(['index', 'show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allTask = Task::all();
        return view('task.index', compact("allTask"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $task = Task::create([
           'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description']
        ]);

        return redirect('/tasks/' . $task->id)->withErrors($validated, '$task');
        //return redirect('/tasks/' . $task->id);

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($task)
    {

        $task = Task::find($task);
        return view('task.show', compact("task"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.update', compact("task"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

        $validated = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $task->update($validated);
        return redirect('/tasks/' . $task->id)->withErrors($validated, 'update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {

        $task->delete();
        return redirect('/tasks');

    }


}
