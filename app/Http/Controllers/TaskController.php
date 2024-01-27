<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $tasks =  Task::orderBy('priority', 'asc')->get();
       
       return view('tasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task_store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Task::create([
            'name' => request('name'),
            'priority' => request('priority'),
        ]);

            return redirect('/tasks')->with([
                'message' => 'Task created  successfully.',

                'alert-type' => 'success'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task =  Task::findOrFail($id);
       
       return view('task_show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function reorganize(Request $request)
    {
        $data = $request->input('order');

        foreach ($data as $index => $id) {
            Task::where('id', $id)->update(['priority' => ++$index]);
        }
        return  response()->json([

            'message' => 'Task priority modified successfully.',

            'alert-type' => 'success'

        ]);
    }


    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if( blank(request('name')) ) {

            return redirect('/tasks')->with([
                'message' => 'Name is required',
    
                'alert-type' => 'error'
            ]);

        }

        Task::where('id', $id)->update(['name' => request('name'), 'priority' => request('priority')]);

            return redirect('/tasks')->with([
                'message' => 'Task updated  successfully.',

                'alert-type' => 'success'
            ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);

        if($task) {

            $task->delete();

            return  response()->json([

                'message' => 'Task deleted successfully.',
    
                'alert-type' => 'success'
    
            ]);
        }

        return  response()->json([

            'message' => 'Error occured.',

            'alert-type' => 'danger'

        ]);
    }
}
