<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiNoticia_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function criarNoticia($argumentos)
    {
        try 
        {
            $this->db->set('titulo_noticia', $argumentos->noticia);
            $this->db->set('des_noticia', $argumentos->noticia);
            $this->db->set('dta_cadastro', date('Y-m-d H:i:s'));
            $this->db->insert('noticias');

            $db_error = $this->db->error();

            if (!empty($db_error['message'])) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return FALSE;
            }
            return $this->db->insert_id();
        } catch (Exception $e) {
            return -1;
        }
        
    }

}