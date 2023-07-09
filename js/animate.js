window.onscroll = function () {
    var top = window.pageYOffset || document.documentElement.scrollTop;

    if (top > 200) {
        document.getElementById("topoFixo").classList.add("topo-Fixo");
        console.log("teste")
    } else {
        document.getElementById("topoFixo").classList.remove("topo-Fixo");
        console.log("teste2")
    }

}

$(document).ready(function() {
    // Detectar a mudança no valor selecionado
    $('#estado').change(function() {
      var estado = $(this).val(); // Obter o valor selecionado
      
      // Enviar uma solicitação AJAX para obter os detalhes do estado selecionado
      $.ajax({
        type: 'POST',
        url: 'api/WebService/estado.php',
        data: { estado: estado },
        success: function(response) {
          $('#detalhes').html(response); // Exibir os detalhes retornados no elemento com o ID "detalhes"
        }
      });
    });
  });