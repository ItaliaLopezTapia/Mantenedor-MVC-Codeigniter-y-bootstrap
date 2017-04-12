
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading"><div class="row">
        <div class="col-lg-10">
    <h1 class="page-header" style="color:black;">Gestionar Departamentos</h1>
    </div>
    <div class="col-lg-2">
          <a href="<?php echo base_url('departamentos/departamentoAdd'); ?>">   <button type="button" class="btn  btn-lg" style="top:-50%;transform:translate(0,50%);width:100px;height:100px;border-radius:50%;background-color:rgb(9, 148, 208);color:white">
        <i class="fa fa-plus fa-lg" aria-hidden="true"></i></button></a>

  </button>
  </div>

  </div></div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-6 col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <div class="huge">3</div>
                  <div>Total Departamentos</div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table " id="department-table">
                <thead>
                  <tr>
                    <th><center>Id</center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Descripcion</center></th>
                    <th><center>Subdireccion</center></th>
                    <th><center>Opciones</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($departamentos->result() as $departamento) {?>


                  <tr>
                    <td><center><?php echo $departamento->iddepartamento ?></center></td>
                    <td><center><?php echo $departamento->nombre ?></center></td>
                    <td><center><?php echo $departamento->descripcion ?></center></td>
                    <td><center><?php echo $departamento->subdireccion ?></center></td>

                    <td><center>
                      <div class="row">
                        <!-- updatear -->
                      <?php echo anchor('index.php/departamentos/departamentoEdit?id='.$departamento->iddepartamento, '<button type="button" class="btn btn-info" aria-label="Left Align">
                        <i class="fa fa-pencil" aria-hidden="true"></i></button> ', 'id="$departamento->iddepartamento"'); ?>

                        <!-- eliminar -->
                    <?php echo anchor('index.php/departamentos/departamentoDashboard/eliminarDepartamento?id='.$departamento->iddepartamento, '<button type="button" class="btn btn-danger" aria-label="Left Align">
                      <i class="fa fa-trash-o" aria-hidden="true"></i></button> ', 'id="$departamento->iddepartamento"'); ?>
                    </div>
                  </center></td>
                  </tr>
                  <?php } ?>
                </tbody>
                </table>
              </div>

            </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  $('#department-table').DataTable({

"language": {

      "url": "<?php echo base_url().'assets/js/Spanish.json'; ?>"

  },

"paging": true,

"lengthChange": true,

"searching": true,

"ordering": true,

"info": true,

"autoWidth": false

});
});
</script>
