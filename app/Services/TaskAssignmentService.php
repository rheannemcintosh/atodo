<?php

namespace App\Services;

use App\Models\TaskDetail;
use App\Models\ToDoList;

class TaskAssignmentService
{
    /**
     * Assign tasks to the To Do List based on the To Do List's properties
     *
     * @param ToDoList $toDoList
     */
    public function assignTasks (ToDoList $toDoList)
    {
        // Assign all Daily Tasks to the To Do List
        $categories = [1, 2, 3, 4, 5, 6];
        $this->createTasks($toDoList, TaskDetail::whereIn('category_id', $categories)->get());

        $conditionalCategories = [
            'is_makeup_day' => 15,
            'is_working_day' => 16,
            'is_outside_day' => 17,
        ];

        // Assign all Conditional Tasks to the To Do List
        foreach ($conditionalCategories as $condition => $categoryId) {
            if ($toDoList->$condition) {
                $this->createTasks($toDoList, TaskDetail::where('category_id', $categoryId)->get());
            }
        }
    }

    /**
     * Create tasks for the To Do List
     *
     * @param ToDoList $toDoList
     * @param $tasks
     */
    private function createTasks (ToDoList $toDoList, $tasks)
    {
        foreach ($tasks as $task) {
            $toDoList->taskStatus()->create([
                'task_detail_id' => $task->id,
                'to_do_list_id'  => $toDoList->id,
                'status'         => 'To Do',
            ]);
        }
    }
}
