<?php

class UsersModel extends CI_Model{
  function __construct(){
    parent:: __construct();
    $this->load->database();
  }

  function userAdd($info)
  {
    $data = array(
      'nombre' => $info['nombre'],
      'apellido' => $info['apellido'],
      'rut' => $info['rut'],
      'correo' => $info['email'],
      'password' => $info['password'],
      'estado' => '1',

    );
    $dataAu = array(
      'nombre' => $info['nombre'],
      'apellido' => $info['apellido'],
      'rut' => $info['rut'],
      'password' => $info['password'],
      );
    $this->db->insert('usuario',$data);
    $this->db->insert('usuario_respaldo',$dataAu);
  }
  function getUsuarios(){
    $query = $this->db->get_where('usuario',array('estado' => 1));
    if($query->num_rows() > 0){
      return $query;
    }else{
      return false;
    }
  }


  function deshabilitarUsuario($id){
    $query = $this->db->set('estado', FALSE)
                ->where('idusuario', $id)
                ->update('usuario');

  }

  function getUsuario($id){

    $query = $this->db->get_where('usuario', array('idusuario' => $id));
    return $query;
  }

  function userUpdate($data, $id){

    $data = array(
      'nombre' => $data['nombre'],
      'apellido' => $data['apellido'],
      'rut' => $data['rut'],
      'correo' => $data['email'],
      'password' => $data['password'],
      'estado' => '1',

    );
    $this->db->where('idusuario', $id);
    $this->db->update('usuario', $data);

  }


}
?>
