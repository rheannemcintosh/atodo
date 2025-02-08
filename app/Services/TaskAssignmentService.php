<?php

namespace App\Services;

use App\Models\Task;
use App\Models\TaskDetail;
use App\Models\ToDoList;

class TaskAssignmentService
{
    /**
     * Assign tasks to the To Do List based on the To Do List's properties
     */
    public function assignTasks(ToDoList $toDoList)
    {
        $taskDetails = TaskDetail::where('preferred_frequency', 'Daily')
            ->whereNull('dependency')
            ->get();

        $this->createTasks($toDoList, $taskDetails);

        if ($toDoList->is_home_day) {
            $taskDetails = TaskDetail::where('preferred_frequency', 'Daily')
                ->where('dependency', 'home')
                ->get();

            $this->createTasks($toDoList, $taskDetails);
        }

        if ($toDoList->is_makeup_day) {
            $taskDetails = TaskDetail::where('preferred_frequency', 'Daily')
                ->where('dependency', 'makeup')
                ->get();

            $this->createTasks($toDoList, $taskDetails);
        }

        if ($toDoList->is_working_day) {
            $taskDetails = TaskDetail::where('preferred_frequency', 'Daily')
                ->where('dependency', 'work')
                ->get();

            $this->createTasks($toDoList, $taskDetails);
        }
        if ($toDoList->is_outside_day) {
            $taskDetails = TaskDetail::where('preferred_frequency', 'Daily')
                ->where('dependency', 'outside')
                ->get();

            $this->createTasks($toDoList, $taskDetails);
        }
    }

    /**
     * Create tasks for the To Do List
     *
     * @param  $tasks
     */
    private function createTasks(ToDoList $toDoList, $taskDetails)
    {
        foreach ($taskDetails as $taskDetail) {
            $task = Task::create([
                'task_detail_id' => $taskDetail->id,
                'status' => 'To Do',
            ]);

            $toDoList->tasks()->attach($task->id);
        }
    }
}
