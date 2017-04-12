<?php

class DepartamentoModel extends CI_Model{
  function __construct(){
    parent:: __construct();
    $this->load->database();
}

function departamentosAdd($info)
{
  $data = array(
    'nombre' => $info['name'],
    'descripcion' => $info['descripcion'],
    'subdirecciones_idsubdirecciones' => $info['subdirecciones'],
    'estado' => '1',
    );
    $dataAu = array(
      'nombre' => $info['name'],
      'descripcion' => $info['descripcion'],
      'subdirecciones' => $info['subdirecciones'],
      );

$this->db->insert('departamento',$data);
$this->db->insert('departamento_respaldo',$dataAu);
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


function getDepartamentos(){
  $query = $this->db->query('SELECT d.iddepartamento, d.nombre, d.descripcion, d.estado , sb.nombre as subdireccion FROM departamento d LEFT JOIN subdirecciones sb ON d.subdirecciones_idsubdirecciones= sb.idsubdirecciones WHERE d.estado=1');
  if($query->num_rows() > 0){
    return $query;
  }else{
    return false;
  }
}


function deshabilitarDepartamento($id){
  $query = $this->db->set('estado', FALSE)
              ->where('iddepartamento', $id)
              ->update('departamento');
}
function getDepartamento($id){

  $query = $this->db->get_where('departamento', array('iddepartamento' => $id));
  return $query;
}

function actualizarDepartamento($info,$id){

  $data = array(
    'nombre' => $info['name'],
    'descripcion' => $info['descripcion'],
    'subdirecciones_idsubdirecciones' => $info['subdirecciones'],
    'estado' => '1',
    );
  $this->db->where('iddepartamento', $id);
  $this->db->update('departamento', $data);

}

}
 ?>
