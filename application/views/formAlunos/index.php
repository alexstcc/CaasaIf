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

                        echo form_open('site/formAlunos');

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'tag',
                                            'id' => 'idTag',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Tag', 'idTag');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'nomeAluno',
                                            'id' => 'idNomeAluno',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Nome', 'idNomeAluno');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'sobrenomeAluno',
                                            'id' => 'idSobrenomeAluno',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Sobrenome', 'idSobrenomeAluno');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'matricula',
                                            'id' => 'idMatricula',
                                            'value' => 'Matricula',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Matrícula', 'idMatricula');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'date',
                                            'name' => 'dataMatricula',
                                            'id' => 'idDataMatricula',
                                            'value' => 'Matrícula',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Data da matrícula', 'idDataMatricula');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'emailAluno',
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