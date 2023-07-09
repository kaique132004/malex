<?php
if (isset($_POST['estado'])) {
  $estado = $_POST['estado'];

  $arquivoJSON = './local.json';

  if (file_exists($arquivoJSON)) {
    // Ler o conteúdo do arquivo JSON
    $conteudoJSON = file_get_contents($arquivoJSON);

    // Decodificar o conteúdo JSON em um array associativo
    $informacoesAeroportos = json_decode($conteudoJSON, true);

    // Verificar se o estado existe nas informações dos aeroportos
    if (array_key_exists($estado, $informacoesAeroportos)) {
      $informacoesEstado = isset($informacoesAeroportos[$estado]['Malex']) ? $informacoesAeroportos[$estado]['Malex']: "Nada encontrado nesta região";

      // Construir a resposta HTML com as informações dos aeroportos do estado
      $respostaHTML = '<h2 class="text-center">' . $estado . '</h2>';
      $respostaHTML .= '<div class="cards-container" style="display: flex; flex-wrap: wrap; justify-content:center">';
      if($informacoesEstado != "Nada encontrado nesta região"){
          foreach ($informacoesEstado as $aeroporto) {
            if (!is_array($aeroporto)) {
              continue;
            }
    
            $nome = isset($aeroporto['nome']) ? $aeroporto['nome'] : 'N/A';
            $telefone = isset($aeroporto['telefone']) ? $aeroporto['telefone'] : 'N/A';
            $endereco = isset($aeroporto['logradouro']['endereco']) ? $aeroporto['logradouro']['endereco'] : 'N/A';
            $bairro = isset($aeroporto['logradouro']['bairro']) ? $aeroporto['logradouro']['bairro'] : 'N/A';
            $cidade = isset($aeroporto['logradouro']['cidade']) ? $aeroporto['logradouro']['cidade'] : 'N/A';
            $cep = isset($aeroporto['logradouro']['cep']) ? $aeroporto['logradouro']['cep'] : 'N/A';
    
            $respostaHTML .= '<div class="card " style="width: 18rem; margin: 10px">';
            $respostaHTML .= '<div class="card-body">';
            $respostaHTML .= '<h3 class="card-title">' . $nome . '</h3>';
            $respostaHTML .= '<p>Telefone: ' . $telefone . '</p>';
            $respostaHTML .= '<p>Endereço: ' . $endereco . ', ' . $bairro . '</p>';
            $respostaHTML .= '<p>Cidade: ' . $cidade . ' - ' . $cep . '</p>';
            $respostaHTML .= '</div>';
            $respostaHTML .= '</div>';
          }
          $respostaHTML .= '</div>';
      }else{
        echo "<h5 class='text-center'>Nada encontrado nesta região</h5>";
      }
    } else {
      $respostaHTML = 'Nenhuma informação encontrada para o estado selecionado.';
    }
  } else {
    $respostaHTML = 'Arquivo JSON não encontrado.';
  }
} else {
  $respostaHTML = 'Nenhum estado selecionado.';
}

// Personalizar a resposta HTML conforme necessário
// Exemplo: Adicionar estilo CSS para os cards
$respostaHTML = '<div class="cards-container">' . $respostaHTML . '</div>';

// Exibir a resposta HTML
echo $respostaHTML;
?>
