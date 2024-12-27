<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    protected $fillable = [
        'date',
        'is_working_day',
        'is_outside_day',
        'completed'
    ];

    public function taskStatus()
    {
        return $this->hasMany(TaskStatus::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
