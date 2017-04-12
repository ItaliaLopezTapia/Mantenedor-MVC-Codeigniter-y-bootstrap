<script>

        function formato_rut(rut)

        {



          var sRut1 = rut.value;      //contador de para saber cuando insertar el . o la -

          sRut1=sRut1.split('.').join('');

          sRut1=sRut1.split(' ').join('');

          sRut1=sRut1.split(',').join('');

          sRut1=sRut1.split('-').join('');



          var nPos = 0; //Guarda el rut invertido con los puntos y el guión agregado

          var sInvertido = ""; //Guarda el resultado final del rut como debe ser

          var sRut = "";

          for(var i = sRut1.length - 1; i >= 0; i-- )

          {

            sInvertido += sRut1.charAt(i);

            if (i == sRut1.length - 1 )

              sInvertido += "-";

            else if (nPos == 3)

            {

              sInvertido += ".";

              nPos = 0;

            }
            nPos++;
          }
          for(var j = sInvertido.length - 1; j>= 0; j-- )
          {
            if (sInvertido.charAt(sInvertido.length - 1) != ".")
              sRut += sInvertido.charAt(j);
            else if (j != sInvertido.length - 1 )
              sRut += sInvertido.charAt(j);
          }
          //Pasamos al campo el valor formateado
          rut.value = sRut.toUpperCase();
        }
      </script>


<style media="screen">
.boton-primary {
    color: #fff;
    background-color: #0f69b4;
    border-color: #0f69b4;
}
</style>
<div class = "panel panel-primary " style="width:600px;margin: 0 auto;display:block">
   <div class = "panel-heading" >
      <h3 class = "panel-title">Agregar Nuevo Funcionario</h3>
   </div>
   <div class = "panel-body" style="height:auto;">
     <?php $attribute= array('name' => 'form_registro', 'novalidate'=>'', 'id' => 'form_registro'); ?>
<?php echo validation_errors(); ?>
     <?php echo form_open_multipart('funcionarios/funcionariosAdd/',$attribute);?>
     <?php
     $name = array(
         'name'  => 'name',
         'type'    => 'text',
         'placeholder' => 'Nombre',
         'class' => 'form-control',
         'value' => set_value('name')
     );

     $lastnameP = array(
         'name'  => 'lastnameP',
         'type'    => 'text',
         'placeholder' => 'Apellido Paterno',
         'class' => 'form-control',
         'value' => set_value('lastnameP')
     );
     $lastnameM = array(
         'name'  => 'lastnameM',
         'type'    => 'text',
         'placeholder' => 'Apellido Materno',
         'class' => 'form-control',
         'value' => set_value('lastnameM')

     );

     $rut = array(
         'name'  => 'rut',
         'type'    => 'text',
         'placeholder' => 'RUN',
         'class' => 'form-control',
         'onblur' => 'formato_rut(document.form_registro.rut)',
         'value' => set_value('rut')
     );
     $email = array(
         'name'  => 'email',
         'type'    => 'email',
         'placeholder' => 'Correo',
         'class' => 'form-control',
         'value' => set_value('email')
     );
     $anexo = array(
         'name'  => 'anexo',
         'type'    => 'Telephone',
         'placeholder' => 'Anexo',
         'class' => 'form-control',
         'value' => set_value('anexo')
     );
     $image = array(
         'name'  => 'image',
         'type'    => 'text',
         'placeholder' => 'Imagen',
         'class' => 'form-control',
         'value' => set_value('image')
     );
     $boss = array(
         'name'  => 'boss',
         'type'    => 'text',
         'placeholder' => 'Jefe',
         'class' => 'form-control',
         'value' => set_value('boss')
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
     <?php echo form_label('Apellido Paterno: ')?><br>
     <?php echo form_input($lastnameP)?><br>
     <?php echo form_label('Apellido Materno: ')?><br>
     <?php echo form_input($lastnameM)?><br>
     <?php echo form_label('RUN: ')?><br>
     <?php echo form_input($rut)?><br>
     <?php echo form_label('Correo: ')?><br>
     <?php echo form_input($email)?><br>
     <?php echo form_label('Teléfono: ')?><br>
     <?php echo form_input($anexo)?><br>
     <?php echo form_label('Imagen: ')?><br>
     <div class="form-control">
     <input type="file" name="userfile" size="20"/>
     </div><br>
     <?php echo form_label('Jefe Responsable: ')?><br>
     <?php echo form_dropdown('selJefe', $arrJefe,'','class="form-control"');?><br>
     <?php echo form_label('Cargo que Desempeña: ')?><br>
     <?php echo form_dropdown('selCargo', $arrCargos,'','class="form-control"');?><br>
     <?php echo form_label('Unidad a la que Pertenece: ')?><br>
     <?php echo form_dropdown('selUnidades', $arrUnidades,'','class="form-control"');?><br>


   </div>
   <div class="panel-footer" >
    <a href="<?php echo base_url()?>index.php/funcionarios/funcionariosDashboard"> <button type="button" class="btn btn-default pull-right">Volver</button></a>
    <?php echo form_submit($submit);  ?>
   </div>
   <? form_close()?>
</div>
