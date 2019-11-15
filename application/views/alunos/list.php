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
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                        <th>ID</th>
                        <th>Tag</th>
                        <th>Nome completo</th>
                        <th>E-mail</th>
                        <th>Matricula</th>
                        <th>Data de Matrícula</th>
                        <th>Ações</th>
                        </tr>
                        <?php
                            foreach ($alunos_model as $aluno) {
                                echo "<tr>
                                        <td>". $aluno->idAluno ."</td>
                                        <td>". $aluno->tag ."</td>
                                        <td>". $aluno->nomeAluno ." ". $aluno->sobrenomeAluno ."</td>
                                        <td>". $aluno->login ."</td>
                                        <td><span class='label label-success'>". $aluno->matricula ."</span></td>
                                        <td>". formataDataBr($aluno->dataMatricula) ."</td>  
                                        <td>";
                                echo anchor('alunos/edit/'. $aluno->idAluno .' ', 
                                            '<i class="fa fa-pencil"></i>', 
                                            array('title' => 'Editar', 'class' => 'btn btn-xs btn-info'));
                                echo " ";
                                echo anchor('alunos/del/'. $aluno->idAluno .' ', 
                                            '<i class="fa fa-trash"></i>', 
                                            array('title' => 'Apagar', 'class' => 'btn btn-xs btn-danger'));
                                echo    "</td>
                                        </tr>";
                            }
                        ?>
                    </table>
                </div>
                <div class="box-body table-responsive no-padding text-right">
                    <?php
                        echo anchor('alunos/add', 
                                    'Add aluno', 
                                    array('title' => 'Add aluno', 'class' => 'btn btn-success'));
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