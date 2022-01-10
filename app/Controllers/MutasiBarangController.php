<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MutasiBarangController extends BaseController
{
    var $session;
    var $users;
    var $barang;

    public function __construct(){
        $this->session = \Config\Services::session();
        $this->users =  new \App\Models\Users();
        $this->barang = new \App\Models\Barang();
	}

    public function index()
    {
        $data['page'] = 'mutasi/barang_keluar';
        $data['user_login'] = $this->session->get();
        $data['users'] = $this->users->findAll();
        $data['barang'] = $this->barang->findAll();

        return view('admin', $data);
    }
}
