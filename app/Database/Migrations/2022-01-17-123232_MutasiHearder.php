<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MutasiHearder extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
			],
			'id_petugas'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'id_request'      => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'tgl_proses'       => [
				'type'       => 'DATE',
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('mutasi_header');
    }

    public function down()
    {
        $this->forge->dropTable('mutasi_header');
    }
}
