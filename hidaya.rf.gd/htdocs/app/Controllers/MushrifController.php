<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Country;
use App\Models\Image;
use App\Models\Setting;
use App\Models\Tanfidh;
use App\Models\Umrah;
use App\Models\University;
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
        $data['all'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia'],'role!=' => 'admin'])->countAllResults();
        $data['full'] = $user->where('role!=', 'admin')->countAllResults();
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
        $nat = new Country();
        $jam = new University();

        $dt = $user->find(session('id'));
        $jm = $jam->find($dt['jamia'])['uni_name'];
        $nt = $nat->where('country_code', $dt['nationality'])->first()['country_arName'];
        $data['users'] = $user->where(['nationality' => $dt['nationality'], 'jamia' => $dt['jamia']])
                            ->orderBy('role', 'asc')
                            ->findAll();
        $data['check'] = lang('app.students');
        $data['title'] = lang('app.students').' - '.$jm.' - '.$nt;
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
        $nat = new Country();
        $jam = new University();

        $dt = $user->find(session('id'));
        $data['users'] = $user->where(['nationality' => $dt['nationality'], 'jamia' => $dt['jamia'], 'malaf' => null])->findAll();
        $data['check'] = lang('app.students');
        $jm = $jam->find($dt['jamia'])['uni_name'];
        $nt = $nat->where('country_code', $dt['nationality'])->first()['country_arName'];
        $data['title'] = lang('app.judud').' - '.$nt.' - '.$jm;
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

    public function tasrih()
    {
        $tanfidh = new Umrah();
        $user = new User();

        $mr = $user
                ->join('countries c', 'c.country_code=users.nationality')
                ->join('universities u', 'u.uni_id=users.jamia')
                ->find(session('id'));
        $mushrif = $mr['id'];
        $data['tasrih'] = $tanfidh->where(['mushrif' => $mushrif, 'tnfdhStatus' => 0])
                            ->join('users u', 'u.id=tanfidh.userId')
                            ->findAll();
        $data['title'] = lang('app.tasrih');
        $data['loc'] = $mr['country_arName'].' - '.$mr['uni_name'];
        // dd($data);
        
        if (session('role') == 'mushrif') {
            return view('mushrif/tasrih', $data);
        } else {
            return redirect()->to('user');
        }   
    }

    public function sendTasrih($id)
    {
        $tanfidh = new Umrah();

        $data = [
            'tnfdhStatus' => 1,
        ];
        // dd($data);

        $ok = $tanfidh->update($id, $data);
        if ($ok) {
            return redirect()->to('mushrif/tasrih')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.activate') . ' ' . lang('app.tanfidh') . ' ' . lang('app.success'));
        }
    }

    public function tasrihDelete($id)
    {
        $tanfidh = new Umrah();
        $usr = new User();
        $nat = new Country();
        $jam = new University();
        
        $user = $tanfidh->find($id);
        $next = $user['tnfdhDate'];
        $us = $usr->find($user['mushrif']);
        $nt = $nat->where('country_code', $us['nationality'])->first()['country_arName'];
        $jm = $jam->where('uni_id', $us['jamia'])->first()['uni_name'];
        $mushrif = $nt.' - '. $jm;
        $pic = $user['tasrih']??sprintf('%04s',session('malaf'));

        // dd(file_exists('app-assets/images/tasrih/'.$mushrif.'/'. $pic));
        if (file_exists('app-assets/images/tasrih/'.$mushrif.'/' . $pic)) {
            $path = 'app-assets/images/tasrih/'.$mushrif.'/' . $pic;

            unlink($path);
        }

        $data = [
            'tasrih' => null,
            'tnfdhStatus' => 0,
        ];
        // dd($data);
        
        $ok = $tanfidh->update($id, $data);
        if ($ok) {
            return redirect()->to('mushrif/tasrih')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.activate') . ' ' . lang('app.tanfidh') . ' ' . lang('app.success'));
        }
    }
}
