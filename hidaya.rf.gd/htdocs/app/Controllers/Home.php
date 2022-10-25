<?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
    public function index()
    {
        // $user = new User();

        // $data = $user->orderBy('malaf', 'ASC')->get();
        //     echo '[<br>';
        // foreach ($data->getResult() as $dt) {
        //     echo '[\'malaf\' => \''.$dt->malaf.'\', \'iqama\' => \''.$dt->iqama.'\', \'password\' => \'hashashi\', \'role\' => \''.$dt->role.'\', \'name\' => \''.$dt->name.'\', \'city\' => \''.$dt->city.'\', \'level\' => \''.$dt->level.'\', \'nationality\' => \''.$dt->nationality.'\', \'jamia\' => \''.$dt->jamia.'\', \'status\' => \''.$dt->status.'\', \'phone\' => \''.$dt->phone.'\', \'bank\' => \''.$dt->bank.'\', \'iban\' => \''.$dt->iban.'\'],<br>';
        // }
        // echo '];';
        // dd($data);
        $data['title'] = lang('app.dashboard');
        
        return view('welcome', $data);
    }
}
