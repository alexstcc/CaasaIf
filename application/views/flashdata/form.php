<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?= $this->session->flashdata('msg'); ?>
    </section>
    <section class="content-header">   
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <?php echo $titulo ?>
                        </h3>
                        <?php
                            echo form_open(current_url(), ['id' => 'form', 'name' => 'form', 'class' => '']);
                                echo form_label('Valor', 'valor');
                                echo '<br>';
                                echo form_input(['name' => 'valor', 'autocomplete' => 'off'], set_value('valor'), '');
                                echo '<br>';
                                echo '<hr />';
                                echo '<br>';
                                echo form_submit('submit', 'Enviar');
                            echo form_close();
                        ?>
                    </div>
                </div>
            <!-- /.box -->
            </div>
        </div>
    </section>
</div>