<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BarangController extends BaseController
{
	var $barangModel;
	public function __construct(){
		$this->barangModel = new \App\Models\Barang();
	}

    public function index()
    {
		$data['barang'] = $this->barangModel->findAll();
        $data['page'] = 'barang/index';
        return view('admin', $data);
    }
	
	public function show($id){
		echo $id;
	}
	
	public function create(){
		$request = $this->request->getJSON();

		if($this->barangModel->save($request)){
			return $this->response->setJson(['message'=>'data berhasil di simpan']);
		}else{
			return $this->response->setJson(['message'=>'data gagal di simpan']);
		}
	}

	public function delete($id){
		$this->barangModel->delete($id);
		return $this->response->setJson(['message'=>'data berhasil di hapus']);
	}
}
