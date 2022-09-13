<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Category;
use CodeIgniter\RESTful\ResourceController;

class BookController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $book = new Book();

        $data['title'] = lang('app.books');
        $data['book'] = $book->findAll();

        return view('book/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        helper('form');

        $cat = new Category();

        // dd($this->request->getVar());exit;
        $data['title'] = lang('app.books');
        $data['cat'] = $cat->findAll();

        return view('book/add', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // dd($this->request->getVar());exit;

        $book = new Book();
        $cat = new Category();

        helper('form');

        $input = $this->validate(
            [   //Rules
                'bookName' => 'required|min_length[3]|is_unique[books.bookName]',
                'catId' => 'required',
                'author' => 'required',
                'distributor' => 'required',
                'price' => 'required',
                'count' => 'required',
                'cover' => 'required',
            ],
            [   // Errors
                'bookName' =>
                [
                    'required' => lang('error.required'),
                    'is_unique' => lang('error.is_unique'),
                    'min_length' => lang('error.min_length'),
                ],
                'catId' => [
                    'required' => lang('error.required'),
                ],
                'author' => [
                    'required' => lang('error.required'),
                ],
                'distributor' => [
                    'required' => lang('error.required'),
                ],
                'price' => [
                    'required' => lang('error.required'),
                ],
                'count' => [
                    'required' => lang('error.required'),
                ],
                'cover' => [
                    'required' => lang('error.required'),
                ],
            ]
        );

        if (!$input) {
            $data['title'] = lang('app.books');
            $data['cat'] = $cat->findAll();
            $data['validation'] = $this->validator;
            echo view('book/add', $data);
        } else {

            $query = $book->orderBy('id', 'desc')->first();

            // dd($query);exit;
            $invc = $query['no']?? 'ABK' . date("mdy") . sprintf('%04s', 1);
            $invc = substr($invc, 10, 13);
            $invc = $invc + 1;
            $invc = "ABK" . date("mdy") . sprintf('%04s', $invc);
            // dd($invc);exit;

            $data = [
                'cover'         => $this->request->getVar('cover'),
                'count'         => $this->request->getVar('count'),
                'price'         => $this->request->getVar('price'),
                'distributor'   => $this->request->getVar('distributor'),
                'author'        => $this->request->getVar('author'),
                'catId'         => $this->request->getVar('catId'),
                'bookName'      => $this->request->getVar('bookName'),
                'bookNo'        => $invc,
            ];

            // dd($data);exit;
            $ok = $book->save($data);

            if ($ok) {
                return redirect()->to('book')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
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
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
