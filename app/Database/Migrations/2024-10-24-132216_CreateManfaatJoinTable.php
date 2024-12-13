<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateManfaatJoinTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_manfaatjoin' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'gambar' => [
                'type'       => 'TEXT',
            ],
            'judul_manfaat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'judul_manfaat_en' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_manfaat' => [
                'type'       => 'TEXT',
            ],
            'deskripsi_manfaat_en' => [
                'type'       => 'TEXT',
            ],
        ]);

        $this->forge->addKey('id_manfaatjoin', true);
        $this->forge->createTable('manfaatjoin');
    }

    public function down()
    {
        $this->forge->dropTable('manfaatjoin');
    }
}
