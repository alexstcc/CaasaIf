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
                                    <th>Data da Aula</th>
                                    <th>Horário</th>
                                    <th>Disciplina</th>
                                    <th>Ações</th>
                                </tr>
                                <?php
                                    foreach ($aulas_model as $aula) {
                                        echo "<tr>
                                                <td>". $aula->idAula ."</td>
                                                <td>". formataDataBr($aula->dataAula) ." </td>                                        
                                                <td><span class='label label-success'>". $aula->inicioHorarioAula . " / " . $aula->fimHorarioAula . "</span></td>
                                                <td>". $aula->nomeDisciplina." </td>  
                                                <td>";
                                        echo anchor('aulas/edit/'. $aula->idAula .' ', 
                                                    '<i class="fa fa-pencil"></i>', 
                                                    array('title' => 'Editar', 'class' => 'btn btn-xs btn-info'));
                                        echo " ";
                                        echo anchor('aulas/delete/'. $aula->idAula .' ', 
                                                    '<i class="fa fa-trash"></i>', 
                                                    array('title' => 'Deletar', 'class' => 'btn btn-xs btn-danger'));
                                        echo   "</td>
                                             </tr>";
                                    }
                                ?>
                            </table>
                        </div>
                        <div class="box-body table-responsive no-padding text-right">
                            <?php
                                echo anchor('usuarios/add', 
                                            'Add aula', 
                                      array('title' => 'Add aula', 'class' => 'btn btn-success'));
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