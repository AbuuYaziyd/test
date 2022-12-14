<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Country;
use App\Models\Data;
use App\Models\Image;
use App\Models\Mashruu;
use App\Models\Setting;
use App\Models\Tanfidh;
use App\Models\Umrah;
use App\Models\University;
use App\Models\User;
use App\Models\Whatsapp;

class AdminController extends BaseController
{
    public function index()
    {
        helper('form');
        $user = new User();
        $tanfidh = new Tanfidh();
        $set = new Setting();

        $data['mushrif'] = $user->where('role', 'mushrif')->countAllResults();
        $data['complt'] = $tanfidh->where(['tnfdhStatus' => 2])->countAllResults();
        $data['tanfidh'] = $tanfidh->where(['tnfdhStatus' => 1])->countAllResults();
        $data['judud'] = $user->where(['malaf' => null, 'status' => 0])->countAllResults();
        $data['set'] = $set->where(['info' => 'tasrihDate', 'extra>=' => date('Y-m-d')])->first();
        $data['full'] = count($user->where('role!=', 'admin')->findAll());
        $data['jamia'] = count($user->groupBy('jamia')->where('jamia!=', null)->findAll());
        $data['nationality'] = count($user->groupBy('nationality')->where('nationality!=', null)->findAll());
        $data['title'] = lang('app.dashboard');
        // dd($data);

        if (session('role') == 'admin') {
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
        $data['uni'] = $uni->findAll();
        // dd($data);

        if (session('role') == 'admin') {
            return view('admin/jamiat', $data);
        } else {
            return redirect()->to('user');
        } 
    }
    
    public function jamia($jm)
    {
        $user = new User();
        $uni = new University();
        $whats = new Whatsapp();

        $data['title'] = lang('app.mushrifuna').' - '.$uni->find($jm)['uni_name'];
        $data['title2'] = lang('app.students').' - '.$uni->find($jm)['uni_name'];
        $data['type'] = 'jamia';
        $data['all'] = $user->where('jamia', $jm)
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->findAll();
        $data['users'] = $user->where(['jamia' => $jm, 'role' => 'mushrif'])
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->findAll();
        // dd($data);

        if (session('role') == 'admin') {
            return view('admin/mushrif', $data);
        } else {
            return redirect()->to('user');
        } 
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

        if (session('role') == 'admin') {
            return view('admin/nationality', $data);
        } else {
            return redirect()->to('user');
        } 
    }
    
    public function nat($nt)
    {
        $user = new User();
        $nat = new Country();
        $what = new Whatsapp();

        $data['title'] = lang('app.mushrifuna').' - '.$nat->where('country_code' , $nt)->first()['country_arName'];
        $data['type'] = 'nat';
        $data['title2'] = lang('app.students').' - '.$nat->where('country_code', $nt)->first()['country_arName'];
        $data['all'] = $user->where('nationality', $nt)
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->findAll();
        $data['users'] = $user->where(['nationality' => $nt, 'role' => 'mushrif'])
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->findAll();
        // dd($data);

        if (session('role') == 'admin') {
            return view('admin/mushrif', $data);
        } else {
            return redirect()->to('user');
        } 
    }

    public function users($nat, $jam)
    {
        $user = new User();
        $nationality = new Country();
        $jamia = new University();
        $whats = new Whatsapp();
        
        $nt = $nationality->where('country_code', $nat)->first();
        $jm = $jamia->where('uni_id', $jam)->first();
        $data['title'] = lang('app.users').' - '.$nt['country_arName'] .' - '.$jm['uni_name'];
        $data['users'] = $user->where(['jamia' => $jam, 'nationality' => $nat])
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->orderBy('role', 'desc')
                            ->findAll();
        $data['mushrif'] = $user->where(['jamia' => $jam, 'nationality' => $nat, 'role' => 'mushrif'])
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->first();
        $data['type'] = 'all';
        $data['whats'] = $whats->where(['country_code' => $nat, 'jamia_id' => $jam])->first();
        // dd($data);
        
        if (session('role') == 'admin') {
            return view('admin/users', $data);
        } else {
            return redirect()->to('user');
        } 
    }

    public function mushrifuna()
    {
        $user = new User();

        $data['title'] = lang('app.mushrifuna');
        $data['type'] = 'mushrif';
        $data['users'] = $user->where('role', 'mushrif')
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->findAll();
        // dd($data);

        if (session('role') == 'admin') {
            return view('admin/users', $data);
        } else {
            return redirect()->to('user');
        } 
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
        $image = new Image();
        $mash = new Mashruu();

        $data['user'] = $user->join('countries c', 'c.country_code=users.nationality')
                        ->join('universities u', 'u.uni_id=users.jamia')
                        ->find($id);
        $data['img'] = $image->where('userId', $id)->first();
        $data['mashruu'] = $mash->where('userId', $id)->findAll();
        $data['title'] = lang('app.user');
        // dd($data);

        if (session('role') == 'admin') {
            return view('admin/user', $data);
        } else {
            return redirect()->to('user');
        } 
    }

    public function all()
    {
        $user = new User();

        $data['users'] = $user->where( 'role!=', 'admin')
                            ->join('countries c', 'c.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->join('banks', 'banks.bankId=users.bank')
                            ->findAll();
        $data['title'] = lang('app.students');
        // dd($data);

        if (session('role') == 'admin') {
            return view('admin/all', $data);
        } else {
            return redirect()->to('user');
        } 
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
        $user = new User();
        $data['users'] = $user->where(['malaf' => null, 'status' => 0])->findAll();
        $data['title'] = lang('app.judud');

        if (session('role') == 'admin') {
            return view('admin/judud', $data);
        } else {
            return redirect()->to('user');
        } 
    }

    public function activate($id)
    {
        $user = new User();
        $set = new Setting();
        $image = new Image();

        $cnt = $set->where('name', 'count')->first()['value'];
        $img = $image->where('userId', $id)->first();
        $data['users'] = $user->find($id);
        $data['title'] = lang('app.judud');
        $malaf = $user->find($id)['malaf'];
        
        $ok = $user->select('malaf')->orderBy('id', 'desc')->findAll();
            foreach ($ok as $data) {
                $arr1[] = $data['malaf'];
            }
            for ($i=1000; $i < intval($cnt); $i++) { 
                if (!(in_array($i, $arr1))) {
                    $dt = [
                        'malaf' => $i,
                        'status' => 1,
                    ];
                }
            }
        $updt = $user->update($id, $dt);
        if ($updt) {
            
            if (file_exists('app-assets/images/malaf/new/'.$img['imgIqama'])) {
                $path = 'app-assets/images/malaf/new/'.$img['imgIqama'];
                $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                $file = new \CodeIgniter\Files\File($path);
                if (!file_exists($newPath)) {
                    mkdir($newPath, 0777, true);
                }
                $file->move($newPath);
            }
            if (file_exists('app-assets/images/malaf/new/'.$img['imgPass'])) {
                $path = 'app-assets/images/malaf/new/'.$img['imgPass'];
                $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                $file = new \CodeIgniter\Files\File($path);
                if (!file_exists($newPath)) {
                    mkdir($newPath, 0777, true);
                }
                $file->move($newPath);
            }
            if (file_exists('app-assets/images/malaf/new/'.$img['imgStu'])) {
                $path = 'app-assets/images/malaf/new/'.$img['imgStu'];
                $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                $file = new \CodeIgniter\Files\File($path);
                if (!file_exists($newPath)) {
                    mkdir($newPath, 0777, true);
                }
                $file->move($newPath);
            }
            if (file_exists('app-assets/images/malaf/new/'.$img['imgIban'])) {
                $path = 'app-assets/images/malaf/new/'.$img['imgIban'];
                $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                $file = new \CodeIgniter\Files\File($path);
                if (!file_exists($newPath)) {
                    mkdir($newPath, 0777, true);
                }
                $file->move($newPath);
            }

            return redirect()->to('admin')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.register') . ' ' . lang('app.student') . ' ' . lang('app.success'));
        }
    }

    public function activateAll()
    {
        $user = new User();
        $set = new Setting();
        $image = new Image();

        $cnt = $set->where('name', 'count')->first()['value'];
        $ok = $user->select('malaf')->orderBy('id', 'desc')->findAll();
            foreach ($ok as $data) {
                $arr1[] = $data['malaf'];
            }
            for ($i=1000; $i < intval($cnt); $i++) { 
                if (!(in_array($i, $arr1))) {
                    $dt[] = $i;
                }
            }
            foreach ($this->request->getVar('id') as $key => $value) {
                $id = $value;
                $d = [
                    'malaf' => $dt[$key],
                    'status' => 1,
                    'id' => $id
                ];
                $updt = $user->update($id, $d);
                
                $malaf = $user->find($id)['malaf'];
                $img = $image->where('userId', $id)->first();
                
                if ($updt) {
                    
                    if (file_exists('app-assets/images/malaf/new/'.$img['imgIqama'])) {
                        $path = 'app-assets/images/malaf/new/'.$img['imgIqama'];
                        $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                        $file = new \CodeIgniter\Files\File($path);
                        if (!file_exists($newPath)) {
                            mkdir($newPath, 0777, true);
                        }
                        $file->move($newPath);
                    }
                    if (file_exists('app-assets/images/malaf/new/'.$img['imgPass'])) {
                        $path = 'app-assets/images/malaf/new/'.$img['imgPass'];
                        $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                        $file = new \CodeIgniter\Files\File($path);
                        if (!file_exists($newPath)) {
                            mkdir($newPath, 0777, true);
                        }
                        $file->move($newPath);
                    }
                    if (file_exists('app-assets/images/malaf/new/'.$img['imgStu'])) {
                        $path = 'app-assets/images/malaf/new/'.$img['imgStu'];
                        $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                        $file = new \CodeIgniter\Files\File($path);
                        if (!file_exists($newPath)) {
                            mkdir($newPath, 0777, true);
                        }
                        $file->move($newPath);
                    }
                    if (file_exists('app-assets/images/malaf/new/'.$img['imgIban'])) {
                        $path = 'app-assets/images/malaf/new/'.$img['imgIban'];
                        $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                        $file = new \CodeIgniter\Files\File($path);
                        if (!file_exists($newPath)) {
                            mkdir($newPath, 0777, true);
                        }
                        $file->move($newPath);
                    }
                }
            }
            
            // dd($d);
            if ($updt) {
                return redirect()->to('admin')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.register') . ' ' . lang('app.student') . ' ' . lang('app.success'));
            }
    }

    public function tanfidh()
    {
        $dt = new Data();

        $data['title'] = lang('app.tanfidh');
        $data['all'] = $dt->findAll();
        $data['month'] = $dt->where('month(created_at)', date('m'))->findAll();
        // dd($data);

        return view('mashruu/tanfidh', $data);
    }
}
