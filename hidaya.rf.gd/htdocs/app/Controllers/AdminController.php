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
        $data['judud'] = $user->where(['malaf' => null, 'status' => 0])->countAllResults();
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
        $data['type'] = 'jamia';
        $data['users'] = $user->where('jamia', $jm)->findAll();
        // dd($data);

        return view('admin/users', $data);
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
    
    public function nat($nt)
    {
        $user = new User();

        $data['title'] = $nt;
        $data['type'] = 'nat';
        $data['users'] = $user->where('nationality', $nt)->findAll();
        // dd($data);

        return view('admin/users', $data);
    }

    public function users()
    {
        $user = new User();

        $data['title'] = lang('app.students');
        $data['type'] = '';
        $data['users'] = $user->where('role', 'user')->findAll();
        // dd($data);

        return view('admin/users', $data);
    }

    public function mushrifuna()
    {
        $user = new User();

        $data['title'] = lang('app.mushrifuna');
        $data['type'] = '';
        $data['users'] = $user->where('role', 'mushrif')->findAll();
        // dd($data);

        return view('admin/users', $data);
    }

    public function addMushrif($id)
    {
        $user = new User();
        $data = [
            'role' => 'mushrif',
        ];
        $ok = $user->update($id, $data);
        // dd($data);

        if ($ok) {
            return redirect()->to('admin/show/'.$id)->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.edit').' '. lang('app.profile').' '. lang('app.success'));
        }
    }

    public function show($id = null)
    {
        $user = new User();

        $data['user'] = $user->find($id);
        $data['title'] = lang('app.user');
        // dd($data);

        return view('admin/user', $data);
    }

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

    public function delete($id = null)
    {
        $user = new User();

        $ok = $user->delete($id);

        if ($ok) {
            return redirect()->to('admin/view')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.delete') . ' ' . lang('app.student') . ' ' . lang('app.success'));
        }
    }

    public function judud()
    {
        // dd('ok');
        $user = new User();

        $data['users'] = $user->where(['malaf' => null, 'status' => 0])->findAll();
        $data['title'] = lang('app.judud');
        
        $ok = $user->select('malaf')->findAll();
        foreach ($ok as $value) {
            $ok1[] = sprintf('%04s', ($value['malaf']));
        }
        for ($i=0; $i < 9999; $i++) { 
            if (!in_array( $i, $ok1 )) {
                $dt[] = sprintf('%04s', $i);
            }
        }
        // dd(($dt));

        return view('admin/judud', $data);
    }

    public function activate($id)
    {
        // dd('ok');
        $user = new User();

        $data['users'] = $user->find($id);
        $data['title'] = lang('app.judud');
        
        $ok = $user->select('malaf')->findAll();
        foreach ($ok as $value) {
            $arr1[] = sprintf('%04s', ($value['malaf']));
        }
        for ($i=100; $i < 9999; $i++) { 
            if (!in_array( $i, $arr1)) {
                $arr2[] = sprintf('%04s', $i);
            }
        }
        $d = [
            'malaf' => array_diff($arr1, $arr2)[1],
            'status' => 1
        ];
        
        // dd($d);
        $updt = $user->update($id, $d);

        if ($updt) {
            return redirect()->to('admin')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.register') . ' ' . lang('app.student') . ' ' . lang('app.success'));
        }
    }

    public function activateAll()
    {
        $user = new User();
        
            $ok = $user->select('malaf')->findAll();
            foreach ($ok as $data) {
                $arr1[] = sprintf('%04s', ($data['malaf']));
            }
            // for ($i=0; $i < 9999; $i++) { 
            //     $arr2[] = sprintf('%04s', $i);
            // }
            for ($i=1000; $i < 9999; $i++) { 
                if (in_array($i, $arr1)) {
                    $no[] = $i;
                }
            }
        foreach ($this->request->getVar('id') as $key => $value) {
            $id = $value;
            // $ar = [array_diff($arr2, $arr1)];
            // foreach (array_diff($arr2, $arr1) as  $value) {
            //     $ar[] = $value;
            // }
            $d = [
                'malaf' => sprintf('%04s', $no[$key]),
                'status' => 1,
                'id' => $id
            ];
            // dd($d);
            // dd(array_rand(array_diff($arr2, $arr1)));
            $updt = $user->update($id, $d);
        }
            // dd($d);

        // foreach ($this->request->getVar('id') as $value) {
        //     $id = $value;
        //     $ok = $user->select('malaf')->findAll();
        //     foreach ($ok as $data) {
        //         $arr1[] = sprintf('%04s', ($data['malaf']));
        //     }
            
        //     $flipped = array_flip($arr1);
        //     for ($i = 1; $i < 9999; $i++)
        //     { 
        //         if (!isset($flipped[$i]))
        //         {
        //             $out_array[] = sprintf('%04s', $i);
        //             // $count = ;
        //         }
        //     }
        //     $d[] = [
        //         'malaf' => array_rand($out_array),
        //         'status' => 1,
        //         'id' => $id,
        //         // 'count' => $count
        //     ];
        //     // dd($d);
        //     // dd(array_diff($arr2, $arr1));
        //     // $updt = $user->update($id, $d);
        // }
        //     dd($d);
        if ($updt) {
            return redirect()->to('admin')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.register') . ' ' . lang('app.student') . ' ' . lang('app.success'));
        }
    }
    
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
