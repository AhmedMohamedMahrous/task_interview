<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Models\User_Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(){
        // return tasks all
        return view("tasks", ["tasks" => auth()->user()->TaskWorker->where('submitted',false)]);
    }

    public function SingleTask(Task $task){


        if($task->submitted)
            return redirect()->route("tasks");
        return view("task",["task"=>$task]) ;

    }
    public function UpdateSingleTask(Request $request, Task $task){
        $request->validate([
            "description" => "required"
        ]);
//        $task->description = $request->description;
//        $task->save();
        $task->update([
            "description" => $request->description,
            "submitted" => 1
        ]);
        return redirect()->route("tasks");
    }
    public function saveTask(Request $request, Project $project){
        $request->validate([
            "name" => "required",
            "user_id" => "required "
        ]);
        if($request->user_id == -1)
            return redirect()->back()->withErrors(["user_id"=>"select an user "]);
        $users = User::all()->where("is_admin" , false);
        $tasks = $project->ProjectTasks;
        $task = Task::create([
            "name" => $request->name,
            "description" => "",
            "project_id" => $project->id,
            "super_id" => auth()->user()->id
        ]);
        User_Task::create([
            "user_id" => $request->user_id,
            "task_id" => $task->id,
            "duration" => "1 d"
        ]);
        return redirect()->back()->with([
            'project' => $project,
            "users" => $users,
            "tasks" => $tasks
        ]);
    }
}
