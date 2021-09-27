<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbFile extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_file'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_project'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'nama_file'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'size'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_file', true);
        $this->forge->createTable('tb_file');
    }

    public function down()
    {
        $this->forge->dropTable('tb_file');
    }
}
