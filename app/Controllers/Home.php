<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    public function index(): string
    {
        $today = Time::now(app_timezone())->format('Y-m-d');
        $tasks = (new TaskModel())->forDate($today);

        $counts = [
            'all'         => count($tasks),
            'pending'     => 0,
            'in_progress' => 0,
            'completed'   => 0,
        ];

        foreach ($tasks as $task) {
            if (isset($counts[$task['status']])) {
                $counts[$task['status']]++;
            }
        }

        return view('home/index', [
            'title'  => 'Today',
            'active' => 'home',
            'today'  => $today,
            'tasks'  => $tasks,
            'counts' => $counts,
        ]);
    }
}
