<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function UserWorker(){
        return $this->belongsToMany(User::class  , "user_tasks" );
    }
    public function project(){
        return $this->belongsTo(Project::class,"project_id");
    }
    public function supervisor(){
        return $this->belongsTo(User::class,"super_id");

    }
}
