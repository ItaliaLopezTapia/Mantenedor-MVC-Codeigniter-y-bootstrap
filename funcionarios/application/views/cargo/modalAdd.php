<style media="screen">
.boton-primary {
    color: #fff;
    background-color: #0f69b4;
    border-color: #0f69b4;
}
</style>

  <div class = "panel panel-primary col-md-offset-4" style="width:600px;margin-top:50px;">
     <div class = "panel-heading" >
        <h3 class = "panel-title">Agregar Nuevo Cargo</h3>
     </div>
     <div class = "panel-body" style="height:auto;">
       <?php echo validation_errors(); ?>
       <?php echo form_open('cargos/cargoAdd/recibirDatos');?>
       <?php
       $name = array(
           'name'  => 'name',
           'type'    => 'text',
           'placeholder' => 'Nombre',
           'class' => 'form-control',
           'value' => set_value('name')
       );

       $description = array(
           'name'  => 'description',
           'type'    => 'textarea',
           'placeholder' => 'Descripcion',
           'class' => 'form-control',
           'value' => set_value('description')
       );

       $submit = array(
       'name' => 'submit',
       'id' => 'submit',
       'value' => 'Agregar',
       'title' => 'Agregar',
       'class' => 'btn boton-primary'
   ); ?>
<br>

       <?php echo form_label('Nombre: ')?><br>
       <?php echo form_input($name)?><br>
       <?php echo form_label('Descripción: ')?><br>
       <?php echo form_input($description)?><br>


</div>
     <div class="panel-footer">
       <a href="<?php echo base_url()?>cargos/cargosDashboard"> <button type="button" class="btn btn-default pull-right">Volver</button></a>
       <?php echo form_submit($submit);  ?>
     </div>
 <? form_close()?>


  </div>
