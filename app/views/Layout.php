<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Luan Albuquerque"/>
    <meta name="description" content="<?php echo $this->getDescription(); ?>">
    <meta name="keywords" content="<?php echo $this->getKeyWords(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina Inicial</title>


    <link type="text/css" rel="stylesheet" href="<?PHP echo DIRCSS ?>my_layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DIRCSS?>bootstrap.min.css" >
    <script src="<?php echo DIRJS?>JQuery.js"></script>
    <script src="<?php echo DIRJS?>popper.min.js" ></script>
    <script src="<?php echo DIRJS?>bootstrap.min.js"></script>
    <script src="<?php echo DIRJS?>chart.js"></script>
    <?php echo $this->addHead(); ?>
</head>
<body>
<div class="head container-fluid">

    <nav class="nav-home">
        <a>DTIFinanceiro</a>
        <ul class="align-ul">
            <li class="align-ul-li"><a href="<?PHP echo DIRPAGE?>">Home</a></li>
            <li class="align-ul-li"><a>Registros</a></li>
            <li class="align-ul-li"><a href="<?PHP echo DIRPAGE ?>Fornecedores">Fornecedores</a></li>
            <li class="align-ul-li"><a href="<?PHP echo DIRPAGE ?>Servicos">Serviços</a></li>
    </nav>

    <?php echo $this->addHeader();?>

</div><!-- FIM DO HEAD -->

<ol class="breadCrumb container-lg">
    <?php $Bread = new Src\Classes\ClassBreadcrumb();
    $Bread->addBreadCrumb(); ?>
</ol>

<div class="main container-fluid" ><!--MAIN PRINCIPAL-->

        <?php echo $this->addMain(); ?>

</div>

<!--LEMBRE-SE QUE VOCE PODE DE CRIAR UM MAIN SECUNDARIO CASO NAO HAJA ESPAÇO
MAS, AJUSTE TUDO NO CLASSRENDER.-->

<div class="footer  container-fluid">

    <script src="<?PHP echo DIRJS ?>Grafico_P.js" type="text/javascript"></script>
    <script src="<?PHP echo DIRJS ?>Mini_G.js" type="text/javascript"></script>
    <h6> © 2020 MAP Transportes Aéreos. Todos os direitos reservados<h6>

</div>
</body>
</html>


