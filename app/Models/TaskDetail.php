<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    protected $fillable = [
        'category_id',
        'title'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
