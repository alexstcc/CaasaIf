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
                                    <th>Aula</th>
                                    <th>Horário de entrada</th>
                                    <th>Horario de saida</th>
                                    <th>Data da aula</th>
                                    <th>Ações</th>
                                </tr>
                                <?php
                                    foreach ($presencas_model as $presenca) {
                                        echo "<tr>
                                                <td>". $presenca->idFrequencia ."</td>
                                                <td>". $presenca->idAula ." ". $presenca->idAluno ."</td>
                                                <td><span class='label label-success'>". $presenca->horaAcessoAula ."</span></td>
                                                <td><span class='label label-success'>". $presenca->horaSaidaAula ."</span></td>
                                                <td>". formataDataBr($presenca->dataAula) ."</td>  
                                                <td>";
                                        echo anchor('presencas/edit/'. $presenca->idFrequencia .' ', 
                                                    '<i class="fa fa-pencil"></i>', 
                                                    array('title' => 'Editar', 'class' => 'btn btn-xs btn-info'));
                                        echo " ";
                                        echo anchor('usuarios/delete/'. $presenca->idFrequencia .' ', 
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
                                echo anchor('presencas/add', 
                                            'Add presença', 
                                            array('title' => 'Add presença', 'class' => 'btn btn-success'));
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