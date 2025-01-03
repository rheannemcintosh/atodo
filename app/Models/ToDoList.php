<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    protected $fillable = [
        'date',
        'is_working_day',
        'is_outside_day',
        'is_makeup_day',
        'completed'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function taskDetails()
    {
        return $this->hasMany(TaskDetail::class);
    }
}
