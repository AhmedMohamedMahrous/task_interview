<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware("supervisor");
    }

    public function form(){
        return view('createProject');
    }
    public function save(Request $request){
        $request->validate([
            "name" => "required",
            "description" => "required"
        ]);

        $project = Project::create([
            "name" => $request->name,
            "description" => $request->description,
            "super_id" => auth()->user()->id
        ]);

        return redirect("show_projects");
    }
    public function singleProject(Project $project){
        $users = User::all()->where("is_admin" , false);
        $tasks = $project->ProjectTasks;

        return \view("project",[
            'project' => $project,
            "users" => $users,
            "tasks" => $tasks
        ]);
    }
    public function ShowProjects(){
        $projects = Project::all()->where("super_id" , auth()->user()->id);
        return \view("projects",[
            "projects" => $projects
        ]);
    }
    public function deleteProject(Project $project){
        $project->delete();
        return redirect()->back();
    }
}
