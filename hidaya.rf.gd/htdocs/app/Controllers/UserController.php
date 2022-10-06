<?php

namespace App\Controllers;

use App\Models\Bank;
use App\Models\Hits;
use App\Models\User;
use App\Models\Country;
use CodeIgniter\RESTful\ResourceController;
// use RecursiveIteratorIterator;
// use DiyRecursiveDecorator;
// use RecursiveDirectoryIterator;
// use RecursiveTreeIterator;
// use ZipArchive;

class UserController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
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

        if ($role['role'] == 'user') {
            return view('user/index', $data);
        }elseif ($role['role'] == 'admin') {
            return redirect()->to('admin');
        }else {
            return redirect()->to('set');
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $user = new User();

        $data['title'] = lang('app.profile');
        $data['user'] = $user->find($id);

        return view('user/profile', $data);
    }


    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        helper('form');

        $user = new User();
        $bank = new Bank();
        $nat = new Country();

        $data['title'] = lang('app.profile');
        $data['user'] = $user->find($id);
        $data['bank'] = $bank->findAll();
        $data['nat'] = $nat->findAll();

        // dd($data);
        return view('user/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $user = new User();

        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'bank' => $this->request->getVar('bank'),
            'iban' => $this->request->getVar('iban'),
        ];
        // dd($data);

        $ok = $user->update($id, $data);

        if (!$ok) {
            return redirect()->to('user/edit/'.$id)->with('type', 'error')->with('title', lang('app.done'))->with('text', lang('app.errorOccured'));
        } else {
            return redirect()->to('user/profile/'.$id)->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.edit').' '. lang('app.profile'));
        }
        

    }

    public function zip($loc)
    {
        // $loc is the location of files to be downloaded!
        $user = new User();
        $source = 'app-assets/images/'.$loc;
        $destination = FCPATH.'compressed';
        $zipcreation = $user->zip_creation($source, $destination);
        // dd(FCPATH . 'assets/compressed.zip');

        return $this->response->download(FCPATH . 'compressed.zip', null);
    }
}