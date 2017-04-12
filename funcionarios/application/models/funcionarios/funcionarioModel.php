<?php

class FuncionarioModel extends CI_Model{
  function __construct(){
    parent:: __construct();
    $this->load->database();
  }

  function funcionarioAdd($info)
  {
    $data = array(
      'nombre' => $info['nombre'],
      'apellidoP' => $info['apellidoP'],
      'apellidoM' => $info['apellidoM'],
      'rut' => $info['rut'],
      'email' => $info['correo'],
      'anexo' => $info['anexo'],
      'imagen' => $info['imagen'],
      'jefe' => $info['jefe'],
      'unidad_idunidad' => $info['unidad'],
      'cargo_idcargo' => $info['cargo'],
      'estado' => '1',
    );
    $dataAu = array(
      'nombre' => $info['nombre'],
      'apellidoP' => $info['apellidoP'],
      'apellidoM' => $info['apellidoM'],
      'rut' => $info['rut'],
      'email' => $info['correo'],
      'anexo' => $info['anexo'],
      'imagen' => $info['imagen'],
      'jefe' => $info['jefe'],
      'unidad' => $info['unidad'],
      'cargo' => $info['cargo'],

    );

    $this->db->insert('funcionario',$data);
    $this->db->insert('funcionario_respaldo',$dataAu);
  }


  function getCargos(){

    // armamos la consulta
    $query = $this->db-> query('SELECT idcargo,nombre FROM cargo');
    // si hay resultados
    if ($query->num_rows() > 0) {
      // almacenamos en una matriz bidimensional
      foreach($query->result() as $row)
      $arrDatos[htmlspecialchars($row->idcargo, ENT_QUOTES)] =
      htmlspecialchars($row->nombre, ENT_QUOTES);

      $query->free_result();
      return $arrDatos;
    }
  }

  function getUnidades(){
    // armamos la consulta
    $query = $this->db-> query('SELECT idunidad,nombre FROM unidad');
    // si hay resultados
    if ($query->num_rows() > 0) {
      // almacenamos en una matriz bidimensional
      foreach($query->result() as $row)
      $arrDatos[htmlspecialchars($row->idunidad, ENT_QUOTES)] =
      htmlspecialchars($row->nombre, ENT_QUOTES);

      $query->free_result();
      return $arrDatos;
    }
  }
  function getJefe(){
    // armamos la consulta
    $query = $this->db-> query('SELECT idfuncionario,nombre FROM funcionario');
    // si hay resultados
    if ($query->num_rows() > 0) {
      // almacenamos en una matriz bidimensional
      foreach($query->result() as $row)
      $arrDatos[htmlspecialchars($row->idfuncionario, ENT_QUOTES)] =
      htmlspecialchars($row->nombre, ENT_QUOTES);

      $query->free_result();
      return $arrDatos;
    }
  }

  function getFuncionarios(){


    $query = $this->db->query('SELECT f.idfuncionario, f.imagen, f.nombre, f.apellidoP , f.apellidoM , f.anexo, f.email , f.rut, fu.nombre as nombre_jefe,fu.apellidoP as apellido_jefe , c.nombre as cargo_nombre, u.nombre as unidad_nombre , d.nombre as departamento_nombre FROM funcionario f INNER JOIN funcionario fu ON f.jefe = fu.idfuncionario INNER JOIN unidad u ON f.unidad_idunidad = u.idunidad INNER JOIN cargo c ON f.cargo_idcargo = c.idcargo INNER JOIN departamento d ON u.departamento_iddepartamento = d.iddepartamento where f.estado = 1');

if($query->num_rows() > 0){
  return $query;
}else{
  return false;
}}



  function getFuncionario($id){

    $query = $this->db->get_where('funcionario', array('idfuncionario' => $id));
    return $query;
  }



  function deshabilitarFuncionario($id){

    $query = $this->db->set('estado', FALSE)
    ->where('idfuncionario', $id)
    ->update('funcionario');
  }


  function funcionarioUpdate ($info,$id){


        // $data = array(
        //   'nombre' => $info['nombre'],
        //   'apellidoP' => $info['apellidoP'],
        //   'apellidoM' => $info['apellidoM'],
        //   'rut' => $info['rut'],
        //   'email' => $info['email'],
        //   'anexo' => $info['anexo'],
        //   'imagen' => $info['imagen'],
        //   'jefe' => $info['jefe'],
        //   'unidad_idunidad' => $info['unidad_idunidad'],
        //   'cargo_idcargo' => $info['cargo_idcargo'],
        //   'estado' => '1',
        // );
        $this->db->where('idfuncionario', $id);
        $this->db->update('funcionario', $info);

}
}
?>
