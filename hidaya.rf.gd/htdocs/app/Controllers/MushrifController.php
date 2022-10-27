<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tanfidh;
use App\Models\User;

class MushrifController extends BaseController
{
    public function index()
    {
        $user = new User();
        $tanfidh = new Tanfidh();

        $role = $user->find($_SESSION['id']);
        $data['lead'] = $tanfidh->where('mushrif', session('id'))->countAllResults();
        $data['complt'] = $tanfidh->where(['tnfdhStatus' => 'completed','mushrif', session('id')])->countAllResults();
        $data['notcomplt'] = $tanfidh->where(['tnfdhStatus' => 'incomplete', 'mushrif', session('id')])->countAllResults();
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 'completed','mushrif', session('id')])->countAllResults();
        $data['judud'] = $user->where(['malaf' => null, 'status' => 0, 'jamia' => $role['jamia']])->countAllResults();
        $data['users'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia']])->findAll();
        $data['all'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia']])->countAllResults();
        $data['full'] = $user->countAll();
        $data['title'] = lang('app.dashboard');
        // dd($data);

        return view('mushrif/index', $data);
    }
    
    public function users()
    {
        $user = new User();
        $dt = $user->find(session('id'));
        
        $data['users'] = $user->where(['nationality' => $dt['nationality'], 'jamia' => $dt['jamia']])->findAll();
        $data['check'] = lang('app.students');
        $data['title'] = lang('app.students').' - '.$dt['nationality'].' - '.$dt['jamia'];
        // dd($data);

        return view('mushrif/users', $data);
    }
}
