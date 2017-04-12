
<div class="container-fluid navbar-inverse" style="height:70px;margin-bottom:5px;">
<a class="navbar-brand text-center" style="font-size:24px;padding-left:600px" href="<?php echo base_url()?>/index.php/dashboard/main">Portal Gestión de Funcionarios</a>
<ul class="nav navbar-nav navbar-right">
  <li><a href="<?php echo base_url()?>index.php/login/logOutUser"><span class="glyphicon glyphicon-user" style="font-size:20px;"></span> Cerrar Sesión</a></li>
</ul>
</div>

</nav><div id="wrapper">
    <div class="overlay"></div>
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">



        <ul class="nav sidebar-nav">
          <!-- Logo a convenir -->
        <center>  <img src="http://socialweb.es/wp-content/uploads/2014/01/GestiousuarisGran.png" style="width:140px; height: 110px; margin-top:10px"></center>
<br><br>

            <li>
                <!-- <a href="index.php/dashboard/main"><i class="fa fa-fw fa-home"></i> Dashboard</a> -->
                <?php echo anchor('index.php/dashboard/main', '<i class="fa fa-fw fa-home"></i> Dashboard', 'class="link-class"') ?>
            </li>
            <li>
                <!-- <a href="index.php/funcionarios/main"><i class="fa fa-user-md"></i> Funcionarios</a> -->
                <?php echo anchor('index.php/funcionarios/funcionariosDashboard', '<i class="fa fa-fw fa-home"></i> Funcionarios', 'class="link-class"') ?>
            </li>
            <li>
                <!-- <a href="index.php/users/main"><i class="fa fa-user" ></i> Administradores</a> -->
                <?php echo anchor('index.php/users/usersDashboard', '<i class="fa fa-user" ></i> Usuarios</a>', 'class="link-class"') ?>
            </li>
            <li>
                <!-- <a href="index.php/cargos/main"><i class="fa fa-cog"></i> Cargos</a> -->
                <?php echo anchor('index.php/cargos/cargosDashboard', '<i class="fa fa-cog" ></i> Cargos</a>', 'class="link-class"') ?>
            </li>
            <li>
                <!-- <a href="index.php/departamentos/main"><i class="fa fa-bank"></i> Departamentos</a> -->
                <?php echo anchor('index.php/departamentos/departamentoDashboard', '<i class="fa fa-bank" ></i> Departamentos</a>', 'class="link-class"') ?>
            </li>
            <li>
                <!-- <a href="index.php/unidad/main"><i class="fa fa-medkit" ></i> Unidad</a> -->
                <?php echo anchor('index.php/unidades/unidadesDashboard', '<i class="fa fa-medkit" ></i> Unidad</a>', 'class="link-class"') ?>
            </li>
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" >
      <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
      </button>
