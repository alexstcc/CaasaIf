<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">   
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
                        <th>Nome do curso</th>
                        <th>Turno</th>
                        <th>Nível</th>
                        <th>Data de Cadastro</th>
                        <th>Ação</th>
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

                                foreach ($cursos as $curso) {
                                    echo "<tr>
                                            <td>". $curso->idCurso ."</td>
                                            <td>". $curso->nomeCurso ."</td>
                                            <td>". $curso->turno ."</td>
                                            <td><span class='label label-success'>". $curso->nivel ."</span></td>
                                            <td>". formataDataBr($curso->dataCriacao) ."</td>
                                            <td>". anchor('site/info/'. $curso->idCurso, 'info', array('title'=>'Mais Informações', 'class' => 'btn btn-block btn-info btn-xs') ) ."</td> 
                                          </tr>";
                                }
                        ?>
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