<?php

namespace App\Controllers;

use App\Models\University;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = lang('app.welcome');
        
        return view('welcome', $data);
    }

    public function test()
    {
        $uni = new University();
        $u = $uni->findAll();
        echo '$data = [<br>';
        foreach ($u as $dt) {
            echo '[\'uni_name\' => \''.$dt['COL 1'].'\', ';
            echo '\'uni_reg\' => \''.$dt['COL 2'].'\'],<br>';
        }
        echo '];';
        // dd($u);
    }
}
