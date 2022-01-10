<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    var $userModel;
    var $session;

	public function __construct(){
		$this->userModel = new \App\Models\Users();
        $this->session = \Config\Services::session();
	}

    public function index()
    {
        //
    }

    public function cekLogin(){
        $username = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $row = $this->userModel->where('email',$username)
                    ->where('password',$password)
                    ->findAll();
        
        if(count($row) > 0){
            $this->session->set([
                'username'  => $username,
                'nama_pengguna'     => $row[0]['namaPengguna'],
                'alias'=>$row[0]['userAlias'],
                'userType'=>$row[0]['userType']
            ]);

            return redirect()->to(site_url('admin/dashboard'));
        }else
            return redirect()->to(site_url('/'));
    }
}
