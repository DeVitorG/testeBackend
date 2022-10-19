<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ApiNoticia extends CI_Controller {

    //Dentro do construtor foi definido uma rota padrão para conexão com o banco.
    public function __construct()
    {
        parent::__construct();

        $this->load->model('ApiNoticia_model', 'ApiNoticia');
    }


    // Criação da função de criação da noticia.
    public function criar()
    {   
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));

        $obj = new stdClass();
        if($json_post->noticia <> null)
        {   
            $cod = $this->ApiNoticia->criarNoticia($json_post);
            if($cod > 0)
            {
                $array['Mensagem'] = 'A notícia foi cadastrada com sucesso!'; 
                $obj->status = 200;
                $obj->data = $array;
            }else{
            $array['Mensagem'] = 'A notícia não foi cadastrada com sucesso!'; 
            $obj->status = 500;
            $obj->data = $array;
            } 
        }   
        else
        {
            $array['Mensagem'] = 'Não foram definidos os parâmetros necessários!'; 
            $obj->status = 404;
            $obj->data = $array;
        }
        echo json_encode($obj);
        

    }
    // Criação da função de edição da noticia já cadastrada.
    public function editar()
    {
        $obj = new stdClass();
        if(count($_GET) > 0)
        {
            
        }
        else
        {
            $array['Mensagem'] = 'Não foram definidos os parâmetros necessários!'; 
            $obj->status = 404;
            $obj->data = $array;
        }
        echo json_encode($obj);
    }
    // Criação da função da lista de notícias já cadastradas.
    public function listar()
    {
        $obj = new stdClass();
        if(count($_GET) > 0)
        {
            
        }
        else
        {
            $array['Mensagem'] = 'Não foram definidos os parâmetros necessários!'; 
            $obj->status = 404;
            $obj->data = $array;
        }
        echo json_encode($obj);
    }
    // Criação da função de delete da notícia já cadastrada.
    public function deletar()
    {
        $obj = new stdClass();
        if(count($_GET) > 0)
        {
            
        }
        else
        {
            $array['Mensagem'] = 'Não foram definidos os parâmetros necessários!'; 
            $obj->status = 404;
            $obj->data = $array;
        }
        echo json_encode($obj);
    }


}

?>