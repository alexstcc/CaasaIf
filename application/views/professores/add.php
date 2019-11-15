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
                        echo  validation_errors('<div class = "alert alert-warning alert-dismissible">                            
                            ','<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
                            </button></div>');
                    ?>

                </div>

                <div class="box-body table-responsive no-padding">

                    <?php

                        echo form_open('professores/add');

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
                                            'name' => 'nomeProfessor',
                                            'id' => 'idNomeProfessor',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Nome', 'idNomeProfessor');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'sobrenomeProfessor',
                                            'id' => 'idSobrenomeProfessor',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Sobrenome', 'idSobrenomeProfessor');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'emailProfessor',
                                            'id' => 'idEmailProfessor',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('E-mail', 'idEmailProfessor');
                            echo form_input($atributos);

                            /*$atributos = array(
                                'type' => 'text',
                                'name' => 'cpf',
                                'id' => 'idCpf',
                                'value' => '',
                                'class' => 'form-control'
                            );    
                            echo form_label('CPF', 'idCpf');
                            echo form_input($atributos);*/

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
                                            'type' => 'text',
                                            'name' => 'siape',
                                            'id' => 'idSiape',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Siape', 'idSiape');
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