<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'SERIAL',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'reg_date' => array(
                'type' => 'TIMESTAMP',
                'default' => 'now()',
            ),
            'reg_date' => array(
                'type' => 'TIMESTAMP',
            ),
            'fg_state' => array(
                'type' => 'SMALLINT',
                'default' => 0,
            ),
        ));

        $this->dbforge->add_key('id', TRUE);

        $this->db->query('CREATE UNIQUE INDEX uq_m_users_email ON m_users (email);');
        $this->db->query('CREATE UNIQUE INDEX uq_m_users_username ON m_users (username);');

        $this->dbforge->create_table('m_users');
    }

    public function down()
    {
        $this->dbforge->drop_table('m_users');
    }
}
