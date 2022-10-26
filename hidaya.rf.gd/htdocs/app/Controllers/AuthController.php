<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bank;
use App\Models\Country;
use App\Models\Hits;
use App\Models\User;

class AuthController extends BaseController
{
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
        
        $data['title'] = lang('app.signup');
        $data['nat'] = $nat->findAll();
        $data['bank'] = $bank->findAll();

        return view('auth/register',$data);
    }

    public function secure()
    {
        helper('form');

        $input = $this->validate(
            [   //Rules
                'name' => 'required|min_length[3]|max_length[50]|is_unique[users.name]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'iban' => 'required|exact_length[24]',
                'iqama' => 'required|exact_length[10]',
                'phone' => 'required|exact_length[9]',
                'nationality' => 'required',
                'jamia' => 'required',
                'bank' => 'required',
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
                'email' => [
                    'required' => lang('error.required'),
                    'valid_email' => lang('error.valid_email'),
                    'is_unique' => lang('error.is_unique'),
                ],
                'iqama' => [
                    'required' => lang('error.required'),
                    'exact_length' => lang('error.min_length'),
                ],
                'iban' => [
                    'required' => lang('error.required'),
                    'exact_length' => lang('error.min_length'),
                ],
                'phone' => [
                    'required' => lang('error.required'),
                    'exact_length' => lang('error.min_length'),
                ],
                'check' => [
                    'required' => lang('error.required'),
                ],
                'bank' => [
                    'required' => lang('error.required'),
                ],
                'jamia' => [
                    'required' => lang('error.required'),
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

            $data['nat'] = $nat->findAll();
            $data['bank'] = $bank->findAll();
            $data['title'] = lang('app.register');
            $data['validation'] = $this->validator;
            echo view('auth/register', $data);
        } else {

            $user = new User();

            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('iqama'), PASSWORD_DEFAULT),
                'iban' => $this->request->getVar('iban'),
                'iqama' => $this->request->getVar('iqama'),
                // 'malaf' => $this->request->getVar('malaf'),//4mula
                'phone' => $this->request->getVar('phone'),
                'nationality' => $this->request->getVar('nationality'),
                'jamia' => $this->request->getVar('jamia'),
                'bank' => $this->request->getVar('bank'),
            ];

            // dd($data); 
            $ok = $user->save($data);
            // $id = $user->insertID;
            $ok = true;
            if ($ok) {
                return redirect()->to('login')->with('type', 'success')->with('text', lang('app.useIqamaAsPassword'))->with('title', lang('app.registerSuccess'));
            }
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

        $identity = $this->request->getVar('identity');
        $password = $this->request->getVar('password');
        $data = $user->where('email', $identity)->orWhere('malaf', $identity)->first();

        // dd($data);

        if ($data) {
            $pass = $data['password'];
            $auth = password_verify($password, $pass);

            if ($auth) {
                $sessData = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'malaf' => $data['malaf'],
                    // 'img' => $data['img'],
                    'role' => $data['role'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($sessData);
                return redirect()->to('/user');
            }else {
                return redirect()->to('login')->with('password', lang('app.wrongPassword'));
            }
        }else {
            return redirect()->to('login')->with('identity', lang('app.notSigned'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function pass()
    {
        helper('form');
        $data['title'] = lang('app.recoverpassword');

        return view('auth/change', $data);
    }

    public function change($id)
    {
        helper('form');
        $input = $this->validate(
            [   //Rules
                'old' => 'required',
            ],
            [   // Errors
                'old' => [
                    'required' => lang('error.required'),
                ],
            ]
        );

        $user = new User();

        $old = $this->request->getVar('old');
        $new = $this->request->getVar('new');

        $data = $user->find($id);
        $pass = $data['password'];
        $auth = password_verify($old, $pass);
            // dd($auth); 

        if (!$input) {
            $data['title'] = lang('app.passchange');
            $data['validation'] = $this->validator;
            echo view('auth/change', $data);
        } elseif (!$auth) {
            $data['title'] = 'settings';
            return redirect()->to('change/password')->with('title', lang('app.notokoldpass'))->with('type', 'error');
        } else {


            $data = [
                'password' => password_hash($new, PASSWORD_DEFAULT)
            ];

            // dd($data); 
            $ok = $user->update($id, $data);

            if ($ok) {
                return redirect()->to('login')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.passchanged'));
            } else {
                return redirect()->to('password/change')->with('toast', 'danger')->with('message', lang('app.errorOccured'));
            }
        }
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

        $identity = $this->request->getVar('identity');
        $iqama = $this->request->getVar('iqama');
        $phone = $this->request->getVar('phone');
        $data = $user->where('email', $identity)->orWhere('malaf', $identity)->first();
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
                    return redirect()->to('login')->with('type', 'success')->with('text', lang('app.passchanged'))->with('title', lang('app.done'));
                }
            }
        }else {        
            // dd(lang('app.notFound'));
            return redirect()->to('recover')->with('icon', 'error')->with('text', lang('app.notFound'))->with('title', lang('app.sorry'));
        }
    }

    public function test()
    {
        $test = password_hash('1234', PASSWORD_DEFAULT);
        dd($test);
    }
}
