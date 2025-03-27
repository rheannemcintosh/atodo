<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealPlanRequest;
use App\Models\MealPlan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MealPlanController extends Controller
{
    /**
     * Display all the meal plans which are attached to a user.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $mealPlans = MealPlan::select('id', 'date', 'breakfast', 'lunch', 'dinner')->get();

        return View::make('meal-plans.index', compact('mealPlans'));
    }

    /**
     * Show the create form for a meal plan.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        return View::make('meal-plans.create');
    }

    /**
     * Store a newly created meal plan.
     *
     * @param MealPlanRequest $request
     * @return RedirectResponse
     */
    public function store(MealPlanRequest $request): RedirectResponse
    {
        $mealPlan = new MealPlan($request->validated());
        $mealPlan->user_id = Auth::id();
        $mealPlan->save();

        return redirect()->route('meal-plans.index')->with('success', 'Meal Plan created successfully.');
    }

    /**
     * Display a specified meal plan.
     *
     * @param MealPlan $mealPlan
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(MealPlan $mealPlan): \Illuminate\Contracts\View\View
    {
        return View::make('meal-plans.show', compact('mealPlan'));
    }

    /**
     * Show the form for editing a Meal Plan.
     *
     * @param MealPlan $mealPlan
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(MealPlan $mealPlan): \Illuminate\Contracts\View\View
    {
        return View::make('meal-plans.edit', compact('mealPlan'));
    }

    /**
     * Update a specified meal plan.
     *
     * @param MealPlanRequest $request
     * @param MealPlan $mealPlan
     * @return RedirectResponse
     */
    public function update(MealPlanRequest $request, MealPlan $mealPlan): RedirectResponse
    {
        $mealPlan->fill($request->validated());
        $mealPlan->user_id = Auth::id();
        $mealPlan->save();

        return redirect()->route('meal-plans.index')->with('success', 'Meal Plan updated successfully.');
    }

    /**
     * Delete a specified meal plan.
     *
     * @param MealPlan $mealPlan
     * @return RedirectResponse
     */
    public function destroy(MealPlan $mealPlan): RedirectResponse
    {
        $mealPlan->delete();

        return redirect()->route('meal-plans.index')->with('success', 'Meal Plan deleted successfully.');
    }
}
