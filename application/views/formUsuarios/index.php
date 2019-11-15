<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">   
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <?php echo $titulo ?>
                </h3>

                <div class="box-body table-responsive no-padding">

                    <?php
                        echo '<p>'. validation_errors() .'</p>';
                    ?>

                </div>

                <div class="box-body table-responsive no-padding">

                    <?php

                        echo form_open('site/formUsuarios');

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'nomeUsuario',
                                            'id' => 'idNomeUsuario',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Nome', 'idNomeUsuario');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'sobrenomeUsuario',
                                            'id' => 'idSobrenomeUsuario',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Sobrenome', 'idSobrenomeUsuario');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'emailUsuario',
                                            'id' => 'idEmail',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('E-mail', 'idEmail');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'password',
                                            'name' => 'senha',
                                            'id' => 'idSenha',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Senha', 'idSenha');
                            echo form_input($atributos);
                            
                            $atributos = array(
                                            'type' => 'password',
                                            'name' => 'senha2',
                                            'id' => 'idSenha2',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Confirma senha', 'idSenha2');
                            echo form_input($atributos); 

                            echo form_submit('submit', 'Cadastrar', array('class'=>'btn btn-primary btn-xs m-topo'));

                        echo form_close();

                    ?>

                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
    </section>
</div>