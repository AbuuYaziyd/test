<?php

namespace App\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Hits;
use App\Models\Info;
use App\Models\Sharh;
use App\Models\SubCategory;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $hits = new Hits();
        $books = new Book();
        $cat = new Category();
        $sub = new SubCategory();
        $author = new Author();
        $sharh = new Sharh();

        $data['title'] = lang('app.dashboard');
        $data['hits'] = $hits->countAll();
        $data['books'] = $books->countAll();
        $data['cat'] = $cat->countAll();
        $data['sub'] = $sub->countAll();
        $data['author'] = $author->countAll();
        $data['sharh'] = $sharh->countAll();
        // dd($data);

        return view('user/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $user = new User();

        $find = $user->where('user_id', $id)->first();
        if (!$find) {
            $data = [
                'userId' => $id,
            ];
            dd($data);
            // $ok = $info->save($data);

            // if ($ok) {
            //     return redirect()->to('user/profile/'.$id);
            // }
        }else {
            $data['title'] = lang('app.profile');
            $data['profile'] = $user->find($id);
            // $data['info'] = $info->where('userId', $id)->first();
            // dd($data);

            return view('user/profile', $data);
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        helper('form');

        // $info = new Info();
        $user = new User();

        // dd($id);
        $data['title'] = lang('app.profile');
        $data['user'] = $user->find($id);
        // $data['info'] = $info->where('userId', $id)->first();
        // dd($data);

        return view('user/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    { 
        // dd($this->request->getVar());

        $data = [
            'fname' => $this->request->getVar('fname'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'address' => $this->request->getVar('address'),
            'user_info' => $this->request->getVar('user_info'),
            'dob' => $this->request->getVar('dob'),
            'sex' => $this->request->getVar('sex'),
            'level' => $this->request->getVar('level'),
        ];
        // dd($id);

        $user = new User();
        // $user->find($id);
        $ok = $user->update($id, $data);

        if ($ok) {
            return redirect()->to('user/profile/'. $id)->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
            // return redirect()->to('user/profile/'. $id)->with('type', 'success')->with('text', lang('app.successful'))->with('title', lang('app.done'));
        } else {
            return redirect()->to('user/profile/' . $id)->with('type', 'error')->with('text', lang('app.unsuccessful'))->with('title', lang('app.sorry'));
        }
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
