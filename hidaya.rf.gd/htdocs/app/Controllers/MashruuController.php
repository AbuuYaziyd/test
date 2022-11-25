<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mashruu;
use App\Models\Setting;
use App\Models\Tanfidh;
use App\Models\Umrah;
use App\Models\User;

class MashruuController extends BaseController
{
    public function index()
    {
        helper('form');

        $tan = new Mashruu();
        $umr = new Umrah();

        $data['title'] = lang('app.tanfidh');
        $data['all'] = $tan
                        ->join('banks b', 'b.bankId=mashruu.bank')
                        ->join('universities v', 'v.uni_id=mashruu.jamia')
                        ->join('countries c', 'c.country_code=mashruu.nation')
                        ->join('users u', 'u.id=mashruu.userId')
                        ->findAll();
        $data['new0'] = $tan
                        ->join('banks b', 'b.bankId=mashruu.bank')
                        ->join('countries c', 'c.country_code=mashruu.nation')
                        ->join('universities v', 'v.uni_id=mashruu.jamia')
                        ->join('users u', 'u.id=mashruu.userId')
                        ->where('mashruu.status', 1)
                        ->findAll();
        $data['new1'] = $tan
                        ->where('mashruu.status', 0)
                        ->findAll();
        $data['tanfidh'] = $umr->where('tnfdhStatus', 1)->countAllResults();
        $data['tan'] = $tan
                        ->join('users u', 'u.id=mashruu.userId')
                        ->join('universities v', 'v.uni_id=mashruu.jamia')
                        ->join('countries c', 'c.country_code=mashruu.nation')
                        ->findAll();
        // dd($data);

        return view('mashruu/index', $data);
    }

