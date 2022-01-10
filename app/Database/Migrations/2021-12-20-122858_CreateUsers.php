<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
            ],
            'namaPengguna'       => [
				'type'       => 'VARCHAR',
				'constraint' => '30',
            ],
            'userType'       => [
				'type'       => 'VARCHAR',
				'constraint' => '30',
            ],
            'userAlias'       => [
				'type'       => 'VARCHAR',
				'constraint' => '30',
            ],
            'Password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '30',
            ],
            'Status'       => [
				'type'       => 'VARCHAR',
				'constraint' => '1',
            ]
        ]);
 
        $this->forge->addKey('email', true);
		$this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
