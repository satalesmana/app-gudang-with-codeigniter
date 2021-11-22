<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblDokter extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'idDokter' => [
				'type'           => 'VARCHAR',
				'constraint'     => 5,
			],
            'namaDokter' => [
				'type'           => 'VARCHAR',
				'constraint'     => 30,
			]
        ]);
        $this->forge->addKey('idDokter', true);
		$this->forge->createTable('dokter');

    }

    public function down()
    {
        $this->forge->dropTable('dokter');
    }
}
