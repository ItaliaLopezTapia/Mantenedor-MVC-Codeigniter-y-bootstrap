
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading"><div class="row">
        <div class="col-lg-10">
    <h1 class="page-header" style="color:black;">Gestionar Cargo</h1>
    </div>
    <div class="col-lg-2">
<a href="<?php echo base_url('cargos/cargoAdd'); ?>"><button type="button"  class="btn  btn-lg" style="top:-50%;transform:translate(0,50%);width:100px;height:100px;border-radius:50%;background-color:rgb(9, 148, 208);color:white">
  <i class="fa fa-plus fa-lg" aria-hidden="true"></i></button></a>

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
                  <div>Total Cargos</div>
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
              <table class="table" id="role-table">
                <thead>
                  <tr>
                    <th><center>Id</center></th>
                    <th><center>Nombre cargo</center></th>
                    <th><center>Descripción</center></th>
                    <th><center>opciones</center></th>
                  </tr>
                  <tbody>
                    <?php foreach ($cargos->result() as $cargo) {?>


                    <tr>
                      <td><center><?php echo $cargo->idcargo ?></center></td>
                      <td><center><?php echo $cargo->nombre ?></center></td>
                      <td><center><?php echo $cargo->descripcion ?></center></td>

                      <td>
                        <div class="row"><center>

                          <!-- updatear -->
                        <?php echo anchor('index.php/cargos/cargoEdit?id='.$cargo->idcargo, '<button type="button" class="btn btn-info" aria-label="Left Align">
                          <i class="fa fa-pencil" aria-hidden="true"></i></button> ', 'id="$cargo->idcargo"'); ?>

                          <!-- eliminar -->
                      <?php echo anchor('index.php/cargos/cargosDashboard/eliminarCargo?id='.$cargo->idcargo, '<button type="button" class="btn btn-danger" aria-label="Left Align">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></button> ', 'id="$cargo->idcargo"'); ?>
                      </center></div>
                    </td>
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


              $('#role-table').DataTable({

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
