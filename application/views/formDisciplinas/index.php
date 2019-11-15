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

                        echo form_open('site/envio');

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'nomeDisciplina',
                                            'id' => 'idDisplina',
                                            'value' => 'Disciplina',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Nome', 'idDisplina');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'semestreCurso',
                                            'id' => 'idSemestreCurso',
                                            'value' => 'Semestre',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Semestre', 'idSemestreCurso');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'nomeCurso',
                                            'id' => 'idCurso',
                                            'value' => 'Curso',
                                            'class' => 'form-control'
                            );    
                            echo form_label('Curso', 'idCurso');
                            echo form_input($atributos);

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