<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'category_id',
        'title'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function taskStatus()
    {
        return $this->hasMany(TaskStatus::class);
    }
}
