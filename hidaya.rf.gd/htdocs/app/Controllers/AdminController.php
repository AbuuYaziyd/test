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
        $data['lead'] = $tanfidh->where('mushrif', $_SESSION['id'])->countAllResults();
        $data['complt'] = $tanfidh->where(['tnfdhStatus' => 'completed','mushrif', $_SESSION['id']])->countAllResults();
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 'incomplete', 'mushrif', $_SESSION['id']])->countAllResults();
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 'completed','mushrif', $_SESSION['id']])->countAllResults();
        $data['judud'] = $user->where(['malaf' => null, 'jamia' => $role['jamia']])->countAllResults();
        $data['users'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia']])->findAll();
        $data['all'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia']])->countAllResults();
        $data['full'] = $user->countAll();
        $data['title'] = lang('app.dashboard');
        // dd($data['full']);

        return view('admin/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $user = new User();

        $data['user'] = $user->find($id);
        // dd($data['user']);
        $data['title'] = lang('app.user');
        return view('admin/user', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $user = new User();

        $role = $user->find($_SESSION['id']);
        $data['users'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia'], 'role' => 'user'])->findAll();
        $data['check'] = lang('app.students');
        $data['title'] = lang('app.students') .' '. $role['jamia'].' '. lang('app.from').' '. lang('app.nationality').' '. $role['nationality'];
        // dd($data);

        return view('admin/show', $data);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        // dd($id);
        $user = new User();

        $ok = $user->delete($id);

        if ($ok) {
            return redirect()->to('admin/view')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.delete') . ' ' . lang('app.student') . ' ' . lang('app.success'));
        }
    }

    public function mushrif()
    {
        $user = new User();

        $role = $user->find($_SESSION['id']);
        $data['users'] = $user->where(['role' => 'mushrif'])->findAll();
        $data['check'] = lang('app.students');
        $data['title'] = lang('app.mandub');
        // dd($data);

        return view('admin/mushrif', $data);
    }
    
    public function add()
    {
        $user = new User();

        $role = $user->find($_SESSION['id']);
        $data['jamia'] = $user->select('jamia')->distinct()->findAll();
        $data['check'] = lang('app.students');
        $data['title'] = lang('app.mandub');
        // dd($data);

        return view('admin/addMushrif', $data);
    }

    public function users($usr, $jamia)
    {
        $user = new User();
        
        $data['users'] = $user->where(['nationality' => $usr, 'jamia' => $jamia])->findAll();
        $data['check'] = lang('app.students');
        $data['title'] = lang('app.students').' - '.$usr.' - '.$jamia;

        // dd($data);
        return view('admin/usersAll', $data);
    }
    
    public function zip($loc)
    {
        // $loc is the location of files to be downloaded!
        $user = new User();
        $source = 'app-assets/images/'.$loc;
        $destination = FCPATH.'compressed';
        $zipcreation = $user->zip_creation($source, $destination);
        // dd(FCPATH . 'assets/compressed.zip');

        return $this->response->download(FCPATH . 'compressed.zip', null);
    }
}
