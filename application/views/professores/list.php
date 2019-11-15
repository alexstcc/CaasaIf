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
                        <th>Tag</th>
                        <th>Nome completo</th>
                        <th>E-mail</th>
                        <th>Siape</th>
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

                                foreach ($professores_model as $professor) {
                                    echo "<tr>
                                            <td>". $professor->idProfessor ."</td>
                                            <td>". $professor->tag ."</td>
                                            <td>". $professor->nomeProfessor ." ". $professor->sobrenomeProfessor ."</td>
                                            <td><span class='label label-success'>". $professor->login ."</td>
                                            <td>". $professor->siape ."</span></td>
                                            <td>";
                                    echo anchor('professores/edit/'. $professor->idProfessor .' ', 
                                                '<i class="fa fa-pencil"></i>', 
                                                array('title' => 'Editar', 'class' => 'btn btn-xs btn-info'));
                                    echo " ";
                                    echo anchor('professores/delete/'. $professor->idProfessor .' ', 
                                                '<i class="fa fa-trash"></i>', 
                                                array('title' => 'Editar', 'class' => 'btn btn-xs btn-danger')); 
                                    echo "</tr>";
                                }
                        ?>
                    </table>
                </div>
                
                <div class="box-body table-responsive no-padding text-right">
                    <?php
                        echo anchor('professores/add', 
                                    'Add professor', 
                                    array('title' => 'Add professor', 'class' => 'btn btn-success'));
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