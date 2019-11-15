<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mb-15">   
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <?php echo $tituloConteudo ?>
                </h3>
                <!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                        <th>ID</th>
                        <th>Nome completo</th>
                        <th>Período</th>
                        <th>Curso</th>
                        <th>Açôes</th>
                        </tr>
                        <?php
                            /*[0] => stdClass Object
                                (
                                    [idCurso] => 1
                                    [nomeCurso] => Curso de Tecnologia em Sistemas para Internet
                                    [turno] => Noite
                                    [nivel] => Superior
                                    [dataCriacao] => 2019-04-23
                                )*/

                                foreach ($disciplinas_model as $disciplina) {
                                    echo "<tr>
                                            <td>". $disciplina->idDisciplina ."</td>
                                            <td>". $disciplina->nomeDisciplina . "</td>
                                            <td><span class='label label-success'>". $disciplina->semestreCurso ."</td>
                                            <td>". $disciplina->idCurso ."</span></td>
                                            <td>";
                                    echo anchor('disiciplinas/edit/'. $disciplina->idDisciplina .' ', 
                                                '<i class="fa fa-pencil"></i>', 
                                                array('title' => 'Editar', 'class' => 'btn btn-xs btn-info'));
                                    echo " ";
                                    echo anchor('disciplinas/delete/'. $disciplina->idDisciplina .' ', 
                                                '<i class="fa fa-trash"></i>', 
                                                array('title' => 'Editar', 'class' => 'btn btn-xs btn-danger'));
                                    echo   "</td> 
                                          </tr>";
                                }
                        ?>
                    </table>
                </div>
                
                <div class="box-body table-responsive no-padding text-right">
                    <?php
                        echo anchor('disciplinas/add', 
                                    'Add disciplinas', 
                                    array('title' => 'Add disciplinas', 'class' => 'btn btn-success'));
                    ?>
                    
                </div>

                <div class="box-body table-responsive no-padding">
                    <?= $this->session->userdata('msg'); ?>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
    </section>
</div>