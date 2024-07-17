<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index() {
        // //select * from tasks
        // $tasks = Task::all();

        // //select * from tasks limit 10
        // $tasks = Task::limit(10)->get();

        // //select * from tasks order by created_at desc limit 10
        // $tasks = Task::latest()->limit(10)->get();

        // //select * from tasks where id < 30
        // $tasks = Task::where('id','<',30)->get();

        // //select * from tasks where id <= 30 AND id >= 20
        // $tasks = Task::where('id','<=',30)->where('id','>=', 20)->get();

        // //select * from `tasks` where `id` between ? and ?
        // $tasks = Task::whereBetween('id',[20,30])->first();

        // //select * from tasks where id=10
        // $tasks = Task::where('id','=',10)->limit(2)->get();

        // //select * from `tasks` where `title` like ?
        // $tasks = Task::where('title','like','%Nulla%')->get();
        // //dd($tasks);

        // $task = Task::find(10);
        // dd($task->user->tasks->last()->title);
        // // dd($task->comments->first()->user->tasks);

        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));

    }
    function show(Task $task) {
        dd($task);

      }


}
