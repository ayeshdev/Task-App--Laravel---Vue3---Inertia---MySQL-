<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return Inertia::render('Dashboard',['tasks'=>$tasks]);
    }
}
