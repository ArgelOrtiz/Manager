<?php

class Migration_Size extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'last_update' => array(
                'type' => 'TIMESTAMP'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('size');
    }

    public function down() {
        $this->dbforge->drop_table('size');
    }

}