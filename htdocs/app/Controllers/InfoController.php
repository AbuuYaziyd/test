<?php

namespace App\Controllers;

use App\Models\Hits;
use App\Models\Info;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;

class InfoController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $hits = new Hits();

        $data['title'] = lang('app.dashboard');
        $data['hits'] = $hits->countAll();

        return view('user/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $info = new Info();
        $user = new User();

        $find = $info->where('userId', $id)->first();
        if ($find == null) {
            $data = [
                'userId' => $id,
            ];
            // dd($data); exit;
            $ok = $info->save($data);

            if ($ok) {
                return redirect()->to('user/profile/'.$id);
            }
        }else {
            $data['title'] = lang('app.profile');
            $data['profile'] = $user->find($id);
            $data['info'] = $info->where('userId', $id)->first();
            // dd($data);exit;

            return view('user/profile', $data);
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        helper('form');

        $info = new Info();
        $user = new User();

        // dd($id);
        $data['title'] = lang('app.profile');
        $data['user'] = $user->find($id);
        $data['info'] = $info->where('userId', $id)->first();
        // dd($data);exit;

        return view('user/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    { 
        // dd($this->request->getVar());exit;

        $data = [
            'name' => strtoupper($this->request->getVar('name')),
            'lname' => strtoupper($this->request->getVar('lname')),
            'arName' => $this->request->getVar('arName'),
            'kun_yah' => $this->request->getVar('kun_yah'),
            'level' => $this->request->getVar('level'),
        ];
        // dd($data);exit;

        $info = new info();
        $find = $info->where('userId', $id)->first();
        $ok = $info->update($find['id'], $data);

        if ($ok) {
            return redirect()->to('user/profile/'. $id)->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
            return redirect()->to('user/profile/'. $id)->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
        } else {
            return redirect()->to('user/profile/' . $id)->with('type', 'error')->with('text', lang('app.unsuccessful'))->with('title', lang('app.sorry'));
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
