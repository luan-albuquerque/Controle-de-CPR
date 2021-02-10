<div STYLE="padding: 20px">

<h3> Lista de Fornecedores</h3>
<!--ADICIONANDO A TABELA-->
<?php $TableForn = new App\Controllers\controllerFornecedor();
$TableForn->loadListar(); ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Cadastrar
    Fornecedor
</button>
<!-- AO ACIONAR O BOTAO,IRAR REALIZAR A OPARAÇÃO ABAIXO-->

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="padding: 15px 15px;">

            <form action="<?php echo DIRPAGE ?>Fornecedor/loadCadastrar" method="post">

                <div class="form-row ">
                    <div class="col-md-5 mb-3">
                        <h6>Razão Social *</h6>
                        <input type="text" class="form-control " name="id_razao_social" id="id_razao_social" required>

                    </div>

                    <div class="col-md-3 mb-2">
                        <h6>CNPJ *</h6>
                        <input type="text" class="form-control" name="id_cnpj" id="id_cnpj" required>

                    </div>

                    <div class="col-md-4 mb-3">
                        <h6>Nome Fantasia (Opcional)</h6>
                        <input type="text" class="form-control " name="id_nome_fantasia" id="id_nome_fantasia">

                    </div>

                </div><!--FIM DO PRIMEIRO FORM-ROW-->

                <div class="form-row">

                    <div class="col-md-6 mb-3">
                        <h6>E-mail *</h6>
                        <input type="text" class="form-control " name="id_email" id="id_email" required>
                    </div>


                    <div class="col-md-4 mb-3">
                        <h6>Contato (Opcional)</h6>
                        <input type="text" class="form-control " name="id_contato" id="id_contato">

                    </div>

                </div><!--FIM DO SEGUNDO FORM-ROW-->
                <hr>
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <h6>Codigo Globus</h6>
                        <input type="text" class="form-control " name="id_cgl" id="id_cgl">

                    </div>

                    <div class="col-md-3 mb-3">
                        <h6>Serviço</h6>
                        <select class="custom-select " name="id_serv" id="id_serv">
                            <option selected disabled value="">Escolha</option>
                           <?php $SERV = new App\Controllers\ControllerServico();
                           $SELECT_SERV = $SERV->loadSelectServico();
                           foreach ($SELECT_SERV as $OPTIONS_BD){ ?>

                            <option value="<?php echo $OPTIONS_BD['COD']?>"><?php echo $OPTIONS_BD['DESC']?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div><!--FIM DO SEGUUNDO FORM-ROW-->

                <hr>

                <div class="form-group">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" required>
                        <h6 class="form-check-label" for="invalidCheck3">
                            Confirmo que as informações prestadas são verdadeiras
                        </h6>
                    </div>
                </div><!--FIM  DO FORM-GROUP-->
                <button class="btn btn-primary" type="submit">Cadastrar</button>
            </form>


        </div>
    </div><!--DIV DO MODEL BOOTSTRAP-->
</div>
</div>