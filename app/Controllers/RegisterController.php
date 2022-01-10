<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpParser\Node\Expr\FuncCall;

class RegisterController extends BaseController
{
    var $userModel;
    var $session;

	public function __construct(){
		$this->userModel = new \App\Models\Users();
        $this->session = \Config\Services::session();
	}

    public function index()
    {
        $data['pesan'] = $this->session->getFlashdata('message');
        return view('users/register',$data);
    }

    public function register(){
        $request = [
            'email'=> $this->request->getPost('email'),
            'namaPengguna'=>$this->request->getPost('nama_penguna'),
            'userType'=>'Admin',
            'userAlias'=>'',
            'Password'=> $this->request->getPost('nama_penguna'),
            'Status'=> '0',
        ];

        if($this->userModel->save($request)){
            $this->session->setFlashdata('message', 'data berhasil di simpan');
		}else{
            $this->session->setFlashdata('message', 'data gagal di simpan');
		}
        return redirect()->to(site_url('register'));
    }
}
