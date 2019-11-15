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
                                    <th>Turma</th>
                                    <th>Disciplina</th>
                                    <th>Ações</th>
                                </tr>
                                <?php
                                    foreach ($turmas_model as $turma) {
                                        echo "<tr>
                                                <td>". $turma->idTurma ."</td>
                                                <td>". $turma->ano ."/". $turma->semestre ."</td>
                                                <td><span class='label label-success'>". $turma->nomeDisciplina ."</span></td>  
                                                <td>";
                                        echo anchor('turmas/edit/'. $turma->idTurma .' ', 
                                                    '<i class="fa fa-pencil"></i>', 
                                                    array('title' => 'Editar', 'class' => 'btn btn-xs btn-info'));
                                        echo " ";
                                        echo anchor('turmas/delete/'. $turma->idTurma .' ', 
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
                                echo anchor('turmas/add', 
                                            'Add turma', 
                                            array('title' => 'Add turma', 'class' => 'btn btn-success'));
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