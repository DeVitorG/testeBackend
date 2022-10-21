<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ApiNoticia extends CI_Controller {

    //Dentro do construtor foi definido uma rota padrão para conexão com o banco.
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('ApiNoticia_model', 'ApiNoticia');

        $this->obj = new stdClass();
        $this->json_post = json_decode(file_get_contents("php://input"));


        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");

    }

    // Criação da função de criação da noticia.
    public function criar()
    {   
        $this->json_post->titulo = isset($this->json_post->titulo) ? $this->json_post->titulo : null;
        $this->json_post->noticia = isset($this->json_post->noticia) ? $this->json_post->noticia : null;

        //Verificando se o título foi informado
        if(empty($this->json_post->titulo)){
            $array['Mensagem'] = 'O título não foi definido!'; 
            $this->obj->status = 522;
            $this->obj->data = $array;
        }
        //Verificando se o tipo de notícia foi informado 
        if(empty($this->json_post->noticia)){
            $array['Mensagem'] = 'A descrição da notícia não foi definida!'; 
            $this->obj->status = 522;
            $this->obj->data = $array;
        }
        //Ação de cadastrar a notícia.
        if($this->json_post->noticia <> null && $this->json_post->titulo <> null)
        {   
            $cod = $this->ApiNoticia->criarNoticia($this->json_post);
            if($cod > 0)
            {
                $array['Mensagem'] = 'A notícia foi cadastrada com sucesso!'; 
                $this->obj->status = 201;
                $this->obj->data = $array;
            }else
            {
                $array['Mensagem'] = 'A notícia não foi cadastrada!'; 
                $this->obj->status = 500;
                $this->obj->data = $array;
            } 
        }   
        echo json_encode($this->obj);
        
    }

    // Criação da função de edição da noticia já cadastrada.
    public function editar($cod)
    {
        if($cod > 0){
        $this->json_post->titulo = isset($this->json_post->titulo) ? $this->json_post->titulo : null;
        $this->json_post->noticia = isset($this->json_post->noticia) ? $this->json_post->noticia : null;

        //Verificando se o título foi informado
        if(empty($this->json_post->titulo)){
            $array['Mensagem'] = 'O título não foi definido!'; 
            $this->obj->status = 522;
            $this->obj->data = $array;
        }
        //Verificando se a descrição da notícia foi informada 
        if(empty($this->json_post->noticia)){
            $array['Mensagem'] = 'A descrição da notícia não foi definida!'; 
            $this->obj->status = 522;
            $this->obj->data = $array;
        }

        if($this->json_post->titulo <> null && $this->json_post->noticia <> null)
        {   
            $codReturn = $this->ApiNoticia->editarNoticia($this->json_post, $cod);
            if($codReturn > 0)
            {
                $array['Mensagem'] = 'A notícia foi atualizada com sucesso!'; 
                $this->obj->status = 201;
                $this->obj->data = $array;
            }else
            {
                $array['Mensagem'] = 'A notícia não foi atualizada!'; 
                $this->obj->status = 500;
                $this->obj->data = $array;
            } 
        }   
        else
        {
            $array['Mensagem'] = 'Não foram definidos os parâmetros necessários!'; 
            $this->obj->status = 522;
            $this->obj->data = $array;
        }
    }else
    {
            $array['Mensagem'] = 'Não foram definidos os parâmetros necessários!'; 
            $this->obj->status = 522;
            $this->obj->data = $array;
    }
    echo json_encode($this->obj);

    }
    // Criação da função da lista de notícias já cadastradas filtrando o titulo.
    public function busca()
    {
        $resultado = $this->ApiNoticia->buscarNoticia($_GET);
        $this->obj->status = 200;
        $this->obj->data = $resultado;
        echo json_encode($this->obj);

    }
    // Criação da função da lista de notícias já cadastradas filtrando o id_noticia.
    public function buscaCod($cod = 0)
    {
        $resultado = $this->ApiNoticia->buscarNoticiaCod($cod);
        $this->obj->status = 200;
        $this->obj->data = $resultado;
        echo json_encode($this->obj);

    }
    // Criação da função de delete da notícia já cadastrada.
    public function deletar()
    {
        $this->json_post->cod = isset($this->json_post->cod) ? $this->json_post->cod : null;

        if($this->json_post->cod > 0)
        {   
            $cod = $this->ApiNoticia->deletarNoticia($this->json_post);
            if($cod > 0)
            {
                $array['Mensagem'] = 'A notícia foi deletada com sucesso!'; 
                $this->obj->status = 200;
                $this->obj->data = $array;
            }else
            {
                $array['Mensagem'] = 'A notícia não foi deletada!'; 
                $this->obj->status = 500;
                $this->obj->data = $array;
            } 
        }   
        else
        {
            $array['Mensagem'] = 'Não foram definidos os parâmetros necessários!'; 
            $this->obj->status = 522;
            $this->obj->data = $array;
        }
        echo json_encode($this->obj);
    }


}

?>