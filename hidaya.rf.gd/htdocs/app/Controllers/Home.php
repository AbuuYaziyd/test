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
        // $u = $uni->where('')->first();
        echo '$data = [<br>';
        foreach ($u as $dt) {
            echo '[\'malaf\' => \''.$dt['COL 1'].'\', ';
            echo '\'name\' => \''.$dt['COL 2'].'\', ';
            echo '\'bitaqa\' => \''.$dt['COL 1'].'\', ';
            echo '\'city\' => \''.$dt['COL 5'].'\', ';
            echo '\'level\' => \''.$dt['COL 8'].'\', ';
            echo '\'nationality\' => \''.$dt['COL 3'].'\', ';
            echo '\'jamia\' => \''.$dt['COL 9'].'\', ';
            echo '\'bank\' => \''.$dt['COL 10'].'\', ';
            echo '\'iban\' => \''.strtoupper($dt['COL 11']).'\', ';
            echo '\'passport\' => \''.$dt['COL 1'].'\', ';
            echo '\'email\' => \''.$dt['COL 1'].'@gmail.com\', ';
            echo '\'iqama\' => \''.$dt['COL 4'].'\', ';
            echo '\'role\' => \'user\', ';
            echo '\'password\' => \'password_hash('.$dt['COL 4'].', PASSWORD_DEFAULT)\', ';
            echo '\'status\' => \'1\'],<br>';
        }
        echo '];';
        // dd($u);
    }
}
