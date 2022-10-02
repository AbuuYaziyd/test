<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\SubCategory;

class SubcatController extends BaseController
{
    public function index()
    {
        $sub = new SubCategory();

        $data['title'] = lang('app.subcats');
        $data['sub'] = $sub->join('categories c', 'c.cat_id=subcategories.cat_id')->findAll();
        // dd($data);

        return view('sub/index', $data);
    }

    public function new()
    {
        helper('form');
        $cat = new Category();

        // dd('add');
        $data['title'] = lang('app.subcats');
        $data['cat'] = $cat->findAll();

        return view('sub/add', $data);
    }

    public function create()
    {
        // dd($this->request->getVar());

        helper('form');

        $input = $this->validate(
            [   //Rules
                'cat_id' => 'required',
                'sub_name' => 'required|min_length[3]|is_unique[subcategories.sub_name]',
            ],
            [   // Errors
                'cat_id' =>
                [
                    'required' => lang('error.required'),
                ],
                'sub_name' =>
                [
                    'required' => lang('error.required'),
                    'is_unique' => lang('error.is_unique'),
                    'min_length' => lang('error.min_length'),
                ],
            ]
        );

        if (!$input) {
            $data['title'] = lang('app.subcats');
            $data['validation'] = $this->validator;
            echo view('sub/add', $data);
        } else {

            $sub = new SubCategory();

            $data = [
                'cat_id'   => $this->request->getVar('cat_id'),
                'sub_name'   => $this->request->getVar('sub_name'),
            ];

            // dd($data); 
            $ok = $sub->save($data);

            if ($ok) {
                return redirect()->to('subcat')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
            }
        }
    }

    public function show($id)
    {
        helper('form');
        $sub = new SubCategory();
        $cat = new Category();

        $data['title'] = lang('app.subcats');
        $data['sub'] = $sub->find($id);
        $data['cat'] = $cat->findAll();

        return view('sub/edit', $data);
    }

    public function update($id)
    {
        // dd($this->request->getVar());

        $data = [
            'cat_id' => $this->request->getVar('cat_id'),
            'sub_name' => $this->request->getVar('sub_name'),
        ];

        // dd($data);
        $sub = new SubCategory();
        $ok = $sub->update($id, $data);

        if ($ok) {
            return redirect()->to('subcat')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
        } else {
            return redirect()->to('subcat')->with('type', 'error')->with('text', lang('app.unsuccessful'))->with('title', lang('app.sorry'));
        }
    }

    public function delete($id)
    {
        // dd($id);
        $sub = new SubCategory();

        $ok = $sub->delete($id);
        
        if ($ok) {
            return redirect()->to('subcat')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
        } else {
            return redirect()->to('subcat')->with('type', 'error')->with('text', lang('app.unsuccessful'))->with('title', lang('app.sorry'));
        }
    }
}
