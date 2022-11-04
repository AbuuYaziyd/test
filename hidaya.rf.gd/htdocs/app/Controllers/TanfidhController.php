<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Setting;

class TanfidhController extends BaseController
{
    public function index()
    {
        $set = new Setting();

        $data['title'] = lang('app.tanfidh');
        $data['set'] = $set->where(['name' => 'tanfidhDate', 'value >=' => date('Y-m-d')])->findAll();
        // dd($data);

        return view('tanfidh/index', $data);
    }

    public function add()
    {
        helper('form');

        $data['title'] = lang('app.tanfidh');

        return view('tanfidh/add', $data);
    }

    public function create()
    {
        // dd($this->request->getVar());
        $set = new Setting();

        foreach ($this->request->getVar('tanfidh_date') as $key => $value) {
            // $set->insert($)
            $data = [
                'name' => 'tanfidhDate',
                'value' => $this->request->getVar('tanfidh_date')[$key],
                'info' => 'tasrihDate',
                'extra' => $this->request->getVar('tasrih_date')[$key],
            ];
            $ok = $set->insert($data);
        }
        
        if (!$ok) {
            return redirect()->to('tanfidh')->with('type', 'error')->with('title', lang('app.sorry'))->with('text', lang('app.errorOccured'));
        } else {
            return redirect()->to('tanfidh')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.doneSuccess'));
        }
    }

    public function show()
    {
        helper('form');
        $set = new Setting();

        $data['title'] = lang('app.tanfidh');
        $data['set'] = $set->where(['name' => 'tanfidhDate', 'value >=' => date('Y-m-d')])->findAll();
        // dd($data);

        return view('tanfidh/show', $data);
    }

    public function edit()
    {
        // dd($this->request->getVar());
        $set = new Setting();

        foreach ($this->request->getVar('tanfidh_date') as $key => $value) {
            // $set->insert($)
            $id = $this->request->getVar('id')[$key];
            $data = [
                'name' => 'tanfidhDate',
                'value' => $this->request->getVar('tanfidh_date')[$key],
                'info' => 'tasrihDate',
                'extra' => $this->request->getVar('tasrih_date')[$key],
            ];
            $ok = $set->update($id, $data);
        }
            // dd($id);
        
        if (!$ok) {
            return redirect()->to('tanfidh')->with('type', 'error')->with('title', lang('app.sorry'))->with('text', lang('app.errorOccured'));
        } else {
            return redirect()->to('tanfidh')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.doneSuccess'));
        }
    }
}
