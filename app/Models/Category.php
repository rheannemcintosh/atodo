<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_active',
    ];

    public function tasks()
    {
        return $this->hasMany(TaskDetail::class);
    }
}
