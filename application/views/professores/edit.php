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
                        echo validation_errors('<div class = "alert alert-warning alert-dismissible">                            
                            ','<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
                            </button></div>');
                    ?>

                </div>

                <div class="box-body table-responsive no-padding">

                    <?php

                        echo form_open('professores/edit');

                            $atributos = array(
                                            'type' => 'hidden',
                                            'name' => 'idProfessor',
                                            'id' => 'id',
                                            'value' => $query->idProfessor,
                                            'class' => 'form-control'
                            );    
                            echo form_label('', 'id');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'idTag',
                                            'id' => 'tag',
                                            'value' => $query->tag,
                                            'class' => 'form-control'
                            );    
                            echo form_label('Tag', 'idTag');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'nomeProfessor',
                                            'id' => 'idNomeAluno',
                                            'value' => $query->nomeProfessor,
                                            'class' => 'form-control'
                            );    
                            echo form_label('Nome', 'idNomeProfessor');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'sobrenomeProfessor',
                                            'id' => 'idSobrenomeProfessor',
                                            'value' => $query->sobrenomeProfessor,
                                            'class' => 'form-control'
                            );    
                            echo form_label('Sobrenome', 'idSobrenomeProfessor');
                            echo form_input($atributos);

                            /*$atributos = array(
                                            'type' => 'date',
                                            'name' => 'dataMatricula',
                                            'id' => 'idDataMatricula',
                                            'value' => $query->dataMatricula,
                                            'class' => 'form-control'
                            );    
                            echo form_label('Data de matrícula', 'idDataMatricula');
                            echo form_input($atributos);*/

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'emailProfessor',
                                            'id' => 'idEmailProfessor',
                                            'value' => $query->login,
                                            'class' => 'form-control'
                            );    
                            echo form_label('E-mail', 'idEmail');
                            echo form_input($atributos);

                            echo form_submit('submit', 'Alterar', array('class'=>'btn btn-primary btn-xs m-topo'));

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