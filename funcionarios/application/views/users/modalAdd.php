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

<div class = "panel panel-primary col-md-offset-4" style="width:600px;margin-top:50px;">
   <div class = "panel-heading" >
      <h3 class = "panel-title">Agregar Nuevo Usuario </h3>
   </div>
      <div class = "panel-body" style="height:auto;weigth:auto;">
        <?php echo validation_errors(); ?>
        <?php $attribute= array('name' => 'form_registro', 'novalidate'=>'', 'id' => 'form_registro'); ?>
        <?php echo form_open('users/usersAdd/recibirDatos',$attribute);?>
        <?php
        $name = array(
            'name'  => 'name',
            'type'    => 'text',
            'placeholder' => 'Nombre',
            'class' => 'form-control',
            'value' => set_value('name')
        );

        $lastname = array(
            'name'  => 'lastname',
            'type'    => 'text',
            'placeholder' => 'Apellido',
            'class' => 'form-control',
            'value' => set_value('lastname')
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
            'type'    => 'Email',
            'placeholder' => 'Correo',
            'class' => 'form-control',
            'value' => set_value('email')
        );
        $pass = array(
            'name'  => 'pass',
            'type'    => 'password',
            'placeholder' => 'Password',
            'class' => 'form-control',
            'value' => set_value('pass')
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
        <?php echo form_label('Apellido: ')?><br>
        <?php echo form_input($lastname)?><br>
        <?php echo form_label('RUN: ')?><br>        
        <?php echo form_input($rut)?><br>
        <?php echo form_label('Correo: ')?><br>
        <?php echo form_input($email)?><br>
        <?php echo form_label('Password: ')?><br>
        <?php echo form_input($pass)?><br>


</div>
      <div class="panel-footer">
        <a href="<?php echo base_url()?>users/usersDashboard"> <button type="button" class="btn btn-default pull-right">Volver</button></a>
        <?php echo form_submit($submit);  ?>
      </div>
        <? form_close()?>
    </div>
