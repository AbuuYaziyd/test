<?php

namespace App\Controllers;

use App\Models\Setting;
use App\Models\Tanfidh;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;

class SettingController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $set = new Setting();

        $data['title'] = lang('app.settings');
        $data['set'] = $set->findAll();
        // dd($data);

        return view('settings/index', $data);
    }

    public function add()
    {
        helper('form');

        $data['title'] = lang('app.settings');

        return view('settings/add', $data);
    }

    public function create()
    {
        
        helper('form');

        $set = new Setting();

        $input = $this->validate(
            [   //Rules
                'name' => 'required',
                'value' => 'required',
            ],
            [   // Errors
                'name' => [
                    'required' => lang('error.required'),
                ],
                'value' => [
                    'required' => lang('error.required'),
                ],
            ]
        );
        
        if (!$input) {
            $data['set'] = $set->findAll();
            $data['title'] = lang('app.settings');
            $data['validation'] = $this->validator;
            echo view('settings/add', $data);
        } else {

            $data = [
                'name'     => $this->request->getVar('name'),
                'value'     => $this->request->getVar('value'),
                'info'     => $this->request->getVar('info'),
                'extra'     => $this->request->getVar('extra'),
            ];

            // dd($data); 
            $ok = $set->save($data);

            if ($ok) {
                return redirect()->to('set')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
            }
        }
    }

    public function show($id = null)
    {
        helper('form');

        $set = new Setting();

        $data['title'] = lang('app.settings');
        $data['set'] = $set->find($id);
        // dd($data);

        return view('settings/show', $data);
    }

    public function edit($id = null)
    {
        $set = new Setting();
        
        $data['title'] = lang('app.settings');
        $data['set'] = $set->find($id);

        $dt = [
            'name' => $this->request->getVar('name'),
            'value' => $this->request->getVar('value'),
            'info' => $this->request->getVar('info'),
            'extra' => $this->request->getVar('extra'),
        ];
        $ok = $set->update($id, $dt);
        // dd($dt);
        
        if ($ok) {
            return redirect()->to('set')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
        }
    }
}
