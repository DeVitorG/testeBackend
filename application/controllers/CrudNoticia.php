<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CrudNoticia extends CI_Controller {

    //Dentro do construtor foi definido uma rota padrão para conexão com o banco.
    public function __construct()
    {
        parent::__construct();

        
    }

    public function index(){
        $this->load->view('crud_noticia');
    }
}

?>