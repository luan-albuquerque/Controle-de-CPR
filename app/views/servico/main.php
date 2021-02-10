<div class="main-1"><!--MAIN 1-->
    <div class="main-status"><!--MAIN STATUS DE QTD DE REGISTROS,FORNECEDORES E SERVIÇOS-->
        <div class="valores-graph">
            <canvas id="mini_myChart" width="350" height="350"></canvas>
        </div>
    </div><!--MAIN STATUS-->
</div> <!-- FIM DE MAIN-1-->

<div class="main-2">

<h3> Lista de Serviços</h3>
<!--ADICIONANDO A TABELA-->
<?php
$TableServ = new App\Controllers\ControllerServico();
$TableServ->loadListar();
?>

<hr>
<button type="button" class="btn btn-primary"  data-toggle="modal" data-target=".bd-example-modal-xl">Novo Serviço
</button>
<!-- AO ACIONAR O BOTAO,IRAR REALIZAR A OPARAÇÃO ABAIXO-->

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content" style="padding: 15px 15px;">

            <form action="<?php echo DIRPAGE ?>Servicos/loadCadastrar" method="post">

                <div class="form-row ">
                    <div class="col-md-8 mb-3">
                        <h6>Descrição *</h6>
                        <input type="text" class="form-control " name="desc" id="id_desc" required>

                    </div>

                    <div class="col-md-4 mb-2">
                        <h6>Codigo do Globus *</h6>
                        <input type="text" class="form-control" name="cgl" id="id_cgl" required>

                    </div>

                </div><!--FIM DO FORM ROW-->


                <div class="form-group">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" required>
                        <h6 class="form-check-label" for="invalidCheck3">
                            Confirmo que as informações prestadas são verdadeiras
                        </h6>
                    </div>
                </div><!--FIM DO FORM GROUP-->

                <button class="redirect btn btn-primary" type="submit">Cadastrar</button>


            </form>


        </div>
    </div><!--DIV DO MODEL BOOTSTRAP-->
</div>
</div>
