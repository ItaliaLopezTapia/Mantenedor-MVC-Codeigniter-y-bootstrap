
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading"><div class="row">
      <div class="col-lg-10">
        <h1 class="page-header" style="color:black;">Gestionar Unidades</h1>
      </div>
      <div class="col-lg-2">
      <a href="<?php echo base_url('unidades/unidadAdd'); ?>">  <button type="button"  class="btn  btn-lg" style="top:-50%;transform:translate(0,50%);width:100px;height:100px;border-radius:50%;background-color:rgb(9, 148, 208);color:white">
          <i class="fa fa-user-plus fa-lg" aria-hidden="true"></i></button></a>


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
                  <div>Total unidades</div>
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
              <table class="table " id="unidad-table">
                <thead>
                  <tr>
                    <th><center>Id</center></th>
                    <th><center>Nombre unidad</center></th>
                    <th><center>Descripcion</center></th>
                    <th><center>Departamento</center></th>
                    <th><center>Opciones</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($unidades->result() as $unidad) {?>


                  <tr>
                    <td><center><?php echo $unidad->idunidad ?></center></td>
                    <td><center><?php echo $unidad->nombre ?></center></td>
                    <td><center><?php echo $unidad->descripcion ?></center></td>
                    <td><center><?php echo $unidad->departamento ?></center></td>

                    <td><center>
                      <div class="row">
                        <!-- updatear -->
                      <?php echo anchor('unidades/unidadEdit?id='.$unidad->idunidad, '<button type="button" class="btn btn-info" aria-label="Left Align">
                        <i class="fa fa-pencil" aria-hidden="true"></i></button> ', 'id="$unidad->idunidad"'); ?>

                        <!-- eliminar -->
                    <?php echo anchor('unidades/unidadesDashboard/eliminarUnidad?id='.$unidad->idunidad, '<button type="button" class="btn btn-danger" aria-label="Left Align">
                      <i class="fa fa-trash-o" aria-hidden="true"></i></button> ', 'id="$unidad->idunidad"'); ?>
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
      $('#unidad-table').DataTable({

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
