<?php

namespace App\Controllers;

use App\Models\Bank;
use App\Models\Hits;
use App\Models\User;
use App\Models\Country;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
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

        $role = $user->select('role')->find($_SESSION['id']);
        // dd($role);

        if ($role['role'] == 'superuser') {
            return redirect()->to('admin');
        }elseif ($role['role'] == 'admin') {
            return redirect()->to('admin');
        }elseif ($role['role'] == 'mushrif') {
            return redirect()->to('mushrif');
        }else {
            return view('user/index', $data);
        }
    }

    public function show($id = null)
    {
        $user = new User();

        $data['title'] = lang('app.profile');
        $data['user'] = $user->join('banks', 'banks.bankId=users.bank', 'left')->find($id);
        // dd($data);

        return view('user/profile', $data);
    }

    public function edit($id = null)
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

    public function update($id = null)
    {
        $email = $this->request->getVar('email');
        $user = new User();

        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $email!=null?$email: null,
            'phone' => $this->request->getVar('phone'),
            'bitaqa' => $this->request->getVar('bitaqa'),
            'passport' => $this->request->getVar('passport'),
            'bank' => $this->request->getVar('bank'),
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