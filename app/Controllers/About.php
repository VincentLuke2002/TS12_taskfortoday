<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index(): string
    {
        return view('about/index', [
            'title'         => 'About',
            'active'        => 'about',
            'developerName' => env('app.developerName', 'Vincent Luke Elpedez'),
        ]);
    }
}
