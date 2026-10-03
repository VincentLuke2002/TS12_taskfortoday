<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Profile extends BaseController
{
    public function index(): string
    {
        $user = (new UserModel())->orderBy('id', 'ASC')->first();

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('The demo profile has not been seeded yet.');
        }

        return view('profile/index', [
            'title'  => 'Profile',
            'active' => 'profile',
            'user'   => $user,
        ]);
    }
}
