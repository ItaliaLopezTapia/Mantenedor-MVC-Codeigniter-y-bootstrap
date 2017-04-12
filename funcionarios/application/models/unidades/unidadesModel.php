<?php

class UnidadesModel extends CI_Model{
  function __construct(){
    parent:: __construct();
    $this->load->database();
}

function unidadAdd($info)
{
  $data = array(
    'nombre' => $info['nombre'],
    'descripcion' => $info['descripcion'],
    'departamento_iddepartamento' => $info['selDepartamento'],
    'estado' => '1',

    );
    $dataAu = array(
      'nombre' => $info['nombre'],
      'descripcion' => $info['descripcion'],
      'departamento' => $info['selDepartamento'],

      );

$this->db->insert('unidad',$data);
$this->db->insert('unidad_respaldo',$dataAu);
}


function getDepartamentos(){

    // armamos la consulta
    $query = $this->db-> query('SELECT * from departamento where estado = 1');
    // si hay resultados
    if ($query->num_rows() > 0) {
        // almacenamos en una matriz bidimensional
        foreach($query->result() as $row)
           $arrDatos[htmlspecialchars($row->iddepartamento, ENT_QUOTES)] =
htmlspecialchars($row->nombre, ENT_QUOTES);

        $query->free_result();
        return $arrDatos;
     }
}


function getUnidades(){
  // $query = $this->db->get_where('unidad', array('estado' => 1));
  $query = $this->db-> query('SELECT u.idunidad, u.nombre, u.descripcion , d.nombre as departamento FROM unidad u INNER JOIN departamento d ON u.departamento_iddepartamento=d.iddepartamento where u.estado = 1');
  if($query->num_rows() > 0){
    return $query;
  }else{
    return false;
  }
}
function getUnidad($id){

  $query = $this->db->get_where('unidad', array('idunidad' => $id));
  return $query;
}

function deshabilitarUnidad($id){

  $query = $this->db->set('estado', FALSE)
              ->where('idunidad', $id)
              ->update('unidad');

}

function actualizarUnidad($info, $id){
  $data = array(
    'nombre' => $info['nombre'],
    'descripcion' => $info['descripcion'],
    'departamento_iddepartamento' => $info['departamento'],
    'estado' => '1',

    );

  $this->db->where('idunidad', $id);
  $this->db->update('unidad', $data);
}


}
 ?>
