<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Umrah;

class UmrahController extends BaseController
{
    public function index()
    {
        helper('form');
        $umrah = new Umrah();

        $data['title'] = lang('app.umrah');
        $data['next'] = '30/04/2022';
        $data['umrah'] = $umrah->where(['userId' => $_SESSION['id'], 'tnfdhDate' => $data['next']])->countAllResults();
        $data['green'] = $umrah->where(['userId' => $_SESSION['id'], 'tnfdhDate' => $data['next'], 'tnfdhStatus' => 'completed'])->first();
        // dd($data);

        return view('umrah/index', $data);
    }
    public function create()
    {
        $umrah = new Umrah();

        // $data['title'] = lang('app.umrah');
        $next = '30/04/2022';
        $check = $umrah->where(['userId' => $_SESSION['id'], 'tnfdhDate' => $next])->countAllResults();
        // $id = $umrah->where(['userId' => $_SESSION['id'], 'tnfdhDate' => $next])->first();
        // dd($id['tnfdhId']);

        if ($check <= 0) {
            $reg = [
                'userId' => $_SESSION['id'],
                'tnfdhDate' => $next,
                'tasrih' => session('malaf'),
            ];
            
            $umrah->save($reg);
            // $ok = $umrah->where(['userId' => $_SESSION['id'], 'tnfdhDate' => $next])->first();

            return redirect()->to('umrah')->with('type', 'success')->with('text', lang('app.regOk'))->with('title', lang('app.done'));
        }else {
            // return redirect()->to('umrah/edited/'. $id['tnfdhId']);
            return redirect()->to('umrah')->with('type', 'error')->with('text', lang('app.regNotOk'))->with('title', lang('app.sorry'));
        }
        // dd($_SESSION['role']);
    }

    public function show($id)
    {
        $umrah = new Umrah();

        helper('form');

        $next = '30/04/2022';
        $ok = $umrah->where(['userId' => session('id'), 'tnfdhDate' => $next])->orderBy('tnfdhId', 'DESC')->first();
        // dd($ok);
        
        $data['title'] = lang('app.umrah');
        $data['next'] = '30/04/2022';
        $data['umrah'] = $umrah->where(['userId' => $_SESSION['id'], 'tnfdhDate' => $data['next']])
        ->find($ok['tnfdhId']);
        // dd($data);

        return view('umrah/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
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

        $pic = $umrah->where(['userId' => $_SESSION['id'], 'tnfdhDate' => $next ])->first();

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

        dd($data);
        return view('umrah/loc',$data);
    }

    public function link()
    {
        $umrah = new Umrah();

        $data['title'] = lang('app.umrah');
        $data['next'] = '30/04/2022';
        $data['umrah'] = $umrah->where(['userId' => $_SESSION['id'], 'tnfdhDate' => $data['next']])->countAllResults();

        // dd($data);
        return view('umrah/loc', $data);
    }
}
