<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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

        // lazy loading
        // $tasks = Task::all();

        // eager loading to optimise loading time
        $tasks = Task::with('user')->get();

        return view('tasks.index', compact('tasks'));

    }

    function show(Task $task) {
        // dd($task);
        // used when have execute query. have relationship with model
        $task = $task->load('comments.user','user');
        return view('tasks.show', compact('task'));
      }

      function ajaxloadtasks(Request $request) {
        $tasks = Task::with('user');

        return DataTables::of($tasks)
        ->addIndexColumn()
        ->addColumn('bil', function($task){
            return '1';
        })
        ->addColumn('user', function($task){
            return $task->user->name;
        })
        ->addColumn('due_date', function($task){
            return \Carbon\Carbon::parse($task->due_date)->format('d-M-Y');
        })
        ->addColumn('action', function($task){
            return '<a class="btn btn-primary btn-sm" href="'.route('tasks.show',['task'=>$task->uuid]).'">Show</a>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
