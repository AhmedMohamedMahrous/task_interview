@extends("layouts.app")
@section("content")

    <div class="container text-center px-4">
        <style>
            .p-3{
                background-color: rgba(0,54,83, 0.15);
                border: 1px solid rgba(0,54,235, 0.3);
                height: 150px;
            }
        </style>
        <h1>Submit This Task</h1>
        <div class="row g-2">
            <div class="col-6">
                <div class="p-3">The Task Name :- {{ $task->name }}</div>
            </div>
            <div class="col-6">
                <div class="p-3">
{{--                    <span>Enter Your Detais Here</span>--}}
                   <form method="post" action="{{ route("update_single_task",$task->id) }}">
                       @csrf
                       <div class="mb-3">
                           <label for="formFile" class="form-label">Enter Task Details</label>
                           <input class="form-control" type="text" id="formFile" name="description">
                       </div>
                       <button type="submit" class="btn btn-primary">Submit</button>

                   </form>
                </div>
            </div>
            <div class="col-6">
                <div class="p-3">Task Project {{ $task->project->name }}</div>
            </div>
            <div class="col-6">
                <div class="p-3">Supervisor of Project <span style="color: navy">{{ $task->supervisor->name }}</span></div>
            </div>
        </div>
    </div>

@endsection
