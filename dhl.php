<?php
require_once('./api/WebService/site.php');
$rastreio = new Site();

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

    <title>Malex</title>
</head>

<body>

    <?php
    require_once('./pages/1-header.php');
    require_once('./pages/2-sobre.php');
    $response = isset($_POST['codigo']) ? $rastreio::consultarRastreio($_POST['codigo']) : null;
    ?>

    <section class="" style="background: #212121;">
        <div class="container d-flex justify-content-center flex-column">
            <div>
                <form method="post" class="row justify-content-center mt-3">
                    <div class="col-auto">
                        <input type="text" placeholder="Código" name="codigo" class="form-control">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary" onclick="consultar()">Consultar</button>
                    </div>
                </form>
            </div>
            <?php if (isset($_POST['codigo'])): ?>
            <div class="mt-2 mb-2">
                <div class="shipments w-100">
                    <?php foreach ((array) $response['shipments'] as $shipment): ?>

                    <div class="card">
                        <div class="card-body">
                            <h2>Código:
                                <?php echo $shipment['id'] ?>
                            </h2>
                            <h5> Tipo de Serviço:
                                <?php echo $shipment['service'] ?>
                            </h5>
                            <h5> Origem:
                                <?php echo $shipment['origin']['address']['addressLocality'] ?> & Destino:
                                <?php echo $shipment['destination']['address']['addressLocality'] ?>
                            </h5>
                        </div>
                        <div class="card-footer mt-2 mb-2">
                            <div id="status">
                                <p>
                                    <?php if (!isset($shipment['status']['statusCode'])) {
                                    echo $shipment['status']['description'] ?? $shipment['status']['statusCode'] ?? null;
                                    } ?>
                                </p>
                            </div>

                            <p>
                                <?php echo date('d/m/Y à\s H:i:s', strtotime($shipment['status']['timestamp'])) ?>

                            </p>


                        </div>
                    </div>

                    <?php endforeach //fim do foreach ?>

                    <?php foreach ((array) $shipment['events'] as $evento):
                    $cidade = isset($evento['location']['address']['adressLocality']);

                    $dados = [
                        $cidade,
                        $evento['description']
                    ];
                    ?>
                    <div class="card mt-2">
                        <div class="card-body">
                            <p>
                                <?php echo implode(' - ', array_filter($dados)) ?>
                            </p>
                            <p>
                                <?php echo date('d/m/Y à\s H:i:s', strtotime($evento['timestamp'])) ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <?php endif // fim do if?>
        </div>

    </section>

    <?php
    require_once('./pages/4-rodape.php');
    ?>
            <script src="./js/animate.js"></script>
</body>

</html>