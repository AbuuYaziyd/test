<?php

namespace App\Controllers;

use App\Models\Tanfidh;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;

class AdminController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $user = new User();
        $tanfidh = new Tanfidh();

        $role = $user->find($_SESSION['id']);
        $data['tanfdh'] = $tanfidh->where('mushrif', $_SESSION['id'])->countAllResults();
        $data['mushrif'] = $user->where('role', 'mushrif')->countAllResults();
        $data['complt'] = $tanfidh->where(['tnfdhStatus' => 1])->countAllResults();
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 0])->countAllResults();
        $data['judud'] = $user->where(['malaf' => null])->countAllResults();
        $data['users'] = $user->where(['nationality' => $role['nationality']])->findAll();
        $data['full'] = count($user->where('role!=', 'admin')->findAll());
        $data['jamia'] = count($user->groupBy('jamia')->findAll());
        $data['nationality'] = count($user->groupBy('nationality')->findAll());
        $data['title'] = lang('app.dashboard');
        // dd($data['full']);

        return view('admin/index', $data);
    }

    public function jamiat()
    {
        $user = new User();

        $data['title'] = lang('app.jamiat');
        $jamia = $user->groupBy('jamia')->findAll();
        foreach ($jamia as $jm) {
            $m[] = [
               'jm' => $user->where('jamia', $jm['jamia'])->countAllResults(),
               'jamia' => $jm['jamia'],
            ];
        }
        $data['jamia'] = $m;
        // dd($data);

        return view('admin/jamiat', $data);
    }
    
    public function jamia($jm)
    {
        $user = new User();

        $data['title'] = $jm;
        $data['users'] = $user->where('jamia', $jm)->findAll();
        // foreach ($data['jamia'] as $jm) {
        //     $m[] = $user->where('jamia', $jm['jamia'])->countAllResults();
        // }
        // $data['jm'] = $m;
        // dd($data);

        return view('admin/jamia', $data);
    }

    public function nationality()
    {
        $user = new User();

        $data['title'] = lang('app.nationality');
        $nationality = $user->groupBy('nationality')->findAll();
        foreach ($nationality as $jm) {
            $m[] = [
               'jm' => $user->where('nationality', $jm['nationality'])->countAllResults(),
               'nationality' => $jm['nationality'],
            ];
        }
        $data['nationality'] = $m;
        // dd($data);

        return view('admin/nationality', $data);
    }

    public function users()
    {
        $user = new User();

        $data['title'] = lang('app.admin');
        $data['user'] = $user->where('role', 'user')->findAll();
        dd($data);
    }

    // public function show($id = null)
    // {
    //     $user = new User();

    //     $data['user'] = $user->find($id);
    //     // dd($data['user']);
    //     $data['title'] = lang('app.user');
    //     return view('admin/user', $data);
    // }

    // public function new()
    // {
    //     $user = new User();

    //     $role = $user->find($_SESSION['id']);
    //     $data['users'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia'], 'role' => 'user'])->findAll();
    //     $data['check'] = lang('app.students');
    //     $data['title'] = lang('app.students') .' '. $role['jamia'].' '. lang('app.from').' '. lang('app.nationality').' '. $role['nationality'];
    //     // dd($data);

    //     return view('admin/show', $data);
    // }

    // public function delete($id = null)
    // {
    //     // dd($id);
    //     $user = new User();

    //     $ok = $user->delete($id);

    //     if ($ok) {
    //         return redirect()->to('admin/view')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.delete') . ' ' . lang('app.student') . ' ' . lang('app.success'));
    //     }
    // }

    // public function mushrif()
    // {
    //     $user = new User();

    //     $role = $user->find($_SESSION['id']);
    //     $data['users'] = $user->where(['role' => 'mushrif'])->findAll();
    //     $data['check'] = lang('app.students');
    //     $data['title'] = lang('app.mandub');
    //     // dd($data);

    //     return view('admin/mushrif', $data);
    // }
    
    // public function add()
    // {
    //     $user = new User();

    //     $role = $user->find($_SESSION['id']);
    //     $data['jamia'] = $user->select('jamia')->distinct()->findAll();
    //     $data['check'] = lang('app.students');
    //     $data['title'] = lang('app.mandub');
    //     // dd($data);

    //     return view('admin/addMushrif', $data);
    // }
    
    // public function zip($loc)
    // {
    //     // $loc is the location of files to be downloaded!
    //     $user = new User();
    //     $source = 'app-assets/images/'.$loc;
    //     $destination = FCPATH.'compressed';
    //     $zipcreation = $user->zip_creation($source, $destination);
    //     // dd(FCPATH . 'assets/compressed.zip');

    //     return $this->response->download(FCPATH . 'compressed.zip', null);
    // }
}
