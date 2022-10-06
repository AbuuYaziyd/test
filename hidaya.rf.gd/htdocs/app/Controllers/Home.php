<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = lang('app.dashboard');
        
        return view('welcome', $data);
    }
}
