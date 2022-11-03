<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Setting;
use App\Models\Umrah;

class UmrahController extends BaseController
{
    public function index()
    {
        helper('form');
        $umrah = new Umrah();
        $set = new Setting();

        $data['title'] = lang('app.umrah');
        $data['next'] = $set->where('name', 'tanfidh')->first()['value'];
        $data['umrah'] = $umrah->where(['userId' => session('id'), 'tnfdhDate' => $data['next']])->orderBy('tnfdhId', 'DESC')->first();
        $data['green'] = $umrah->where(['userId' => session('id'), 'tnfdhDate' => $data['next'], 'tnfdhStatus' => 'completed'])->first();
        // dd(!($data['umrah']));

        return view('umrah/index', $data);
    }

    public function create()
    {
        $umrah = new Umrah();
        $set = new Setting();

        $data['title'] = lang('app.umrah');
        $next = $set->where('name', 'tanfidh')->first()['value'];
        $check = $umrah->where(['userId' => session('id'), 'tnfdhDate' => $next])->countAllResults();
        // dd($data);

        if (!$check) {
            $reg = [
                'userId' => session('id'),
                'tnfdhDate' => $next,
            ];
            
            $umrah->save($reg);

            return redirect()->to('umrah')->with('type', 'success')->with('text', lang('app.regOk'))->with('title', lang('app.done'));
        }else {
            return redirect()->to('umrah/show/'.session('id'));
        }
    }

    public function show($id)
    {
        helper('form');

        $umrah = new Umrah();
        $set = new Setting();
        dd($id);

        $data['next'] =  $set->where('name', 'tanfidh')->first()['value'];
        $ok = $umrah->where(['userId' => $id, 'tnfdhDate' => $data['next']])->orderBy('tnfdhId', 'DESC')->first();

        if (!$ok) {
            return redirect()->to('umrah/create');
        } else {
            $data['title'] = lang('app.umrah');
            $data['umrah'] = $umrah->where(['userId' => $id, 'tnfdhDate' => $data['next']])->find($ok['tnfdhId']);
            dd($ok);

            return view('umrah/edit', $data);
        }
    }

    public function update($id = null)
    {
        $umrah = new Umrah();
        $next = '30/04/2022';
        $upl = 'tasrih';
        // dd($this->request->getVar());

        $validationRule = $this->validate(
            [
                'img' => 'uploaded[img]|mime_in[img,image/jpg,image/jpeg,image/png]|max_size[img,200]',
            ],
            [   // Errors
                'img' => [
                    'uploaded' => lang('error.uploaded'),
                    'mime_in' => lang('error.mime'),
                    'max_size' => lang('error.max_size'),
                ],
            ]
        );

        if (!$validationRule) {
            $data = ['errors' => $this->validator->getErrors()];

            helper('form');
            $data['title'] = lang('app.data');
            // dd($data['errors']['img']);
            return redirect()->to('umrah/edited/'.$id)->with('type', 'error')->with('title', lang(
            'app.errorOccured'))->with('text', $data['errors']['img']);
        }

        $pic = $umrah->where(['userId' => session('id'), 'tnfdhDate' => $next ])->first();

        // dd(file_exists('app-assets/images/tasrih/' . $pic[$upl]));
        if (file_exists('app-assets/images/tasrih/' . $pic[$upl])) {
            $path = 'app-assets/images/tasrih/' . $pic[$upl];

            unlink($path);

            $img = $this->request->getFile('img');
            $ext = $img->getClientExtension();
            $name = $_SESSION['malaf'] . '.' . $ext;

            $ppn = [$upl => $name,];
            // dd($name);

            $img->move('app-assets/images/tasrih/', $name);
            $umrah->update($id, $ppn);

            // dd($test);
            return redirect()->to('umrah/edited/' . $id)->with('type', 'success')->with('text', lang('app.imageUploaded'))->with('title', lang('app.success'));
        } else {
            $img = $this->request->getFile('img');
            $ext = $img->getClientExtension();
            $name = $_SESSION['malaf'] . '.' . $ext;

            $ppn = [$upl => $name,];
            // dd($pic);

            $img->move('app-assets/images/tasrih/', $name);
            $umrah->update($id, $ppn);

            return redirect()->to('umrah/edited/' . $id)->with('type', 'success')->with('text', lang('app.imageUploaded'))->with('title', lang('app.success'));
        }
    }

    public function done()
    {
        $data = $this->request->getVar();

        $data['title'] = lang('app.umrah');
        // dd($data);
        return view('umrah/loc',$data);
    }

    public function link()
    {
        $umrah = new Umrah();

        $data['title'] = lang('app.umrah');
        $data['next'] = '30/04/2022';
        $data['umrah'] = $umrah->where(['userId' => session('id'), 'tnfdhDate' => $data['next']])->countAllResults();

        // dd($data);
        return view('umrah/loc', $data);
    }
}
