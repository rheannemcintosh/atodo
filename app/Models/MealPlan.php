<?php

namespace App\Models;

use App\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy(UserScope::class)]
class MealPlan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'breakfast',
        'morning_snack',
        'lunch',
        'afternoon_snack',
        'dinner',
        'nighttime_snack',
    ];
}
