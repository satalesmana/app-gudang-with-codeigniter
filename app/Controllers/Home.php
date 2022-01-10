<?php

namespace App\Controllers;

class Home extends BaseController
{
    var $session;

	public function __construct(){
        $this->session = \Config\Services::session();
	}
    public function index()
    {
        return view('welcome_message');
    }

    public function dashboard(){
        $data['users_active'] = $this->session->get();
        $data['page'] = 'users/dashboard';
        return view('admin',$data);
    }
    
}
