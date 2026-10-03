<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;

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

    public function toggle(int $id): RedirectResponse
    {
        $model = new TaskModel();
        $task = $model->find($id);

        if ($task === null) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        $isCompleted = $task['status'] === 'completed';
        $newStatus = $isCompleted ? 'pending' : 'completed';
        $model->update($id, ['status' => $newStatus]);

        $message = $isCompleted
            ? 'Task reopened and moved back to pending.'
            : 'Task completed. Nice work.';

        $returnTo = $this->request->getPost('return_to') === 'today' ? '/' : '/tasks';

        return redirect()->to(site_url($returnTo))->with('message', $message);
    }
}
