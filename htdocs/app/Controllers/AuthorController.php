<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Author;

class AuthorController extends BaseController
{
    public function index()
    {
        $author = new Author();

        $data['title'] = lang('app.authors');
        $data['author'] = $author->findAll();

        return view('author/index', $data);
    }

    public function new()
    {
        helper('form');
        $author = new Author();

        // dd('add');
        $data['title'] = lang('app.authors');
        $data['author'] = $author->findAll();

        return view('author/add', $data);
    }

    public function create()
    {
        // dd($this->request->getVar());

        helper('form');

        $input = $this->validate(
            [   //Rules
                'author_name' => 'required|min_length[3]|is_unique[subcategories.sub_name]',
            ],
            [   // Errors
                'author_name' =>
                [
                    'required' => lang('error.required'),
                    'is_unique' => lang('error.is_unique'),
                    'min_length' => lang('error.min_length'),
                ],
            ]
        );

        if (!$input) {
            $data['title'] = lang('app.authors');
            $data['validation'] = $this->validator;
            echo view('author/add', $data);
        } else {
            $dod = $this->request->getVar('author_dod');
            $author = new Author();

            $data = [
                'author_name'   => $this->request->getVar('author_name'),
                'author_dob'   => $this->request->getVar('author_dob'),
                'author_dod'   => ($dod == null ? $dod : $dod . 'هـ'),
                'author_info'   => $this->request->getVar('author_info'),
                'author_pob'   => $this->request->getVar('author_pob'),
                'author_teachers'   => $this->request->getVar('author_teachers'),
                'author_students'   => $this->request->getVar('author_students'),
                'author_madhhab'   => $this->request->getVar('author_madhhab'),
                'author_aqida'   => $this->request->getVar('author_aqida'),
            ];

            // dd($data); 
            $ok = $author->save($data);

            if ($ok) {
                return redirect()->to('author')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
            }
        }
    }

    public function show($id)
    {
        helper('form');
        $author = new Author();

        $data['title'] = lang('app.authors');
        $data['author'] = $author->find($id);
        // $data['cat'] = $cat->findAll();

        return view('author/edit', $data);
    }

    public function update($id)
    {
        // dd($this->request->getVar());

        $input = $this->validate(
            [   //Rules
                'author_name' => 'required|min_length[3]|is_unique[subcategories.sub_name]',
            ],
            [   // Errors
                'author_name' =>
                [
                    'required' => lang('error.required'),
                    'is_unique' => lang('error.is_unique'),
                    'min_length' => lang('error.min_length'),
                ],
            ]
        );

        if (!$input) {
            $data['title'] = lang('app.authors');
            $data['validation'] = $this->validator;
            echo view('author/edit/'. $id, $data);
        }else {
            $dod = $this->request->getVar('author_dod');
            $data = [
                'author_name'   => $this->request->getVar('author_name'),
                'author_dob'   => $this->request->getVar('author_dob'),
                'author_dod'   => ($dod==null?$dod:$dod.'هـ'),
                'author_info'   => $this->request->getVar('author_info'),
                'author_pob'   => $this->request->getVar('author_pob'),
                'author_teachers'   => $this->request->getVar('author_teachers'),
                'author_students'   => $this->request->getVar('author_students'),
                'author_madhhab'   => $this->request->getVar('author_madhhab'),
                'author_aqida'   => $this->request->getVar('author_aqida'),
            ];

            // dd($data);
            $sub = new Author();
            $ok = $sub->update($id, $data);

            if ($ok) {
                return redirect()->to('author')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
            } else {
                return redirect()->to('author')->with('type', 'error')->with('text', lang('app.unsuccessful'))->with('title', lang('app.sorry'));
            }
        }
    }

    public function delete($id)
    {
        // dd($id);
        $author = new Author();

        $ok = $author->delete($id);

        if ($ok) {
            return redirect()->to('author')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
        } else {
            return redirect()->to('author')->with('type', 'error')->with('text', lang('app.unsuccessful'))->with('title', lang('app.sorry'));
        }
    }
}
