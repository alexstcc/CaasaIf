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
                                    <th>E-mail</th>
                                    <th>CPF</th>
                                    <th>Ações</th>
                                </tr>
                                <?php
                                    foreach ($usuarios_model as $usuario) {
                                        echo "<tr>
                                                <td>". $usuario->idUsuario ."</td>
                                                <td>". $usuario->nomeUsuario ." ". $usuario->sobrenomeUsuario ."</td>
                                                <td><span class='label label-success'>". $usuario->login ."</span></td>
                                                <td>". ($usuario->cpf) ."</td>  
                                                <td>";
                                        echo anchor('usuarios/edit/'. $usuario->idUsuario .' ', 
                                                    '<i class="fa fa-pencil"></i>', 
                                                    array('title' => 'Editar', 'class' => 'btn btn-xs btn-info'));
                                        echo " ";
                                        echo anchor('usuarios/del/'. $usuario->idUsuario .' ', 
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
                                echo anchor('usuarios/add', 
                                            'Add usuário', 
                                      array('title' => 'Add usuário', 'class' => 'btn btn-success'));
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