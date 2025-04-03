<?php

namespace App\Models;

use App\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

#[ScopedBy(UserScope::class)]
class Task extends Model
{
    protected $fillable = [
        'task_detail_id',
        'short_description',
        'due_date',
        'started_at',
        'completed_at',
        'status',
        'to_do_list_ids',
    ];

    public function taskDetail(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TaskDetail::class);
    }

    public function toDoLists()
    {
        return $this->belongsToMany(ToDoList::class, 'to_do_list_tasks');
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
