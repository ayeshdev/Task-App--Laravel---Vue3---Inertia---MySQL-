<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Task $task)
    {
        $tasks = $task::all();
        return Inertia::render('Tasks',['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'description'=>'required',
        ]);

        Task::create([
            'name'=>$request->name,
            'date'=>$request->date,
            'description'=>$request->description,
            'user_id'=>$userId,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $tasks = $task::all();
        return Inertia::render('Dashboard',['tasks'=>$tasks]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {


        $data = $request->validate([
            'id'=>'required',
            'name'=>'required',
            'date'=>'required',
            'description'=>'required'
        ]);
        
        Task::find($request->id)->update($data);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Task::find($request->id)->delete();

    }
}
