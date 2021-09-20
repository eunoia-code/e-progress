<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbProject extends Migration
{
  public function up()
  {
    $this->forge->addField([
        'id_project'          => [
          'type'           => 'INT',
          'constraint'     => 11,
          'auto_increment' => true,
        ],
        'pic'       => [
          'type'       => 'VARCHAR',
          'constraint' => '255',
        ],
        'durasi'       => [
          'type'       => 'VARCHAR',
          'constraint' => '255',
        ],
        'periode'       => [
          'type'       => 'VARCHAR',
          'constraint' => '255',
        ],
        'project'       => [
          'type'       => 'VARCHAR',
          'constraint' => '255',
        ],
        'desc'       => [
          'type'       => 'TEXT'
        ],
        'status'       => [
          'type'       => 'VARCHAR',
          'constraint' => '50',
        ],
        'tgl_sit'       => [
          'type'       => 'DATE',
        ],
        'tgl_uat'       => [
          'type'       => 'DATE',
        ],
        'tgl_to'       => [
          'type'       => 'DATE',
        ],
        'dokumen_pendukung'       => [
          'type'       => 'VARCHAR',
          'constraint' => '255',
        ],
        'os'       => [
          'type'       => 'VARCHAR',
          'constraint' => '50',
        ],
        'message_h2h'       => [
          'type'       => 'VARCHAR',
          'constraint' => '255',
        ],
        'time_stamp'       => [
          'type'       => 'DATETIME'
        ],
    ]);
    $this->forge->addKey('id_project', true);
    $this->forge->createTable('tb_project');
  }

  public function down()
  {
    $this->forge->dropTable('tb_project');
  }
}
