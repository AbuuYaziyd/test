<?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = lang('app.welcome');
        
        return view('welcome', $data);
    }
}
