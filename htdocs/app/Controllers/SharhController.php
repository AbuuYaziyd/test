<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Sharh;

class SharhController extends BaseController
{
    public function index()
    {
        $sharh = new Sharh();

        $data['title'] = lang('app.sharhs');
        $data['sharh'] = $sharh->join('authors a', 'a.author_id=sharhs.author_id')->join('books b', 'b.book_id=sharhs.book_id')->findAll();
        // dd($data);

        return view('sharh/index', $data);
    }

    public function new()
    {
        helper('form');
        $book = new Book();
        $author = new Author();

        $data['title'] = lang('app.sharhs');
        $data['book'] = $book->findAll();
        $data['author'] = $author->findAll();
        // dd($data);

        return view('sharh/add', $data);
    }

    public function create()
    {
        // dd($this->request->getVar());

        helper('form');

        $input = $this->validate(
            [   //Rules
                'book_id' => 'required',
                'author_id' => 'required',
                'sharh_name' => 'required|min_length[3]|is_unique[sharhs.sharh_name]',
            ],
            [   // Errors
                'book_id' =>
                [
                    'required' => lang('error.required'),
                ],
                'author_id' =>
                [
                    'required' => lang('error.required'),
                ],
                'sharh_name' =>
                [
                    'required' => lang('error.required'),
                    'is_unique' => lang('error.is_unique'),
                    'min_length' => lang('error.min_length'),
                ],
            ]
        );

        if (!$input) {
            $data['title'] = lang('app.sharh');
            $data['validation'] = $this->validator;
            echo view('sharh/add', $data);
        } else {

            $sharh = new Sharh();

            $data = [
                'book_id'   => $this->request->getVar('book_id'),
                'author_id'   => $this->request->getVar('author_id'),
                'sharh_cover'   => $this->request->getVar('sharh_cover'),
                'sharh_volume'   => $this->request->getVar('sharh_volume'),
                'sharh_name'   => $this->request->getVar('sharh_name'),
            ];

            // dd($data); 
            $ok = $sharh->save($data);

            if ($ok) {
                return redirect()->to('sharh')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
            }
        }
    }

    public function show($id)
    {
        helper('form');
        $sharh = new Sharh();
        $book = new Book();
        $author = new Author();

        $data['title'] = lang('app.sharh');
        $data['sharh'] = $sharh->join('authors a', 'a.author_id=sharhs.author_id')->join('books b', 'b.book_id=sharhs.book_id')->find($id);
        $data['book'] = $book->findAll();
        $data['author'] = $author->findAll();
        // dd($data);

        return view('sharh/edit', $data);
    }

    public function update($id)
    {
        // dd($this->request->getVar());
        $sharh = new sharh();

        $data = [
            'book_id' => $this->request->getVar('book_id'),
            'author_id' => $this->request->getVar('author_id'),
            'sharh_name' => $this->request->getVar('sharh_name'),
            'sharh_cover' => $this->request->getVar('sharh_cover'),
            'sharh_volume' => $this->request->getVar('sharh_volume'),
        ];

        // dd($data);
        $ok = $sharh->update($id, $data);

        if ($ok) {
            return redirect()->to('sharh')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
        } else {
            return redirect()->to('sharh')->with('type', 'error')->with('text', lang('app.unsuccessful'))->with('title', lang('app.sorry'));
        }
    }

    public function delete($id)
    {
        // dd($id);
        $sharh = new Sharh();

        $ok = $sharh->delete($id);

        if ($ok) {
            return redirect()->to('subcat')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
        } else {
            return redirect()->to('subcat')->with('type', 'error')->with('text', lang('app.unsuccessful'))->with('title', lang('app.sorry'));
        }
    }
}
