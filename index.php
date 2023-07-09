<?php
require('./api/WebService/uf.php')
    ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/animate.js" type="text/javascript"></script>

    <title>Malex</title>
</head>

<body>
    <?php
    require_once('./pages/1-header.php');
    require_once('./pages/2-sobre.php');
    require_once('./pages/3-servicos.php');
    ?>

    <section class="container"> <!-- Onde Localizar -->
        <article class="m-5">
            <h1 class="text-center">Onde nos encontrar!</h1>

            <label for="estado">Selecione um estado:</label>
            <select name="estado" id="estado">
                <?php foreach ($estados as $sigla => $estado) { ?>
                    <option value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
                <?php } ?>
            </select>

            <div id="detalhes" class="mx-auto"></div> <!-- Local para exibir os detalhes do estado selecionado -->
    </section>

    <?php
        require_once('./pages/4-rodape.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>