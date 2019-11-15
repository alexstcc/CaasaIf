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
                    <?php
                        echo anchor('site/cursos', 'Voltar', array('title' => 'Lista de cursos', 
                                                                   'class' => 'btn btn-block btn-primary btn-xs m-topo',
                                                                   )); 
                    ?>
                    <table class="table table-hover">
                        <?php
                            /*
                            stdClass Object
                            (
                                [idCurso] => 1
                                [nomeCurso] => Curso de Tecnologia em Sistemas para Internet
                                [turno] => Noite
                                [nivel] => Superior
                                [dataCriacao] => 2019-04-23
                            )
                            echo '<pre>';
                                print_r($info);
                            */
                        ?>
                        <tr>
                            <th>ID</th>
                            <th>Nome do curso</th>
                            <th>Turno</th>
                            <th>Nível</th>
                            <th>Data de Cadastro</th>
                        </tr>
                        <tr>
                            <td><?php echo $info->idCurso ?></td>
                            <td><?php echo $info->nomeCurso ?></td>
                            <td><?php echo $info->turno ?></td>
                            <td><span class='label label-success'><?php echo $info->nivel ?></span></td>
                            <td><?php echo formataDataBr($info->dataCriacao) ?></td>  
                        </tr>
                        <tr>
                            <td colspan='5'><?php echo $info->nomeDisciplina?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
</div>