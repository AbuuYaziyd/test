<?php

namespace App\Controllers;

use App\Models\Image;
use CodeIgniter\RESTful\ResourceController;

class ImageController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        helper('form');
        $data['title'] = lang('app.data');
        $img = new Image();
        $data['img'] = $img->where('userId', $_SESSION['id'])->first();
        // dd($ok);

        if (!$data['img']) {
            $insert = [
                'userId' => $_SESSION['id']
            ];
            $img->save($insert);
        }

        // dd($data);
        return view('image/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        helper('form');
        
        $data['title'] = lang('app.data');
        $img = new Image();
        $data['img'] = $img->where('userId', $_SESSION['id'])->first();
        // dd($ok);

        if (!$data['img']) {
            $insert = [
                'userId' => $_SESSION['id']
            ];
            $img->save($insert);
        }

        return view('image/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {    
        $image = new Image();
        $upl = $this->request->getVar('select');

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
            return view('image/edit', $data);
        }

        $pic = $image->where('userId', $id)->first();

        // dd($pic[$upl]!=null);
        // if ($pic[$upl] != null) {
            if (file_exists('app-assets/images/malaf/' . $pic[$upl])) {
                $path = 'app-assets/images/malaf/' . $pic[$upl];

                unlink($path);

                $img = $this->request->getFile('img');
                $ext = $img->getClientExtension();
                $name = date('ymdHis') . $id . '.' . $ext;

                $ppn = [$upl => $name,];
                // dd($name);

                $img->move('app-assets/images/malaf/', $name);
                $image->update($pic['imgId'], $ppn);

                // dd($test);
                return redirect()->to('image')->with('toast', 'success')->with('message', lang('app.imageEdited'))->with('title', lang('app.success'));
            } else {
                dd($this->request->getVar());
                $img = $this->request->getFile('img');
                $ext = $img->getClientExtension();
                $name = date('ymdHis') . $id . '.' . $ext;

                $ppn = [$upl => $name,];

                $img->move('app-assets/images/malaf/', $name);
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
