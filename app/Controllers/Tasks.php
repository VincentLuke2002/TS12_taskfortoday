<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index(): string
    {
        $tasks = (new TaskModel())->allByDate();
        $groups = [];

        foreach ($tasks as $task) {
            $groups[$task['task_date']][] = $task;
        }

        return view('tasks/index', [
            'title'  => 'Task List',
            'active' => 'tasks',
            'groups' => $groups,
            'total'  => count($tasks),
        ]);
    }
}
