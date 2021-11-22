<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UsersController extends BaseController
{
    public function index()
    {
		$data['page'] = 'users/index';
        return view('admin', $data);
    }
	
	public function show($id){
		echo $id;
	}
	
	public function create(){
		echo "ini create function";
	}
	
}
