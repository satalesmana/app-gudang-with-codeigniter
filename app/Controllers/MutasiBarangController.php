<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MutasiBarangController extends BaseController
{
    var $session;
    var $users;
    var $barang;
    var $mutasiHeader;
    var $mutasiDetail;
    
    public function __construct(){
        $this->session = \Config\Services::session();
        $this->users =  new \App\Models\Users();
        $this->barang = new \App\Models\Barang();
        $this->mutasiHeader = new \App\Models\MutasiHeader();
        $this->mutasiDetail = new \App\Models\MutasiDetail();
	}

    public function index()
    {
        $data['page'] = 'mutasi/barang_keluar';
        $data['user_login'] = $this->session->get();
        $data['users'] = $this->users->findAll();
        $data['barang'] = $this->barang->findAll();

        return view('admin', $data);
    }

    public function create(){
        $request = $this->request->getJSON();

        $last_item = $this->mutasiHeader->orderBy('id', 'desc')
            ->findAll(1);

        $id = count($last_item) > 0 ? count($last_item) + 1 : 1;

        $data_header =[
            'id'=> $id,
            'id_petugas'=>$this->session->get('username'),
            'id_request'=>$request->user_request,
            'tgl_proses'=> date('Y-m-d')
        ];

        $this->mutasiHeader->insert($data_header);

        $data_detail =[];
        foreach($request->item_data as $key=>$item){
            $data_detail[$key]['mutasi_id'] = $id;
            $data_detail[$key]['id_barang'] = $item->id_barang;
            $data_detail[$key]['qty'] = $item->qty;
        }
        
        $this->mutasiDetail->insertBatch($data_detail);

        return $this->response->setJson(['message'=>'data berhasil di simpan']);

    }
}
