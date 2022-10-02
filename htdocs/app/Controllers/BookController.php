<?php

namespace App\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\SubCategory;
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
        $data['book'] = $book->join('authors a', 'a.author_id=books.author_id')->findAll();
        // dd($data);

        return view('book/index', $data);
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
        $author = new Author();

        // dd($this->request->getVar());
        $data['title'] = lang('app.books');
        $data['cat'] = $cat->findAll();
        $data['author'] = $author->findAll();
        // dd($data);

        return view('book/add', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // dd($this->request->getVar());

        $book = new Book();
        $author = new Author();
        $cat = new Category();

        helper('form');

        $input = $this->validate(
            [   //Rules
                'book_name' => 'required|min_length[3]|is_unique[books.book_name]',
                'cat_id' => 'required',
                'sub_id' => 'required',
                'author_id' => 'required',
            ],
            [   // Errors
                'book_name' =>
                [
                    'required' => lang('error.required'),
                    'is_unique' => lang('error.is_unique'),
                    'min_length' => lang('error.min_length'),
                ],
                'cat_id' => [
                    'required' => lang('error.required'),
                ],
                'sub_id' => [
                    'required' => lang('error.required'),
                ],
                'author_id' => [
                    'required' => lang('error.required'),
                ],
            ]
        );

        if (!$input) {
            $data['title'] = lang('app.books');
            $data['cat'] = $cat->findAll();
            $data['author'] = $author->findAll();
            $data['validation'] = $this->validator;
            echo view('book/add', $data);
        } else {

            $query = $book->orderBy('book_id', 'desc')->first();

            // dd($query);
            $invc = $query['book_no']?? 'MKF' . date("mdy") . sprintf('%04s', 0);
            $invc = substr($invc, 10, 13);
            $invc = $invc + 1;
            $invc = "MKF" . date("mdy") . sprintf('%04s', $invc);
            // dd($invc);

            $data = [
                'book_name'     => $this->request->getVar('book_name'),
                'author_id'     => $this->request->getVar('author_id'),
                'book_volume'   => $this->request->getVar('book_volume'),
                'book_cover'    => $this->request->getVar('book_cover'),
                'cat_id'        => $this->request->getVar('cat_id'),
                'sub_id'        => $this->request->getVar('sub_id'),
                'book_price'    => $this->request->getVar('book_price'),
                'book_info'     => $this->request->getVar('book_info'),
                'book_picture'  => $this->request->getVar('book_picture'),
                'muhaqqiq'      => $this->request->getVar('muhaqqiq'),
                'link_archive'  => $this->request->getVar('link_archive'),
                'link_waqefeya' => $this->request->getVar('link_waqefeya'),
                'book_no'       => $invc,
            ];

            // dd($data);
            $ok = $book->save($data);

            if ($ok) {
                return redirect()->to('book')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
            }
        }
    }

    public function show($id = null)
    {
        helper('form');
        $book = new Book();
        $author = new Author();
        $cat = new Category();
        $sub = new SubCategory();

        $data['title'] = lang('app.books');
        $data['book'] = $book->find($id);
        $data['author'] = $author->findAll();
        $data['sub'] = $sub->findAll();
        $data['cat'] = $cat->findAll();

        return view('book/edit', $data);
    }

    public function update($id = null)
    {
        // dd($this->request->getVar());

        $book = new Book();
        // $author = new Author();
        // $cat = new Category();

        helper('form');

        // $input = $this->validate(
        //     [   //Rules
        //         'book_name' => 'required|min_length[3]|is_unique[books.book_name]',
        //         'cat_id' => 'required',
        //         'sub_id' => 'required',
        //         'author_id' => 'required',
        //     ],
        //     [   // Errors
        //         'book_name' =>
        //         [
        //             'required' => lang('error.required'),
        //             'is_unique' => lang('error.is_unique'),
        //             'min_length' => lang('error.min_length'),
        //         ],
        //         'cat_id' => [
        //             'required' => lang('error.required'),
        //         ],
        //         'sub_id' => [
        //             'required' => lang('error.required'),
        //         ],
        //         'author_id' => [
        //             'required' => lang('error.required'),
        //         ],
        //     ]
        // );

        // if (!$input) {
        //     $data['title'] = lang('app.books');
        //     $data['cat'] = $cat->findAll();
        //     $data['author'] = $author->findAll();
        //     $data['validation'] = $this->validator;
        //     echo view('book/add', $data);
        // } else {

            // $query = $book->orderBy('book_id', 'desc')->first();

            // dd($query);
            // $invc = $query['book_no'] ?? 'MKF' . date("mdy") . sprintf('%04s', 0);
            // $invc = substr($invc, 10, 13);
            // $invc = $invc + 1;
            // $invc = "MKF" . date("mdy") . sprintf('%04s', $invc);
            // dd($invc);

            $bk = $book->find($id);

            $data = [
                'book_name'     => $this->request->getVar('book_name'),
                'author_id'     => $this->request->getVar('author_id'),
                'book_volume'   => $this->request->getVar('book_volume'),
                'book_cover'    => $this->request->getVar('book_cover'),
                'cat_id'        => $this->request->getVar('cat_id'),
                'sub_id'        => $this->request->getVar('sub_id'),
                'book_price'    => $this->request->getVar('book_price'),
                'book_info'     => $this->request->getVar('book_info'),
                'book_picture'  => $this->request->getVar('book_picture')??0000,
                'muhaqqiq'      => $this->request->getVar('muhaqqiq'),
                'link_archive'  => $this->request->getVar('link_archive'),
                'link_waqefeya' => $this->request->getVar('link_waqefeya'),
                'book_no'       => $bk['book_no'],
            ];

            // dd($data);
            $ok = $book->update($id, $data);

            if ($ok) {
                return redirect()->to('book')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
            }
        // }
    }

    public function delete($id = null)
    {
        // dd($id);
        $book = new Book();

        $ok = $book->delete($id);

        if ($ok) {
            return redirect()->to('book')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
        } else {
            return redirect()->to('book')->with('type', 'error')->with('text', lang('app.unsuccessful'))->with('title', lang('app.sorry'));
        }
    }

    public function upload($id)
    {
        $book = new Book();
        $upl = 'book_picture';
        // dd($this->request->getFile('img'));

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
            return redirect()->to('book/edit/' . $id)->with('type', 'error')->with('title', lang('app.errorOccured'))->with('text', $data['errors']['img'])->with('btn', true);
        }

        $pic = $book->where(['book_id' => $id])->first();

        // dd($pic);
        // dd(file_exists('app-assets/images/book/' . $pic[$upl]));
        if (file_exists('app-assets/images/book/' . $pic[$upl])) {
            $path = 'app-assets/images/book/' . $pic[$upl];

            unlink($path);

            $img = $this->request->getFile('img');
            $ext = $img->getClientExtension();
            $name = sprintf('%06s', $pic['book_id']) . '.' . $ext;

            $ppn = [$upl => $name,];
            // dd($ppn);

            $img->move('app-assets/images/book/', $name);
            $book->update($id, $ppn);

            // dd($test);
            return redirect()->to('book')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
        } else {
            $img = $this->request->getFile('img');
            $ext = $img->getClientExtension();
            $name = sprintf('%06s', $pic['book_id']) . '.' . $ext;

            $ppn = [$upl => $name,];
            // dd($ppn);

            $img->move('app-assets/images/book/', $name);
            $book->update($id, $ppn);

            return redirect()->to('book')->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
        }
    }

    public function sub()
    {
        $sub = new SubCategory();

        $cat = $this->request->getVar('cat');

        $data = $sub->where('cat_id', $cat)->findAll();

        echo json_encode($data);
    }
}
