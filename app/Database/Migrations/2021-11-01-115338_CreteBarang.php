<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreteBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_barang'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'harga_jual'      => [
				'type'       => 'INT',
				'constraint' => '100',
			],
			'harga_beli'       => [
				'type'       => 'INT',
				'constraint' => '100',
			],
			'qty'       => [
				'type'       => 'INT',
				'constraint' => '100',
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('barangs');
    }

    public function down()
    {
        $this->forge->dropTable('barangs');
    }
}
