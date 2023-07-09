<div class="dados">

            <?php foreach ($response['shipments'] as $objeto) { ?>
            <h2 class="codigo-rastreio">
                <?php echo $objeto['id']; ?>
            </h2>

            <?php if (!isset($objeto['events'])) {
                $mensagem = $objeto['mensagem'] ?? 'Problemas ao buscar dados da API';
                echo '<div class="alert alert-warning">' . $mensagem . '</div>';
                continue;
            }

                ?>
            <div class="origem">
                <p class="mt-1">Origem:
                    <?php if (!isset($objeto['origin']['address']['addressLocality'])) {
                echo $objeto['origin']['address']['countryCode'] ?? null;
            } else {
                echo $objeto['origin']['address']['addressLocality'];
            } ?>
                </p>

            </div>

            <div class="destino">
                <p>Destino:
                    <?php if (!isset($objeto['destination']['address']['addressLocality'])) {
                echo $objeto['destination']['address']['countryCode'] ?? null;
            } else {
                echo $objeto['destination']['address']['addressLocality'];
            } ?>
                </p>
            </div>
            <div class="info-dhl">
                <p class="detalhes">
                    <?php if (isset($objeto['status']['remark'])) {
                echo $objeto['status']['remark'] ?? null;
            } ?>
                </p>

                <p class="detalhes">
                    <?php if (isset($objeto['status']['nextSteps'])) {
                echo $objeto['status']['nextSteps'] ?? null;
            } ?>
                </p>
            </div>
            <?php
            foreach ($objeto['events'] as $evento) {

                $cidade = isset($evento['location']['address']['adressLocality']);

                $dados = [
                    $cidade,
                    $evento['description']
                ];
                ?>
            <div class="status">
                <div>
                    <p>
                        <?php echo implode(' - ', array_filter($dados)) ?>
                    </p>
                    <p>
                        <?php echo date('d/m/Y à\s H:i:s', strtotime($evento['timestamp'])) ?>
                    </p>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>