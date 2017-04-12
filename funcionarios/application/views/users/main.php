
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading"><div class="row">
        <div class="col-lg-10" >
    <h1 class="page-header" style="color:black;">Gestionar Usuarios</h1>
    <h5 class="" style="color:#707070;">Administradores</h5>
    </div>
    <div class="col-lg-2">
    <a href="<?php echo base_url('users/usersAdd'); ?>">  <button type="button" class="btn  btn-lg" style="top:-50%;transform:translate(0,50%);width:100px;height:100px;border-radius:50%;background-color:rgb(9, 148, 208);color:white">
        <i class="fa fa-user-plus fa-lg" aria-hidden="true"></i></button></a>

  </button>
  </div>

  </div></div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <div class="huge">3</div>
                  <div>Total usuarios</div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="panel panel-red">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-tasks fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <div class="huge">12</div>
                  <div>usuarios conectados</div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="col-lg-4 col-md-4">
            <div class="panel panel-blue">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">12</div>
                    <div>usuarios deshabilitados</div>
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
              <table class="table " id="user-table">
                <thead>
                  <tr>
                    <th><center>Id</center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Apellido</center></th>
                    <th><center>Rut</center></th>
                    <th><center>Correo</center></th>
                    <th><center>opciones</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($usuarios->result() as $usuario) {?>


                  <tr>
                    <td><center><?php echo $usuario->idusuario ?></center></td>
                    <td><center><?php echo $usuario->nombre ?></center></td>
                    <td><center><?php echo $usuario->apellido ?></center></td>
                    <td><center><?php echo $usuario->rut ?></center></td>
                    <td><center><?php echo $usuario->correo ?></center></td>

                    <td><center>
                      <div class="row">
                      <!-- updatear -->
                      <?php echo anchor('index.php/users/UsersEdit?id='.$usuario->idusuario, '<button type="button" class="btn btn-info" aria-label="Left Align">
                        <i class="fa fa-pencil" aria-hidden="true"></i></button> ', 'id="$usuario->idusuario"'); ?>

                        <!-- eliminar -->
                    <?php echo anchor('index.php/users/usersDashboard/eliminarUsuario?id='.$usuario->idusuario, '<button type="button" class="btn btn-danger" aria-label="Left Align">
                      <i class="fa fa-trash-o" aria-hidden="true"></i></button> ', 'id="$usuario->idusuario"'); ?>
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
  $('#user-table').DataTable({

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
