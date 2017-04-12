
<style media="screen">
body {
background: #eee !important;
}

.wrapper {
margin-top: 80px;
margin-bottom: 80px;
}

.form-signin {
max-width: 380px;
padding: 15px 35px 45px;
margin: 0 auto;
background-color: #fff;
border: 1px solid rgba(0, 0, 0, 0.1);
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
margin-bottom: 30px;
}
.form-signin .checkbox {
font-weight: normal;
}
.form-signin .form-control {
position: relative;
font-size: 16px;
height: auto;
padding: 10px;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}
.form-signin .form-control:focus {
z-index: 2;
}
.form-signin input[type="text"] {
margin-bottom: -1px;
border-bottom-left-radius: 0;
border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
margin-bottom: 20px;
border-top-left-radius: 0;
border-top-right-radius: 0;
}
.boton-primary {
    color: #fff;
    background-color: #0f69b4;
    border-color: #0f69b4;
}
</style>

<?= form_open("/index.php/login/validateUser") ?>

<?php
  $email = array(
      'name'  => 'correo',
      'type'    => 'email',
      'placeholder' => 'Correo',
      'class' => 'form-control'
  );

  $pass = array(
      'name'  => 'password',
      'type'    => 'password',
      'placeholder' => 'Password',
      'class' => 'form-control'
  );
  $submit = array(
  'name' => 'submit',
  'id' => 'submit',
  'value' => 'Entrar',
  'title' => 'Entrar',
  'class' => 'btn boton-primary'
);
?>
<div class="wrapper">
  <div class="form-signin">
    <h2 class="form-signin-heading"><center>Inicio de Sesión</center></h2>

    <?= form_input($email) ?>
    <br>
    <?= form_input($pass) ?>
    <label class="checkbox">
      <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Recordar
    </label>
    <?= form_submit($submit);?>
  </div>
</div>

<?= form_close() ?>
