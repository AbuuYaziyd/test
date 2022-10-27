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
        $data['lead'] = $tanfidh->where('mushrif', $_SESSION['id'])->countAllResults();
        $data['complt'] = $tanfidh->where(['tnfdhStatus' => 'completed','mushrif', $_SESSION['id']])->countAllResults();
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 'incomplete', 'mushrif', $_SESSION['id']])->countAllResults();
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 'completed','mushrif', $_SESSION['id']])->countAllResults();
        $data['judud'] = $user->where(['malaf' => null, 'jamia' => $role['jamia']])->countAllResults();
        $data['users'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia']])->findAll();
        $data['all'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia']])->countAllResults();
        $data['full'] = $user->countAll();
        $data['title'] = lang('app.dashboard');
        // dd($data['full']);

        return view('admin/index', $data);
    }
    
    public function users($usr, $jamia)
    {
        $user = new User();
        
        $data['users'] = $user->where(['nationality' => $usr, 'jamia' => $jamia])->findAll();
        $data['check'] = lang('app.students');
        $data['title'] = lang('app.students').' - '.$usr.' - '.$jamia;

        // dd($data);
        return view('admin/usersAll', $data);
    }
}
