<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = lang('app.welcome');
        
        return view('welcome', $data);
    }
}
