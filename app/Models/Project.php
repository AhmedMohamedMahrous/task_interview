<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ProjectSuper(){
        return $this->belongsTo(User::class, "super_id","id");
    }
    public function ProjectTasks(){
        return $this->hasMany(Task::class);
    }
}
