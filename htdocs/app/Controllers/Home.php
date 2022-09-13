<?php

namespace App\Controllers;

use App\Models\Hits;

class Home extends BaseController
{
    public function index()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $hits = new Hits();
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
        $data['title'] = lang('app.welcome');

        return view('front/index', $data);
    }

    public function locale($any)
    {
        $session = session();

        $session->remove('locale');
        $session->set('locale', $any);
        $this->request->setLocale($any);

        $url = base_url();
        if ($session->isLoggedIn) {
            return redirect()->to($_SESSION['locale'] . '/user');
        } else {
            return redirect()->to($url);
        }
    }
}
