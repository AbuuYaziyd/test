<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bank;
use App\Models\Country;
use App\Models\Hits;
use App\Models\Setting;
use App\Models\University;
use App\Models\User;

class AuthController extends BaseController
{
    public function register()
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
        helper('form');

        $nat = new Country();
        $bank = new Bank();
        $user = new User();
        $set = new Setting();
        $uni = new University();
        
        $data['title'] = lang('app.signup');
        $data['nat'] = $nat->findAll();
        $data['bank'] = $bank->findAll();
        $data['uni'] = $uni->findAll();
        $user = $user->countAllResults();
        $set = $set->where('name', 'count')->first();
        if ($user >= $set['value']) {
            $data['reg'] = 1;
        } else {
            $data['reg'] = null;
        }
        // dd($data);

        return view('auth/register',$data);
    }

    public function secure()
    {
        // dd($this->request->getVar());
        helper('form');

        $input = $this->validate(
            [   //Rules
                'name' => 'required|min_length[3]|max_length[50]|is_unique[users.name]',
                'iban' => 'required|exact_length[24]',
                'iqama' => 'required|exact_length[10]|integer|is_unique[users.iqama]',
                'bitaqa' => 'required',
                'phone' => 'required|exact_length[9]|integer',
                'nationality' => 'required',
                'jamia' => 'required|integer',
                'bank' => 'required|integer',
                'check' => 'required',
                'level' => 'required',
            ],
            [   // Errors
                'name' =>
                [
                    'required' => lang('error.required'),
                    'min_length' => lang('error.min_length'),
                    'max_length' => lang('error.max_length'),
                    'is_unique' => lang('error.is_unique'),
                ],
                'iqama' => [
                    'required' => lang('error.required'),
                    'integer' => lang('error.integer'),
                    'exact_length' => lang('error.min_length'),
                    'is_unique' => lang('error.is_unique'),
                ],
                'bitaqa' => [
                    'required' => lang('error.required'),
                ],
                'iban' => [
                    'required' => lang('error.required'),
                    'exact_length' => lang('error.min_length'),
                ],
                'phone' => [
                    'required' => lang('error.required'),
                    'integer' => lang('error.integer'),
                    'exact_length' => lang('error.min_length'),
                ],
                'check' => [
                    'required' => lang('error.required'),
                ],
                'bank' => [
                    'required' => lang('error.required'),
                    'integer' => lang('error.integer'),
                ],
                'jamia' => [
                    'required' => lang('error.required'),
                    'integer' => lang('error.integer'),
                ],
                'level' => [
                    'required' => lang('error.required'),
                ],
                'nationality' => [
                    'required' => lang('error.required'),
                ],
            ]
        );
        
        if (!$input) {
            $nat = new Country();
            $bank = new Bank();
            $uni = new University();
            $set = new Setting();
            $user = new User();

            $data['nat'] = $nat->findAll();
            $data['bank'] = $bank->findAll();
            $data['uni'] = $uni->findAll();
            $set = $set->where('name', 'count')->first();
            if ($user->countAllResults() >= intval($set['value'])) {
                $data['reg'] = 1;
            } else {
                $data['reg'] = null;
            }
            // dd($user->countAllResults() >= intval($set['value']));
            $data['title'] = lang('app.register');
            $data['validation'] = $this->validator;
            echo view('auth/register', $data);
        } else {

            $user = new User();
            $mushrif = $user->where(['nationality' => $this->request->getVar('nationality'), 'jamia' => $this->request->getVar('jamia'), 'role' => 'mushrif'])->first()['id'];

            $data = [
                'name'     => $this->request->getVar('name'),
                'password' => password_hash(intval($this->request->getVar('iqama')), PASSWORD_DEFAULT),
                'iban' => strtoupper($this->request->getVar('iban')),
                'iqama' => $this->request->getVar('iqama'),
                'bitaqa' => $this->request->getVar('bitaqa'),
                'phone' => $this->request->getVar('phone'),
                'nationality' => $this->request->getVar('nationality'),
                'jamia' => $this->request->getVar('jamia'),
                'level' => $this->request->getVar('level'),
                'mushrif' => $mushrif??null,
                'status' => 0,
                'bank' => $this->request->getVar('bank'),
            ];

            // dd($data); 
            $ok = $user->save($data);
            
            if ($ok) {
                return redirect()->to('login')->with('type', 'success')->with('text', lang('app.useIqamaAsPassword'))->with('title', lang('app.registerSuccess'));
            }
        }
    }

    public function login()
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
        $data['title'] = lang('app.login');

        if (session('isLoggedIn') == true) {
            return redirect()->to('user');
        } else {
            helper('form');
            return view('auth/login', $data);
        }
    }

    public function auth()
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
        $session = session();
        $user = new User();

        // dd($this->request->getVar());
        $iqama = $this->request->getVar('iqama');
        $password = $this->request->getVar('password');
        $data = $user->where('iqama =', $iqama)->first();

        // dd($data);
        if ($data) {
            $pass = $data['password'];
            $auth = password_verify($password, $pass);

            // dd($auth);
            if ($auth) {
                $sessData = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'malaf' =>sprintf('%04s', ($data['malaf']!=1111?$data['malaf']:'----')),
                    'bitaqa' => $data['bitaqa'],
                    'role' => $data['role'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($sessData);
                return redirect()->to('/user');
            }else {
                return redirect()->to('login')->with('password', lang('app.wrongPassword'));
            }
        }else {
            return redirect()->to('login')->with('iqama', lang('app.notSigned'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function recover()
    {
        helper('form');
        $data['title'] = lang('app.recoverpassword');

        return view('auth/forgot', $data);
    }

    public function password()
    {
        helper('form');
        $user = new User();

        // dd($this->request->getVar());
        $malaf = $this->request->getVar('malaf');
        $iqama = $this->request->getVar('iqama');
        $phone = $this->request->getVar('phone');
        $data = $user->where('malaf', $malaf)->first();
        // dd($data);

        if ($data > 0) {
            if (!($iqama == $data['iqama'] && $phone == $data['phone'])) {
                return redirect()->to('recover')->with('type', 'error')->with('title', lang('app.incorrect'))->with('text', lang('app.iqama').'/'. lang('app.phone'));
            } else {
                $user = new User();
                $id = $data['id'];

                $data = [
                    'password' => password_hash($iqama, PASSWORD_DEFAULT),
                ];

                $ok = $user->update($id, $data);

                if ($ok) {
                    return redirect()->to('login')->with('type', 'success')->with('text', lang('app.passchanged'))->with('title', lang('app.ok'));
                }
            }
        }else {        
            return redirect()->to('recover')->with('type', 'error')->with('text', lang('app.notFoundIdentity'))->with('title', lang('app.sorry'));
        }
    }

    public function pass()
    {
        helper('form');
        $user = new User();

        $data['title'] = lang('app.recoverpassword');
        
        $role = $user->find(session('id'));
        $auth = password_verify('1234567890', $role['password']);
        ($auth?$data['old'] = '1234567890':$data['old'] = null);

        if (!$auth) {
            return view('auth/change', $data);
        } else {
            // dd($auth);
            return view('auth/change', $data);
        }
        

    }

    public function change($id)
    {
        helper('form');
        $input = $this->validate(
            [   //Rules
                'old' => 'required',
                'new' => 'required|min_length[8]',
            ],
            [   // Errors
                'old' => [
                    'required' => lang('error.required'),
                ],
                'new' => [
                    'required' => lang('error.required'),
                    'min_length' => lang('error.min_length'),
                ],
            ]
        );

        $user = new User();

        $old = $this->request->getVar('old');
        $new = $this->request->getVar('new');

        $role = $user->find($id);
        $pass = $role['password'];
        $auth = password_verify($old, $pass);
        // dd($auth); 

        if (!$input) {
            $data['title'] = lang('app.passchange');
            // $data['old'] = null;
            $auth = password_verify('1234567890', $role['password']);
            (!$auth?$data['old'] = null:$data['old'] = '1234567890');
            $data['validation'] = $this->validator;
            echo view('auth/change', $data);
        } elseif (!$auth) {
            $data['title'] = lang('app.recoverpassword');
            return redirect()->to('change/password')->with('title', lang('app.notokoldpass'))->with('type', 'error');
        } else {
            $data = [
                'password' => password_hash($new, PASSWORD_DEFAULT)
            ];

            // dd($data); 
            $ok = $user->update($id, $data);

            if ($ok) {
                session()->destroy();
                return redirect()->to('login')->with('type', 'success')->with('title', lang('app.ok'))->with('text', lang('app.passchanged'));
            } else {
                return redirect()->to('password/change')->with('toast', 'danger')->with('message', lang('app.errorOccured'));
            }
        }
    }
}
