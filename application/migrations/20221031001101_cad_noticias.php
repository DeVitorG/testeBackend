<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//Estrutura do banco de dados.
class Migration_cad_noticias extends CI_Migration { 
    public function up() { 
            $this->dbforge->add_field(array(
            'id_noticia' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'auto_increment' => TRUE
            ),
            'titulo_noticia' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '200'
            ),
            'des_noticia' => array(
                    'type' => 'TEXT',
                    'null' => TRUE
            ),
            'dta_cadastro' => array(
                'type' => 'DATETIME',
            ),
            'dta_upd_noticia' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('id_noticia', TRUE);
        $this->dbforge->create_table('cad_noticias');
    }

    public function down()
    {
        $this->dbforge->drop_table('cad_noticias');
    }
}