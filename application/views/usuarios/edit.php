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
                        echo validation_errors('<div class = "alert alert-warning alert-dismissible">                            
                            ','<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
                            </button></div>');
                    ?>
                </div>

                <div class="box-body table-responsive no-padding">

                    <?php
                        echo form_open('usuarios/edit');

                            $atributos = array(
                                            'type' => 'hidden',
                                            'name' => 'idUsuario',
                                            'id' => 'id',
                                            'value' => $query->idUsuario,
                                            'class' => 'form-control'
                            );    
                            echo form_label('id', 'id');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'nomeUsuario',
                                            'id' => 'idNomeUsuario',
                                            'value' => $query->nomeUsuario,
                                            'class' => 'form-control'
                            );    
                            echo form_label('Nome', 'idNomeUsuario');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'sobrenomeUsuario',
                                            'id' => 'idSobrenomeUsuario',
                                            'value' => $query->sobrenomeUsuario,
                                            'class' => 'form-control'
                            );    
                            echo form_label('Sobrenome', 'idSobrenomeUsuario');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'emailUsuario',
                                            'id' => 'idEmailUsuario',
                                            'value' => $query->login,
                                            'class' => 'form-control'
                            );    
                            echo form_label('E-mail', 'idEmail');
                            echo form_input($atributos);

                            $atributos = array(
                                            'type' => 'text',
                                            'name' => 'cpf',
                                            'id' => 'idCpf',
                                            'value' => $query->cpf,
                                            'class' => 'form-control'
                            );    
                            echo form_label('CPF', 'idCpf');
                            echo form_input($atributos);

                            echo form_submit('submit', 'Alterar', array('class'=>'btn btn-primary btn-xs m-topo'));

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