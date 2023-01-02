<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/create_project", [\App\Http\Controllers\ProjectController::class, "form"])
    ->name("create_project");
Route::post("/create_project", [\App\Http\Controllers\ProjectController::class, "save"])
    ->name("save_project");
Route::get("/show_projects", [\App\Http\Controllers\ProjectController::class, "ShowProjects"])
    ->name("show_projects");
Route::get("/project/{project}", [\App\Http\Controllers\ProjectController::class, "singleProject"])
    ->name("single_projects");
Route::get("/project/{project}/delete", [\App\Http\Controllers\ProjectController::class, "deleteProject"])
    ->name("delete_project");


Route::get("/tasks",[\App\Http\Controllers\TaskController::class,"index"])
    ->name("tasks")->middleware("auth");
Route::get("/task/{task}",[\App\Http\Controllers\TaskController::class, "SingleTask"])
    ->name("single_task")->middleware("auth");
Route::post("/task/{task}",[\App\Http\Controllers\TaskController::class, "UpdateSingleTask"])
    ->name("update_single_task")->middleware("auth");

Route::post("/add_task/{project}",[\App\Http\Controllers\TaskController::class, "saveTask"])
    ->name("add_task")->middleware("supervisor");


