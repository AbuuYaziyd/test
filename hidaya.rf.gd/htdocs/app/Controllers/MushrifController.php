<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Image;
use App\Models\Setting;
use App\Models\Tanfidh;
use App\Models\Umrah;
use App\Models\User;

class MushrifController extends BaseController
{
    public function index()
    {
        $user = new User();
        $tanfidh = new Tanfidh();
        $set = new Setting();

        $role = $user->find($_SESSION['id']);
        $data['lead'] = $tanfidh->where('mushrif', session('id'))->countAllResults();
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 'incomplete','mushrif', session('id')])->countAllResults();
        $data['judud0'] = $user->where(['malaf' => null, 'status' => null, 'jamia' => $role['jamia'], 'nationality' => $role['nationality']])->countAllResults();
        $data['judud1'] = $user->where(['malaf' => null, 'status' => 0, 'jamia' => $role['jamia'], 'nationality' => $role['nationality']])->countAllResults();
        $data['set'] = $set->where(['name' => 'tanfidhDate', 'value>=' => date('Y-m-d')])->findAll();
        // $data['users'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia'], 'nationality' => $role['nationality']])->findAll();
        $data['all'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia']])->countAllResults();
        $data['full'] = $user->countAll();
        $data['title'] = lang('app.dashboard');
        // dd($data);

        if (session('role') == 'mushrif') {
            return view('mushrif/index', $data);
        } else {
            return redirect()->to('user');
        }   
    }
    
    public function users()
    {
        $user = new User();
        $dt = $user->find(session('id'));
        
        $data['users'] = $user->where(['nationality' => $dt['nationality'], 'jamia' => $dt['jamia']])->findAll();
        $data['check'] = lang('app.students');
        $data['title'] = lang('app.students').' - '.$dt['nationality'].' - '.$dt['jamia'];
        // dd($data);

        if (session('role') == 'mushrif') {
            return view('mushrif/users', $data);
        } else {
            return redirect()->to('user');
        }   
    }
    
    public function judud()
    {
        $user = new User();
        $dt = $user->find(session('id'));
        
        $data['users'] = $user->where(['nationality' => $dt['nationality'], 'jamia' => $dt['jamia'], 'malaf' => null])->findAll();
        $data['check'] = lang('app.students');
        $data['title'] = lang('app.judud').' - '.$dt['nationality'].' - '.$dt['jamia'];
        // dd($data);

        if (session('role') == 'mushrif') {
            return view('mushrif/judud', $data);
        } else {
            return redirect()->to('user');
        }   
    }
    
    public function user($id)
    {
        $user = new User();
        // $dt = $user->find($id);
        
        $data['user'] = $user->find($id);
        $data['title'] = lang('app.jadid');
        // dd($data);

        if (session('role') == 'mushrif') {
            return view('mushrif/user', $data);
        } else {
            return redirect()->to('user');
        }   
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
        $data['img'] = $img->where('userId', $id)->first();
        }
        // dd($data);

        if (session('role') == 'mushrif') {
            return view('mushrif/image', $data);
        } else {
            return redirect()->to('user');
        }   
    }

    public function activate($id)
    {
        helper('form');

        $user = new User();

        $data['user'] = $user->find($id);
        $data['title'] = lang('app.data');
        // dd($data);

        $insert = [
            'status' => 0
        ];
        $ok = $user->update($id, $insert);
        // dd($data);
        if ($ok) {
            return redirect()->to('mushrif/judud')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.activate') . ' ' . lang('app.student') . ' ' . lang('app.success'));
        }
    }

    public function tasrih($date)
    {
        $tanfidh = new Umrah();
        $data['tanfidh'] = $tanfidh->where(['tnfdhDate' => $date])->findAll();
        dd($data);
    }
}
