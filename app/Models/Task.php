<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_detail_id',
        'status'
    ];

    public function taskDetail()
    {
        return $this->belongsTo(TaskDetail::class);
    }

    public function toDoList()
    {
        return $this->hasMany(ToDoList::class);
    }
}
