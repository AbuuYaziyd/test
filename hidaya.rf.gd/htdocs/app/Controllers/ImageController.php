<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Image;
use App\Models\User;

class ImageController extends BaseController
{
    public function index()
    {
        helper('form');

        $img = new Image();
        $user = new User();

        $data['img'] = $img->where('userId', $_SESSION['id'])->first();
        $data['user'] = $user->find(session('id'));
        $data['title'] = lang('app.data');
        // dd($data);

        if (!$data['img']) {
            $insert = [
                'userId' => $_SESSION['id']
            ];
            $img->save($insert);
            $data['img'] = $img->where('userId', $_SESSION['id'])->first();
        }

        // dd($data);
        // return view('welcome', $data);
        return view('image/index', $data);
    }

    public function imgShow($id, $type)
    {
        helper('form');
        
        $img = new Image();
        $user = new User();

        $data['img'] = $img->where('userId', $id)->first();
        $data['user'] = $user->find($id);
        $data['title'] = lang('app.data');
        switch ($type) {
            case 'iqama':
        $data['type'] = 'imgIqama';
                break;
            case 'passport':
        $data['type'] = 'imgPass';
                break;
            case 'bitaqa':
        $data['type'] = 'imgStu';
                break;
            case 'iban':
        $data['type'] = 'imgIban';
                break;
        }
        // dd($data);

        if (!$data['img']) {
            $insert = [
                'userId' => $_SESSION['id']
            ];
            $img->save($insert);
        }

        return view('image/edit', $data);
    }

    public function update($id)
    {    
        $image = new Image();
        $settingz = new User();
        $nm = $settingz->find($id)['malaf'];
        $upl = $this->request->getVar('select');

        // dd($upl);
        $validationRule = $this->validate(
            [
                'img' => 'uploaded[img]|mime_in[img,image/jpg,image/jpeg,image/png]|max_size[img,200]',
                'select' => 'required',
            ],
            [   // Errors
                'img' => [
                    'uploaded' => lang('error.uploaded'),
                    'mime_in' => lang('error.mime'),
                    'max_size' => lang('error.max_size'),
                ],
                'select' => [
                    'required' => lang('error.required'),
                ],
            ]);
        // dd($validationRule);

        if (!$validationRule) {
            $data = ['errors' => $this->validator->getErrors()];

            helper('form');
            $data['title'] = lang('app.data');
            $data['type'] = $upl;
            $data['img'] = $image->where('userId', $id)->first();
            return view('image/edit', $data);
        }

        $pic = $image->where('userId', $id)->first();

        // dd($pic[$upl]);
        // dd(file_exists('app-assets/images/malaf/'.($nm??'new').'/' . ($pic[$upl]??'img.img')));
        // if ($pic[$upl] != null) {
            if (file_exists('app-assets/images/malaf/'.($nm??'new').'/' . ($pic[$upl]??'img.img'))) {
                $path = 'app-assets/images/malaf/'.($nm??'new').'/' . $pic[$upl];

                // $name = $this->request->getVar('select');
                // dd($path);

                unlink($path);

                $img = $this->request->getFile('img');
                $ext = $img->getClientExtension();
                $name = date('ymdHis') . $id . '.' . $ext;

                $ppn = [$upl => $name,];
                // dd($name);

                $img->move('app-assets/images/malaf/'.($nm??'new').'/', $name);
                $image->update($pic['imgId'], $ppn);

                // dd($test);
                return redirect()->to('image')->with('toast', 'success')->with('message', lang('app.imageEdited'))->with('title', lang('app.success'));
            } else {
                // dd($this->request->getVar());
                $img = $this->request->getFile('img');
                $ext = $img->getClientExtension();
                $name = date('ymdHis') . $id . '.' . $ext;

                $ppn = [$upl => $name,];

                $img->move('app-assets/images/malaf/'.($nm??'new').'/', $name);
                $image->update($pic['imgId'], $ppn);

                return redirect()->to('image')->with('type', 'success')->with('text', lang('app.imageUploaded'))->with('title', lang('app.success'));
            }
        // } else {
        //     $img = $this->request->getFile('img');
        //     $ext = $img->getClientExtension();
        //     $name = date('ymdHis') . $id . '.' . $ext;

        //     $ppn = [$upl => $name,];
        //     // dd($ppn);

        //     $img->move('app-assets/images/malaf/', $name);
        //     $image->update($pic['imgId'], $ppn);

        //     return redirect()->to('image')->with('type', 'success')->with('text', lang('app.imageUploaded'))->with('title', lang('app.success'));
        // }
    }
}