<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bank;
use App\Models\Country;
use App\Models\Hits;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $hits = new Hits();
        // Check for previous visits
        $query = $hits->where('ip', $ip, 1, 0)->get();
        $check = count($query->getResult());

        // dd($check);
        if ($check < 1) {
            $data = [
                'ip' => $ip,
            ];
            // Never visited - add
            $hits->insert($data);
        }

        $user = new User();
        $data['user'] = $user->where('status', 'active')->countAllResults();
        $data['mandub'] = $user->where('role', 'mandub')->countAllResults();
        $data['jamia'] = $user->groupBy('jamia')->countAllResults();
        $data['nation'] = $user->groupBy('nationality')->countAllResults();
        $data['bank'] = $user->groupBy('bank')->countAllResults();
        $data['title'] = lang('app.dashboard');

        $role = $user->find(session('id'));
        $auth = password_verify('1234567890', $role['password']);
        // dd($auth);

        if (!$auth) {
            if ($role['role'] == 'superuser') {
                return redirect()->to('admin');
            }elseif ($role['role'] == 'admin') {
                return redirect()->to('admin');
            }elseif ($role['role'] == 'mushrif') {
                return redirect()->to('mushrif');
            }else {
                return view('user/index', $data);
            }
        } else {
            return redirect()->to('change/password');
            dd($auth);
        }
        
    }

    public function show($id)
    {
        $user = new User();

        $data['title'] = lang('app.profile');
        $data['user'] = $user->join('banks', 'banks.bankId=users.bank', 'left')->find($id);
        // dd($data);

        return view('user/profile', $data);
    }

    public function edit($id)
    {
        helper('form');

        $user = new User();
        $bank = new Bank();
        $nat = new Country();

        $data['title'] = lang('app.profile');
        $data['user'] = $user->join('banks', 'banks.bankId=users.bank', 'left')->find($id);
        $data['bank'] = $bank->findAll();
        $data['nat'] = $nat->findAll();
        // dd($data);

        return view('user/edit', $data);
    }

    public function update($id)
    {
        $email = $this->request->getVar('email');
        $user = new User();

        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $email!=null?$email: null,
            'phone' => $this->request->getVar('phone'),
            'bitaqa' => $this->request->getVar('bitaqa'),
            'passport' => strtoupper($this->request->getVar('passport')),
            'bank' => strtoupper($this->request->getVar('bank')),
            'iban' => $this->request->getVar('iban'),
        ];

        // dd($data);
        $ok = $user->update($id, $data);
        if (!$ok) {
            return redirect()->to('user/edit/'.$id)->with('type', 'error')->with('title', lang('app.sorry'))->with('text', lang('app.errorOccured'));
        } else {
            return redirect()->to('user/profile/'.$id)->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.edit').' '. lang('app.profile'));
        }
    }
}
