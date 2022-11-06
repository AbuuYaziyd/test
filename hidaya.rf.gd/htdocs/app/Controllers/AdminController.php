<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Country;
use App\Models\Setting;
use App\Models\Tanfidh;
use App\Models\University;
use App\Models\User;

class AdminController extends BaseController
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
        $set = new Setting();

        $role = $user->find($_SESSION['id']);
        // $data['tanfdh'] = $tanfidh->where('mushrif', $_SESSION['id'])->countAllResults();
        $data['mushrif'] = $user->where('role', 'mushrif')->countAllResults();
        $data['complt'] = $tanfidh->where(['tnfdhStatus' => 1])->countAllResults();
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 0])->countAllResults();
        $data['judud'] = $user->where(['malaf' => null, 'status' => 0])->countAllResults();
        $data['set'] = $set->where(['name' => 'tanfidhDate', 'value>=' => date('Y-m-d')])->findAll();
        $data['full'] = count($user->where('role!=', 'admin')->findAll());
        $data['jamia'] = count($user->groupBy('jamia')->where('jamia!=', null)->findAll());
        $data['nationality'] = count($user->groupBy('nationality')->where('nationality!=', null)->findAll());
        $data['title'] = lang('app.dashboard');
        // dd($data['full']);

        if ($role['role'] == 'admin') {
            return view('admin/index', $data);
        } else {
            return redirect()->to('user');
        }   
    }

    public function jamiat()
    {
        $user = new User();
        $uni = new University();

        $data['title'] = lang('app.jamiat');
        $jamia = $user->groupBy('jamia')->findAll();
        foreach ($jamia as $jm) {
            if ($jm['jamia'] != null) {
                $m[] = [
                'jm' => $user->where('jamia', $jm['jamia'])->countAllResults(),
                'jamia' => $uni->find($jm['jamia'])['uni_name'],
                'uni' => $uni->find($jm['jamia'])['uni_id'],
                ];
            }
        }
        $data['jamia'] = $m;
        // dd($data);

        return view('admin/jamiat', $data);
    }
    
    public function jamia($jm)
    {
        $user = new User();
        $uni = new University();

        $data['title'] = lang('app.mushrifuna').' - '.$uni->find($jm)['uni_name'];
        $data['title2'] = lang('app.students').' - '.$uni->find($jm)['uni_name'];
        $data['all'] = $user->where('jamia', $jm)->findAll();
        $data['users'] = $user->where(['jamia' => $jm, 'role' => 'mushrif'])
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->findAll();
        // dd($data);

        return view('admin/mushrif', $data);
    }

    public function nationality()
    {
        $user = new User();
        $nt = new Country();

        $data['title'] = lang('app.nationalities');
        $nat = $user->groupBy('nationality')->findAll();
        foreach ($nat as $jm) {
            if ($jm['nationality'] != null) {
                $m[] = [
                'jm' => $user->where(['nationality' => $jm['nationality'], 'role!=' => 'admin'])->countAllResults(),
                'nationality' => $nt->where('country_code', $jm['nationality'])->first()['country_arName'],
                'nat' => $jm['nationality']
                ];
            }
        }
        $data['nationality'] = $m;
        // dd($data);

        return view('admin/nationality', $data);
    }
    
    public function nat($nt)
    {
        $user = new User();
        $nat = new Country();

        $data['title'] = lang('app.mushrifuna').' - '.$nat->where('country_code' , $nt)->first()['country_arName'];
        $data['type'] = 'nat';
        $data['users'] = $user->where(['nationality' => $nt, 'role' => 'mushrif'])->findAll();
        // dd($data);

        return view('admin/users', $data);
    }

    public function users($nat, $jam)
    {
        $user = new User();
        $nationality = new Country();
        $jamia = new University();
        
        $nt = $nationality->where('country_code', $nat)->first();
        $jm = $jamia->where('uni_id', $jam)->first();
        $data['title'] = lang('app.users').' - '.$nt['country_arName'] .' - '.$jm['uni_name'];
        $data['users'] = $user->where(['jamia' => $jam, 'nationality' => $nat])
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->orderBy('role', 'asc')
                            ->findAll();
        // $data['users'] = $user->where(['nationality' => $nat, 'jamia' => $jam])->findAll();
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

        $data['user'] = $user->join('countries c', 'c.country_code=users.nationality')
                        ->join('universities u', 'u.uni_id=users.jamia')
                        ->find($id);
        $data['title'] = lang('app.user');
        // dd($data);

        return view('admin/user', $data);
    }

    public function all()
    {
        $user = new User();

        $data['users'] = $user->where( 'role!=', 'admin')
                            ->join('countries c', 'c.country_code=users.nationality')
                            ->join('banks', 'banks.bankId=users.bank')
                            ->findAll();
        $data['check'] = lang('app.students');
        $data['title'] = lang('app.students');
        // dd($data);

        return view('admin/all', $data);
    }

    public function delete($id)
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
