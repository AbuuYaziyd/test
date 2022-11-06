<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Umrah;
use App\Models\User;

class UmrahController extends BaseController
{
    public function index($date)
    {
        helper('form');

        $umrah = new Umrah();

        $data['title'] = lang('app.tanfidh').' - '.date('d/m/Y', strtotime($date));
        $data['next'] = $date;
        $data['umrah'] = $umrah->where(['userId' => session('id'), 'tnfdhDate' => $data['next']])->orderBy('tnfdhId', 'DESC')->first();
        $data['green'] = $umrah->where(['userId' => session('id'), 'tnfdhDate' => $data['next'], 'tnfdhStatus' => 'completed'])->first();
        // dd(($data));

        return view('umrah/index', $data);
    }

    public function create()
    {
        // dd($this->request->getVar());
        $umrah = new Umrah();
        $user = new User();

        $id = $this->request->getVar('id');
        $tanfidh = $this->request->getVar('tanfidh');
        $usr = $user->find(session('id'));
        $mushrif = $user->where(['nationality' => ($usr['nationality']), 'jamia' => ($usr['jamia']), 'role' => 'mushrif'])->first()['id'];

        $data['title'] = lang('app.umrah');
        $check = $umrah->where(['userId' => $id, 'tnfdhDate' => $tanfidh])->countAllResults();
        // dd($mushrif);

        if (!$check) {
            $reg = [
                'userId' => session('id'),
                'tnfdhDate' => $tanfidh,
                'mushrif' => $mushrif,
            ];
            // dd($reg);
            
            $umrah->save($reg);

            return redirect()->to('umrah/check/'.$tanfidh)->with('type', 'success')->with('text', lang('app.regOk'))->with('title', lang('app.done'));
        }else {
            return redirect()->to(previous_url());
        }
    }

    public function show($id)
    {
        helper('form');

        $umrah = new Umrah();

        $ok = $umrah->find($id);

        // dd($ok);
        if (!$ok) {
            return redirect()->to('umrah/create');
        } else {
            $data['title'] = lang('app.umrah');
            $data['umrah'] = $ok;
            // dd($data);

            return view('umrah/edit', $data);
        }
    }

    public function update($id)
    {
        $umrah = new Umrah();

        $user = $umrah->find($id);
        $next = $user['tnfdhDate'];
        $upl = 'tasrih';
        // dd($user);

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
            return redirect()->to('umrah/show/'.$id)->with('type', 'error')->with('title', lang(
            'app.errorOccured'))->with('text', $data['errors']['img']);
        }

        $pic = $user['tasrih']??sprintf('%04s',session('malaf'));

        // dd(file_exists('app-assets/images/tasrih/' . $pic));
        if (file_exists('app-assets/images/tasrih/' . $pic)) {
            $path = 'app-assets/images/tasrih/' . $pic;

            unlink($path);

            $img = $this->request->getFile('img');
            $ext = $img->getClientExtension();
            $name = sprintf('%04s',session('malaf')) . '.' . $ext;

            $ppn = [$upl => $name,];
            // dd($ppn);

            $img->move('app-assets/images/tasrih/', $name);
            $umrah->update($id, $ppn);

            return redirect()->to('umrah/check/' . $next)->with('type', 'success')->with('text', lang('app.imageUploaded'))->with('title', lang('app.success'));
        } else {
            $img = $this->request->getFile('img');
            $ext = $img->getClientExtension();
            $name = sprintf('%04s',session('malaf')) . '.' . $ext;

            $ppn = [$upl => $name,];
            // dd($ppn);

            $img->move('app-assets/images/tasrih/', $name);
            $umrah->update($id, $ppn);

            return redirect()->to('umrah/check/' . $next)->with('type', 'success')->with('text', lang('app.imageUploaded'))->with('title', lang('app.success'));
        }
    }

    public function loc($id)
    {
        $umrah = new Umrah();

        $data['umrah'] = $umrah->find($id);
        $data['title'] = lang('app.'.$this->request->getVar('locType'));
        // dd($data);
        return view('umrah/loc',$data);
    }

    public function makkah($id)
    {
        $umrah = new Umrah();

        $dt = $umrah->find($id);
        $data = [
            'makkah' => $this->request->getVar('makkah')
        ];
        // dd($this->request->getVar());

        $ok = $umrah->update($id, $data);

        if ($ok) {
            return redirect()->to('umrah/check/' . $dt['tnfdhDate'])->with('type', 'success')->with('text', lang('app.locSentMiqat'))->with('title', lang('app.success'));
        } else {
            return redirect()->to('umrah/check/' . $dt['tnfdhDate'])->with('type', 'error')->with('text', lang('app.error'))->with('title', lang('app.sorry'));
        }
    }

    public function miqat($id)
    {
        $umrah = new Umrah();

        $dt = $umrah->find($id);
        $data = [
            'miqat' => $this->request->getVar('miqat')
        ];
        // dd($data);

        $ok = $umrah->update($id, $data);

        if ($ok) {
            return redirect()->to('umrah/check/' . $dt['tnfdhDate'])->with('type', 'success')->with('text', lang('app.locSentMiqat'))->with('title', lang('app.success'));
        } else {
            return redirect()->to('umrah/check/' . $dt['tnfdhDate'])->with('type', 'error')->with('text', lang('app.error'))->with('title', lang('app.sorry'));
        }
    }
}
