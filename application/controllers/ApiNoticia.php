<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ApiNoticia extends CI_Controller {

    //Dentro do construtor foi definido uma rota padrão para conexão com o banco.
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('ApiNoticia_model', 'ApiNoticia');
        $this->obj = new stdClass();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
    }


    // Criação da função de criação da noticia.
    public function criar()
    {   
        $json_post = json_decode(file_get_contents("php://input"));

        
        if($json_post->noticia <> null AND $json_post->titulo <> null)
        {   
            $cod = $this->ApiNoticia->criarNoticia($json_post);
            if($cod > 0)
            {
                $array['Mensagem'] = 'A notícia foi cadastrada com sucesso!'; 
                $this->obj->status = 200;
                $this->obj->data = $array;
            }else{
            $array['Mensagem'] = 'A notícia não foi cadastrada com sucesso!'; 
            $this->obj->status = 500;
            $this->obj->data = $array;
            } 
        }   
        else
        {
            $array['Mensagem'] = 'Não foram definidos os parâmetros necessários!'; 
            $this->obj->status = 404;
            $this->obj->data = $array;
        }
        echo json_encode($this->obj);
        
    }
    // Criação da função de edição da noticia já cadastrada.
    public function editar()
    {
        if(count($_GET) > 0)
        {
            
        }
        else
        {
            $array['Mensagem'] = 'Não foram definidos os parâmetros necessários!'; 
            $this->obj->status = 404;
            $this->obj->data = $array;
        }
        echo json_encode($this->obj);
    }
    // Criação da função da lista de notícias já cadastradas.
    public function listar()
    {
        if(count($_GET) > 0)
        {
            
        }
        else
        {
            $array['Mensagem'] = 'Não foram definidos os parâmetros necessários!'; 
            $this->obj->status = 404;
            $this->obj->data = $array;
        }
        echo json_encode($this->obj);
    }
    // Criação da função de delete da notícia já cadastrada.
    public function deletar()
    {
        if(count($_GET) > 0)
        {
            
        }
        else
        {
            $array['Mensagem'] = 'Não foram definidos os parâmetros necessários!'; 
            $this->obj->status = 404;
            $this->obj->data = $array;
        }
        echo json_encode($this->obj);
    }


}

?>