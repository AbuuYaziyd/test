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
}
