<?php

namespace App\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Hits;
use App\Models\Sharh;
use App\Models\SubCategory;

class Home extends BaseController
{
    public function index()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $hits = new Hits();
        $books = new Book();
        $cat = new Category();
        $sub = new SubCategory();
        $author = new Author();
        $sharh = new Sharh();
        // Check for previous visits
        $query = $hits->where('ip', $ip, 1, 0)->get();
        $check = count($query->getResult());

        // dd($check);exit;
        if ($check < 1) {
            $data = [
                'ip' => $ip,
            ];
            // Never visited - add
            $hits->insert($data);
        }
        $data['hits'] = $hits->countAll();
        $data['hits'] = $hits->countAll();
        $data['books'] = $books->countAll();
        $data['cat'] = $cat->countAll();
        $data['sub'] = $sub->countAll();
        $data['author'] = $author->countAll();
        $data['sharh'] = $sharh->countAll();
        $data['title'] = lang('app.welcome');

        // dd($data);
        return view('frontend/index', $data);
    }

    // public function locale($any)
    // {
    //     $session = session();

    //     $session->remove('locale');
    //     $session->set('locale', $any);
    //     $this->request->setLocale($any);

    //     $url = base_url();
    //     if ($session->isLoggedIn) {
    //         return redirect()->to($_SESSION['locale'] . '/user');
    //     } else {
    //         return redirect()->to($url);
    //     }
    // }
}
