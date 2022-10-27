<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Image;
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
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 'incomplete','mushrif', session('id')])->countAllResults();
        $data['judud0'] = $user->where(['malaf' => null, 'status' => 0, 'jamia' => $role['jamia']])->countAllResults();
        $data['judud1'] = $user->where(['malaf' => null, 'status' => 0, 'jamia' => $role['jamia']])->countAllResults();
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
    
    public function judud()
    {
        $user = new User();
        $dt = $user->find(session('id'));
        
        $data['users'] = $user->where(['nationality' => $dt['nationality'], 'jamia' => $dt['jamia'], 'status' => 0, 'malaf' => null])->findAll();
        $data['check'] = lang('app.students');
        $data['title'] = lang('app.judud').' - '.$dt['nationality'].' - '.$dt['jamia'];
        // dd($data);

        return view('mushrif/judud', $data);
    }
    
    public function user($id)
    {
        $user = new User();
        // $dt = $user->find($id);
        
        $data['user'] = $user->find($id);
        $data['title'] = lang('app.jadid');
        // dd($data);

        return view('mushrif/user', $data);
    }

    public function active($id)
    {
        helper('form');

        $img = new Image();
        $user = new User();

        $data['img'] = $img->where('userId', $id)->first();
        $data['user'] = $user->find($id);
        $data['title'] = lang('app.data');
        // dd($data);

        if (!$data['img']) {
            $insert = [
                'userId' => $id
            ];
            $img->save($insert);
        }

        // dd($data);
        return view('mushrif/image', $data);
    }

    public function activate($id)
    {
        dd($id);
        helper('form');

        $img = new Image();
        $user = new User();

        $data['img'] = $img->where('userId', $id)->first();
        $data['user'] = $user->find($id);
        $data['title'] = lang('app.data');
        // dd($data);

        if (!$data['img']) {
            $insert = [
                'status' => 1
            ];
            $img->update($id, $insert);
        }

        // dd($data);
        return view('mushrif/image', $data);
    }
}
