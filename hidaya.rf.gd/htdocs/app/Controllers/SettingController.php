<?php

namespace App\Controllers;

use App\Models\Tanfidh;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;

class SettingController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $user = new User();
        $tanfidh = new Tanfidh();

        $role = $user->find($_SESSION['id']);
        $data['lead'] = $tanfidh->where('mushrif', $_SESSION['id'])->countAllResults();
        $data['complt'] = $tanfidh->where(['tnfdhStatus' => 'completed', 'mushrif', $_SESSION['id']])->countAllResults();
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 'incomplete', 'mushrif', $_SESSION['id']])->countAllResults();
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 'completed', 'mushrif', $_SESSION['id']])->countAllResults();
        $data['judud'] = $user->where(['malaf' => null, 'jamia' => $role['jamia']])->countAllResults();
        $data['users'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia']])->findAll();
        $data['all'] = $user->countAllResults();
        $data['full'] = $user->countAll();
        $data['title'] = lang('app.dashboard');
        // dd($data['full']);exit;

        return view('settings/index', $data);
    }
}
