<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $titulo ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('dist/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('dist/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('dist/AdminLTE/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('dist/AdminLTE/dist/css/AdminLTE.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('dist/AdminLTE/plugins/iCheck/square/blue.css') ?>">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b><?php echo $tituloLogin ?></a>
  </div>
  <!-- /.login-logo -->

  <div class="box-body table-responsive no-padding">
      <?php
        validation_errors('<div class = "alert alert-warning alert-dismissible">',
        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
        </button></div>');
      ?>
  </div>
  
  <div class="login-box-body">
    
  <?php $this->session->flashdata('erro_login'); ?>
    
    <p class="login-box-msg">Entre para iniciar sua sessão * puta merda</p>
    <?php
      echo form_open('login/enviar');
      
          //input e-mail
          echo '<div class="form-group has-feedback">';
            $atributos = array('type'=>'text', 
                                'class'=>'form-control', 
                                'name'=>'email', 
                                'placeholder'=>'E-mail',
                                'id'=>'idEmail',
                                'autocomplete'=>'on');
            echo form_input($atributos);
          echo '</div>';
          
          //input senha
          echo '<div class="form-group has-feedback">';
            $atributos = array('type'=>'password', 
                                'class'=>'form-control', 
                                'name'=>'senha', 
                                'placeholder'=>'Senha',
                                'id'=>'idSenha',
                                'autocomplete'=>'on');
            echo form_input($atributos);
          echo '</div>';

          echo form_submit('submit', 'Logar', array('class'=>'btn btn-primary btn-block btn-flat'));

          //echo <pre>
            //echo ($atributos);

      echo form_close();
    ?>


    <!-- /.social-auth-links -->

    <a href="#">Esqueci a minha senha</a><br>
    <a href="register.html" class="text-center">Registre uma nova associação</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('dist/AdminLTE/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('dist/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('dist/AdminLTE/plugins/iCheck/icheck.min.js') ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
