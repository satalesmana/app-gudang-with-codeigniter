<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MutasiDetail extends Migration
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
			'mutasi_id'       => [
				'type'       => 'INT',
				'constraint' => 5,
			],
			'id_barang'      => [
				'type'       => 'INT',
				'constraint' => 5,
			],
			'qty' => [
				'type'       => 'INT',
				'constraint'  => 12,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('mutasi_detail');
    }

    public function down()
    {
        $this->forge->dropTable('mutasi_detail');
    }
}
