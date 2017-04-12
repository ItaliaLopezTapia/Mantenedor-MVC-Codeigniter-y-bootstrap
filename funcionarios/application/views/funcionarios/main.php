

  <div class="panel panel-default" style="margin:0 20px;">
    <div class="panel-heading"><div class="row">
        <div class="col-lg-10">
    <h1 class="page-header" style="color:black;">Gestionar Funcionarios</h1>
    </div>
    <div class="col-lg-2">
    <a href="<?php echo base_url('index.php/funcionarios/funcionariosAdd'); ?>">  <button type="button"  class="btn  btn-lg" style="top:-50%;transform:translate(0,50%);width:100px;height:100px;border-radius:50%;background-color:rgb(9, 148, 208);color:white">
        <i class="fa fa-user-plus fa-lg" aria-hidden="true"></i></button></a>


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
                  <div class="huge">26</div>
                  <div>Total Funcionarios</div>
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
                  <div class="huge">14</div>
                  <div>Funcionarios activos</div>
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
                    <div>Funcionarios inactivos</div>
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
              <table class="table" id="table-funcionarios">
                <thead>
                  <tr>
                    <th><center>Id</center></th>
                    <th><center>Imagen</center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Apellidos</center></th>
                    <th><center>Rut</center></th>
                    <th><center>Email</center></th>
                    <th><center>Anexo</center></th>
                    <th><center>Nombre Jefe</center></th>
                    <th><center>Unidad</center></th>
                    <th><center>Cargo</center></th>
                    <th><center>Departamento</center></th>
                    <th><center>Opciones</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($funcionarios->result() as $funcionario ) {?>


                  <tr>
                    <td><center><?php echo $funcionario->idfuncionario ?></center> </td>
                    <td><center><?php if(strlen($funcionario->imagen)>1) { ?> <img src="<?php echo base_url().'/uploads/'.$funcionario->imagen; ?>" class="img-responsive"style="width:75px;heigth:75px;"></img> <?php }else{ ?> <img src="<?php echo base_url().'uploads/default.jpg'; ?>" class="img-responsive" style="width:75px;heigth:75px;"></img> <?php } ?></center></td>
                    <td><center><?php echo $funcionario->nombre ?>  </center></td>
                    <td><center><?php echo $funcionario->apellidoP ?>  <center><?php echo $funcionario->apellidoM ?></center></td>
                    <td><center><?php echo $funcionario->rut ?> </center></td>
                    <td><center><?php echo $funcionario->email ?></center></td>
                    <td><center><?php echo $funcionario->anexo ?></center></td>
                    <td><center><?php echo $funcionario->nombre_jefe ?>   <?php echo $funcionario->apellido_jefe ?></center></td>
                    <td><center><?php echo $funcionario->unidad_nombre?></center></td>
                    <td><center><?php echo $funcionario->cargo_nombre?></center></td>
                    <td><center><?php echo $funcionario->departamento_nombre?></center></td>

                    <td>
                      <center><div class="row">
                        <!-- updatear -->
                        <?php echo anchor('index.php/funcionarios/funcionariosEdit?id='.$funcionario->idfuncionario, '<button type="button" class="btn btn-info" aria-label="Left Align">
                        <i class="fa fa-pencil" aria-hidden="true"></i></button> ', 'id="$funcionario->idfuncionario"'); ?>

                        <!-- eliminar -->
                    <?php echo anchor('index.php/funcionarios/funcionariosDashboard/eliminarFuncionario?id='.$funcionario->idfuncionario, '<button type="button" class="btn btn-danger" aria-label="Left Align">
                      <i class="fa fa-trash-o" aria-hidden="true"></i></button> ', 'id="$funcionario->idfuncionario"'); ?>

                      <!-- Detallar -->
                      <!-- <?php echo anchor('index.php/funcionarios/funcionariosDetail?id='.$funcionario->idfuncionario, '<button type="button" class="btn btn-info" aria-label="Left Align">
                      <i class="fa fa-info" aria-hidden="true"></i></button> ', 'id="$funcionario->idfuncionario"'); ?> -->

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


<script type="text/javascript">
$(document).ready(function(){


            $('#table-funcionarios').DataTable({

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
