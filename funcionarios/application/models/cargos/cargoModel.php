<?php

class CargoModel extends CI_Model{
  function __construct(){
    parent:: __construct();
    $this->load->database();
  }

  function cargoAdd($info)
  {
    $data = array(
      'nombre' => $info['nombre'],
      'descripcion' => $info['descripcion'],
      'estado' => '1',
    );

    $dataAu = array(
      'nombre' => $info['name'],
      'descripcion' => $info['descripcion'],

    );

    $this->db->insert('cargo',$data);
    $this->db->insert('cargo_respaldo',$dataAu);

  }

  function getCargos(){

    $query = $this->db->get_where('cargo',array('estado' => 1));
    if($query){
      return  $query;
    }else{
      return false;
    }
  }

  function getSubdirecciones(){

      // armamos la consulta
      $query = $this->db-> query('SELECT idsubdirecciones,nombre FROM subdirecciones');
      // si hay resultados
      if ($query->num_rows() > 0) {
          // almacenamos en una matriz bidimensional
          foreach($query->result() as $row)
             $arrDatos[htmlspecialchars($row->idsubdirecciones, ENT_QUOTES)] =
  htmlspecialchars($row->nombre, ENT_QUOTES);

          $query->free_result();
          return $arrDatos;
       }
  }



  function getCargo($id){
    $query = $this->db->get_where('cargo', array('idcargo' => $id));
    return $query;
  }


  function deshabilitarCargo($id){

    $query = $this->db->set('estado', FALSE)
                ->where('idcargo', $id)
                ->update('cargo');

  }

  function actualizarCargo ($info,$id){
    $data = array(
      'nombre' => $info['name'],
      'descripcion' => $info['descripcion'],
      'estado' => '1',
    );
    $this->db->where('idcargo', $id);
    $this->db->update('cargo', $data);
  }








}
?>
