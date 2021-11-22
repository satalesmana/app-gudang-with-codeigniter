<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
        	[
                'nama_barang' 	=> 'Buku',
                'harga_jual'    => 6000,
                'harga_beli'    => 5000,
                'qty'    		=> 100
        	],
	        [
                'nama_barang' 	=> 'Komputer',
                'harga_jual'    => 6000,
                'harga_beli'    => 5000,
                'qty'    		=> 100
            ],
            [
                'nama_barang' 	=> 'Komputer dua',
                'harga_jual'    => 6000,
                'harga_beli'    => 5000,
                'qty'    		=> 100
	        ]
	    ];

        $this->db->table('barangs')->insertBatch($data);
    }
}
