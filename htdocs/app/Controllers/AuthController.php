<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth;
use App\Models\Hits;

class AuthController extends BaseController
{
    public function login()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $hits = new Hits();
        // Check for previous visits
        $query = $hits->where('ip', $ip, 1, 0)->get();
        $check = count($query->getResult());

        // dd($check);exit;
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

        // dd($check);exit;
        if ($check < 1) {
            $data = [
                'ip' => $ip,
            ];
            // Never visited - add
            $hits->insert($data);
        }
        helper('form');

        $data['title'] = lang('app.signup');

        return view('auth/register',$data);
    }

    public function secure()
    {
        // dd($this->request->getVar());exit;

        helper('form');

        $input = $this->validate(
            [   //Rules
                'username' => 'required|min_length[3]|is_unique[users.username]|alpha_numeric',
                'email' => 'required|valid_email|is_unique[users.email]',
                'phone' => 'required|exact_length[9]',
                'sex' => 'required',
                'dob' => 'required',
                'password' => 'required|min_length[4]|max_length[50]',
            ],
            [   // Errors
                'username' =>
                [
                    'alpha_numeric' => lang('error.alpha_numeric'),
                    'required' => lang('error.required'),
                    'is_unique' => lang('error.is_unique'),
                    'min_length' => lang('error.min_length'),
                ],
                'email' => [
                    'required' => lang('error.required'),
                    'valid_email' => lang('error.valid_email'),
                    'is_unique' => lang('error.is_unique'),
                ],
                'phone' => [
                    'required' => lang('error.required'),
                    'exact_length' => lang('error.exact_length'),
                ],
                'sex' => [
                    'required' => lang('error.required'),
                ],
                'dob' => [
                    'required' => lang('error.required'),
                ],
                'password' => [
                    'min_length' => lang('error.min_length'),
                    'max_length' => lang('error.max_length'),
                    'required' => lang('error.required'),
                ],
            ]
        );

        if (!$input) {
            $data['title'] = lang('app.register');
            $data['validation'] = $this->validator;
            echo view('auth/register', $data);
        } else {

            $auth = new Auth();

            $query = $auth->orderBy('id', 'desc')->first();

            // dd($query);exit;
            $invc = $query['malaf'];
            $invc = substr($invc, 10, 13);
            $invc = $invc + 1;
            $invc = "ABM" . date("m") . date("y") . sprintf('%04s', $invc);
            // dd($invc);exit;

            $data = [
                'username'   => $this->request->getVar('username'),
                'email'      => $this->request->getVar('email'),
                'password'   => password_hash(strtoupper($this->request->getVar('password')), PASSWORD_DEFAULT),
                'phone'      => $this->request->getVar('phone'),
                'sex'        => $this->request->getVar('sex'),
                'dob'        => $this->request->getVar('dob'),
                'malaf'      => $invc,
            ];

            dd($data); exit;
            $ok = $auth->save($data);

            if ($ok) {
                return redirect()->to('login')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
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

        // dd($check);exit;
        if ($check < 1) {
            $data = [
                'ip' => $ip,
            ];
            // Never visited - add
            $hits->insert($data);
        }
        $session = session();
        $auth = new Auth();

        $identity = $this->request->getVar('identity');
        $password = $this->request->getVar('password');
        $data = $auth->where('username', $identity)->orWhere('email', $identity)->first();

        // dd($data);exit;

        if ($data) {
            $pass = $data['password'];
            $verify = password_verify($password, $pass);

            if ($verify) {
                $sessData = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'fn' => $data['fn'],
                    'role' => $data['role'],
                    'locale' => $session->locale ?? 'ar',
                    'isLoggedIn' => TRUE
                ];
                $session->set($sessData);
                return redirect()->to('user');
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
                'old' => 'required|min_length[3]',
            ],
            [   // Errors
                'old' => [
                    'min_length' => lang('error.min_length'),
                    'required' => lang('error.required'),
                ],
            ]
        );

        $auth = new Auth();

        $old = $this->request->getVar('old');
        $new = $this->request->getVar('new');

        $data = $auth->find($id);
        $pass = $data['password'];
        $test = password_verify($old, $pass);
            // dd($test); exit;

        if (!$input) {
            $data['title'] = lang('app.passchange');
            $data['validation'] = $this->validator;
            echo view('auth/change', $data);
        } elseif (!$test) {
            $data['title'] = 'settings';
            return redirect()->to('change/password')->with('text', lang('app.notokoldpass'))->with('type', 'error')->with('title', lang('app.sorry'));
        } else {
            $data = [
                'password' => password_hash($new, PASSWORD_DEFAULT)
            ];

            // dd($data); exit;
            $ok = $auth->update($id, $data);

            if ($ok) {
                return redirect()->to('user')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.passchanged'));
            } else {
                return redirect()->to('change/password')->with('type', 'error')->with('text', lang('app.errorOccured'))->with('title', lang('app.sorry'));
            }
        }
    }

    public function recover()
    {
        // helper('form');
        // $data['title'] = lang('app.recoverpassword');

        return redirect()->to('login')->with('text', lang('app.contactAdmin'))->with('title', lang('app.sorry'))->with('type', 'info');
    }

    public function password()
    {
        // dd($this->request->getVar());exit;
        helper('form');

        $input = $this->validate(
            [   //Rules
                'identity' => 'required|min_length[3]',
                'email' => 'required|valid_email',
                'phone' => 'required|exact_length[9]',
            ],
            [   // Errors
                'identity' =>
                [
                    'required' => lang('error.required'),
                    'min_length' => lang('error.min_length'),
                ],
                'email' => [
                    'required' => lang('error.required'),
                    'valid_email' => lang('error.valid_email'),
                ],
                'phone' => [
                    'required' => lang('error.required'),
                    'exact_length' => lang('error.exact_length'),
                ],
            ]
        );

        if (!$input) {
            $data['title'] = lang('app.recoverpassword');
            $data['validation'] = $this->validator;
            echo view('auth/forgot', $data);
        } else {
            $auth = new Auth();

            $identity = strtolower($this->request->getVar('identity'));
            $email = strtolower($this->request->getVar('email'));
            $phone = $this->request->getVar('phone');
            $data = $auth->where('email', $email)->orWhere('username', $identity)->first();
            // dd($data);exit;

            if ($data > 0) {
                if (!($email == $data['email'] || $identity == $data['username'] && $phone == $data['phone'])) {
                    return redirect()->to('recover')->with('type', 'error')->with('title', lang('app.incorrect'))->with('text', lang('app.email') . '/' . lang('app.phone') .' ' . lang('app.plzTry'));
                } else {
                    $id = $data['id'];

                    $data = [
                        'password' => password_hash('12345', PASSWORD_DEFAULT),
                    ];

                    $ok = $auth->update($id, $data);

                    if ($ok) {
                        return redirect()->to('login')->with('type', 'success')->with('text', lang('app.passchanged').' '. lang('app.use12345'))->with('title', lang('app.done'));
                    }
                }
            } else {
                // dd(lang('app.notFound'));exit;
                return redirect()->to('recover')->with('type', 'error')->with('text', lang('app.notFound'))->with('title', lang('app.sorry'));
            }
        }
    }

    public function test()
    {
        // $auth = new Auth();

        $data['test'] = password_hash('12345', PASSWORD_DEFAULT);
        dd($data);exit;

        // $query = $auth->orderBy('id', 'desc')->first();

        // dd($query);exit;
        // $invc = $query['malaf'];
        // $invc = substr($invc, 10, 13);
        // $invc = $invc + 1;
        // $invc = "ABM" . date("m") . date("y") . sprintf('%04s', $invc);
        // dd($invc);exit;
    }
}