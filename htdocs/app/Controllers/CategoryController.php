<?php

namespace App\Controllers;

use App\Models\Category;
use CodeIgniter\RESTful\ResourceController;

class CategoryController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $cat = new Category();

        // dd('index');exit;
        $data['title'] = lang('app.category');
        $data['cat'] = $cat->findAll();

        return view('cat/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        helper('form');

        // dd($id);exit;
        $cat = new Category();

        $data['title'] = lang('app.category');
        $data['cat'] = $cat->find($id);

        return view('cat/edit', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        helper('form');

        // dd('add');exit;
        $data['title'] = lang('app.category');

        return view('cat/add', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // dd($this->request->getVar());exit;

        helper('form');

        $input = $this->validate(
            [   //Rules
                'name' => 'required|min_length[3]|is_unique[categories.name]',
            ],
            [   // Errors
                'name' =>
                [
                    'required' => lang('error.required'),
                    'is_unique' => lang('error.is_unique'),
                    'min_length' => lang('error.min_length'),
                ],
            ]
        );

        if (!$input) {
            $data['title'] = lang('app.category');
            $data['validation'] = $this->validator;
            echo view('cat/add', $data);
        } else {

            $cat = new Category();

            $data = [
                'name'   => $this->request->getVar('name'),
            ];

            // dd($data); exit;
            $ok = $cat->save($data);

            if ($ok) {
                return redirect()->to('category')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
            }
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        // dd($this->request->getVar());exit;

        $data = [
            'name' => $this->request->getVar('name'),
        ];

        // dd($data);exit;
        $cat = new Category();
        $ok = $cat->update($id, $data);

        if ($ok) {
            return redirect()->to('category')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
        }else {
            return redirect()->to('category')->with('type', 'error')->with('text', lang('app.unsuccessful'))->with('title', lang('app.sorry'));
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        // dd($id);exit;
        $cat = new Category();

        $ok = $cat->delete($id);

        if ($ok) {
            return redirect()->to('category')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
        } else {
            return redirect()->to('category')->with('type', 'error')->with('text', lang('app.unsuccessful'))->with('title', lang('app.sorry'));
        }
    }
}
