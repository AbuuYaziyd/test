<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Whatsapp;

class WhatsappController extends BaseController
{
    public function index()
    {
        $whats = new Whatsapp();

        $data['title'] = lang('app.whatsapp');
        $data['whats'] = $whats->findAll();
        // dd($data);

        return view('whatsapp/index', $data);
    }

    public function show($id)
    {
        dd($id);
    }

    public function edit($id)
    {
        // dd($this->request->getVar());
        $whats = new Whatsapp();

        $data = [
            'link' => $this->request->getVar('link'),
        ];
        // dd($data);

        $ok = $whats->update($id, $data);
        if ($ok) {
            return redirect()->back()->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.doneSuccess'));
        } else {
            return redirect()->back()->with('type', 'error')->with('title', lang('app.done'))->with('text', lang('app.errorOccured'));
        }
    }
}
