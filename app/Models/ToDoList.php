<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    protected $fillable = [
        'date',
        'completed'
    ];

    public function taskStatus()
    {
        return $this->belongsTo(TaskStatus::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
