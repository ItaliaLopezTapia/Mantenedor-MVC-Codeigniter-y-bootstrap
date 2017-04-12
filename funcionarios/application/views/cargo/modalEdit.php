
<style media="screen">
.boton-primary {
    color: #fff;
    background-color: #0f69b4;
    border-color: #0f69b4;
}
</style>

<div class = "panel panel-primary col-md-offset-4" style="width:600px;margin-top:50px;">
   <div class = "panel-heading" >
      <h3 class = "panel-title">Editar Cargo </h3>
   </div>
      <div class = "panel-body" style="height:auto;weigth:auto;">
        <?php echo validation_errors(); ?>
        <?php echo form_open('cargos/cargoEdit/actualizarCargo?id='.$cargo->result()[0]->idcargo);?>
        <?php
        $name = array(
            'name'  => 'name',
            'type'    => 'text',
            'placeholder' => 'Nombre',
            'class' => 'form-control',
            'value'=> $cargo->result()[0]->nombre
        );

        $description = array(
            'name'  => 'description',
            'type'    => 'textarea',
            'placeholder' => 'Descripción',
            'class' => 'form-control',
            'value'=> $cargo->result()[0]->descripcion
        );

        $submit = array(
        'name' => 'submit',
        'id' => 'submit',
        'value' => 'Editar',
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
        <?php echo form_submit($submit); ?>
      </div>
<? form_close()?>
  </div>
