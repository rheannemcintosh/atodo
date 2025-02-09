<?php

namespace App\Models;

use App\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

#[ScopedBy(UserScope::class)]
class ToDoList extends Model
{
    protected $fillable = [
        'type',
        'slug',
        'start_date',
        'end_date',
        'is_working_day',
        'is_outside_day',
        'is_makeup_day',
        'is_home_day',
        'completed',
    ];

    protected $dates = [
        'date',
    ];

    public function tasks(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'to_do_list_tasks');
    }

    public function taskDetails()
    {
        return $this->hasMany(TaskDetail::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (Auth::check()) {
                $model->user_id = Auth::id();
            }
        });
    }
}
