<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//informação que a migration foi criada
class Migrate extends CI_Controller { 
    public function index() { 
        $this->load->library('migration');
        if ($this->migration->current() === FALSE)
        {
            echo $this->migration->error_string();
        }else{
            echo "Tabela criada com sucesso!";
        }
    }
}