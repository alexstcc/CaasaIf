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

                        echo form_open('disciplinas/add');

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'nomeDisciplina',
                                            'id' => 'idNomeDisciplina',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Nome da Disciplina', 'idNomeDisciplina');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'semestreCurso',
                                            'id' => 'idSemestreCurso',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Periodo', 'idSemestreCurso');
                            echo form_input($atributos);

                            $atributos = array(
                                'type' => 'text',
                                'name' => 'idCursoNome',
                                'id' => 'idCurso',
                                'value' => '',
                                'class' => 'form-control'
                            );    
                            echo form_label('Curso', 'idCurso');
                            echo form_input($atributos);

                            $atributos = array(
                                'type' => 'date',
                                'name' => 'dataInicioPeriodo',
                                'id' => 'idDataInicioPeriodo',
                                'value' => '',
                                'class' => 'form-control'
                            );    
                            echo form_label('Data de início do período', 'idDataInicioPeriodo');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'date',
                                            'name' => 'dataFimPeriodo',
                                            'id' => 'idDataFimPeriodo',
                                            'value' => '',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Data de fim do período', 'idDataFimPeriodo');
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