    public function create()
    {
        // dd($this->request->getFiles());
        $validationRule = $this->validate(
            [
                'csv' => 'uploaded[csv]|ext_in[csv,csv,xlsx]',
            ],
            [   // Errors
                'csv' => [
                    'uploaded' => lang('error.uploaded'),
                    'ext_in' => lang('error.extension'),
                ],
            ]);
        // dd($this->validator->getErrors());
        if (!$validationRule) {
            $data = ['errors' => $this->validator->getErrors()];

            helper('form');
            $data['title'] = lang('app.tanfidh');
            return view('mashruu/index', $data);
        }else{
            if($file = $this->request->getFile('csv')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('public/files', $newName);
                $file = fopen("public/files/".$newName,"r");
                $i = 0;
                $numberOfFields = 2;
                $csvArr = array();
                // dd(fgetcsv($file, 1000, ","));
                
                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata);
                    if($i > 0 && $num == $numberOfFields){ 
                        $csvArr[$i]['ism'] = $filedata[0];
                        $csvArr[$i]['sabab'] = $filedata[1];
                    }
                    $i++;
                }
                fclose($file);
                // dd($csvArr);
                $count = 0;
                foreach($csvArr as $userdata){
                    $usr = new Mashruu();
                        if($usr->insert($userdata)){
                            $count++;
                        }
                }
                // dd(file_exists('public/files/'. $newName));
                unlink('public/files/'. $newName);
                // dd($count);
                return redirect()->to('tanfidh')->with('type', 'success')->with('text',  $count.' - تنفيذ مستورد ')->with('title', lang('app.success'));
            }
            else{
                session()->setFlashdata('message', 'CSV file coud not be imported.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
            }else{
            session()->setFlashdata('message', 'CSV file coud not be imported.');
            session()->setFlashdata('alert-class', 'alert-danger');
            }
        }
    }

    public function connect()
    {
        $umr = new Umrah();
        $mash = new Mashruu();

        $tanfidh = $umr->where('tnfdhStatus', 1)->join('users u', 'u.id=tanfidh.userId')->findAll();
        $swah = $mash->where('status', 0)->findAll();
        foreach ($swah as $key => $dt) {
            if (count($tanfidh)>$key) {
                $data = [
                    'status' => 1,
                    'userId' => $tanfidh[$key]['id'],
                    'amount' => ($tanfidh[$key]['role']=='mushrif'?350:250),
                    'date' => date("Y-m-d", strtotime($tanfidh[$key]['tnfdhDate'])),
                    'bank' => $tanfidh[$key]['bank'],
                    'mushrif' => $tanfidh[$key]['mushrif'],
                    'nation' => $tanfidh[$key]['nationality'],
                    'userId' => $tanfidh[$key]['id'],
                    'malaf' => $tanfidh[$key]['malaf'],
                    'phone' => $tanfidh[$key]['phone'],
                    'jamia' => $tanfidh[$key]['jamia'],
                    'iban' => $tanfidh[$key]['iban'],
                ];
                $mash->update($dt['id'], $data);
                $data2 = [
                    'tnfdhStatus' => 'sent',
                    'tnfdhName' => $dt['ism'],
                    'tnfdhSabab' => $dt['sabab'],
                    'tnfdhId' => $tanfidh[$key]['tnfdhId'],
                    'tanfdhAmount' => 250//($tanfidh[$key]['role']=='mushrif'?350:250),
                ];
                $umr->update($tanfidh[$key]['tnfdhId'], $data2);
            }
        }
        // dd($data2);
        
        return redirect()->to('mashruu/add')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.success'));
    }

    public function delete()
    {
        $mash = new Mashruu();

        $umra = $mash->where('status', 0)->findAll();

        foreach ($umra as $dt) {
            $ok = $mash->delete($dt['id']);
        }
        
        if ($ok) {
            return redirect()->to('tanfidh')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
        }
    }

    public function tasrih()
    {
        $tanfidh = new Umrah();
        $user = new User();
        $tsrh = new Tanfidh();

        $umrah = $tanfidh->where(['tnfdhStatus' => 1])
                        ->join('users us', 'us.id=tanfidh.userid')
                        ->findAll();
        $umrah = $tanfidh->where(['tnfdhStatus' => 1])->findAll();
        if (count($umrah) > 0) {
            foreach ($umrah as $dt) {
                $ok[] = [
                    'tanfidh' => $tanfidh->find($dt['tnfdhId']),
                    'user' => $user->join('countries c', 'c.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->join('banks', 'banks.bankId=users.bank')
                            ->find($dt['userId']),
                ];
            }
        } else {
            $ok = [];
        }

        $data['title'] = lang('app.tasrihs');
        $data['umrah'] = $ok;
        $data['tasrih'] = $tsrh->join('users s', 's.id=tanfidh.userId')
                            ->join('countries c', 'c.country_code=s.nationality')
                            ->join('universities u', 'u.uni_id=s.jamia')
                            ->findAll();
        // dd($data);

        if (session('role') != 'user') {
            return view('mashruu/tasrih', $data);
        } else {
            return redirect()->to('user');
        } 
    }

    public function download()
    {
        $set = new Setting();
        $date = $set->where('info', 'tasrihDate')->first()['extra'];
         
        // $loc is the location of files to be downloaded!
        $user = new User();
        // $source = 'app-assets/images/tasrih';
        // $destination = FCPATH.'compressed';
        // $zipcreation = $user->zip_creation($source, $destination);
        dd($date);
        return $this->response->download(FCPATH . 'compressed.zip', null);
        // $tasrih = $tsrh->findAll();
        // // dd($tasrih);
        // // foreach ($tasrih as $file) {
        //     $paths = base_url('app-assets/images/tasrih');
        //     // add data own data into the folder created
        //     $this->zip->add_data('tas'.file_get_contents($paths));    
        // // }
        // $this->zip->download('26-12-2022.zip');
        // foreach ($query->result() as $row){
        //     $this->zip->read_file($row->filename);
        // }

        // $this->zip->download('files_backup.zip');
    }

    public function tasrihDelete()
    {
        dd('tasrihDelete');
        // delete all tasrih
        // empty umrah teble
    }
}
