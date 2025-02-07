<?php

namespace App\Models;

use App\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

#[ScopedBy(UserScope::class)]
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
