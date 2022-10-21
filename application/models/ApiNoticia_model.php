<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiNoticia_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    //query que realiza o insert da noticia.
    public function criarNoticia(object $argumentos)
    {
        try 
        {
            $this->db->set('titulo_noticia', $argumentos->titulo);
            $this->db->set('des_noticia', $argumentos->noticia);
            $this->db->set('dta_cadastro', date('Y-m-d H:i:s'));
            $this->db->insert('cad_noticias');

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
    //query que realiza o update da noticia.
    public function editarNoticia(object $argumentos, $cod)
    {
        try 
        {
            $this->db->set('titulo_noticia', $argumentos->titulo);
            $this->db->set('des_noticia', $argumentos->noticia);
            $this->db->set('dta_upd_noticia', date('Y-m-d H:i:s'));
            $this->db->where('id_noticia',$cod);
            $this->db->update('cad_noticias');

            $db_error = $this->db->error();

            if (!empty($db_error['message'])) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return FALSE;
            }
            return $cod;
        } catch (Exception $e) {
            return -1;
        }
    }

    //query que realiza o select apenas utilizando o titulo da noticia.
    public function buscarNoticia($argumentos)
    {
        try{
            $this->db->select('id_noticia,titulo_noticia,des_noticia');
            $this->db->from('cad_noticias');
            if(isset($argumentos['titulo'])){
                $this->db->like('titulo_noticia', $argumentos['titulo'], 'both');                       
            }
            $resultado = $this->db->get()->result();            
            $db_error = $this->db->error();
            
            if (!empty($db_error['message'])) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return FALSE;
            }
            return $resultado;
        }catch(Exception $e){
             return array();
       }    
    }

    //query que realiza o select apenas utilizando o cod da noticia.
    public function buscarNoticiaCod($cod)
    {
        try{
            $this->db->select('id_noticia,titulo_noticia,des_noticia');
            $this->db->from('cad_noticias');
            if(isset($cod) && $cod > 0){
                $this->db->where('id_noticia', $cod);                       
            }
            $resultado = $this->db->get()->result();            
            $db_error = $this->db->error();
            
            if (!empty($db_error['message'])) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return FALSE;
            }
            return $resultado;
        }catch(Exception $e){
             return array();
       }    
    }

    //query que realiza o delete da noticia.
    public function deletarNoticia($argumentos)
    {
        try {
            $this->db->where('id_noticia', $argumentos->cod);
            $this->db->delete('cad_noticias');
            $db_error = $this->db->error();

            if (!empty($db_error['message'])) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return FALSE;
            }
            return $argumentos->cod;
        } catch (Exception $e) {
            return -1;
        }
    }

}