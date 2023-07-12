window.onscroll = function () {
    var top = window.pageYOffset || document.documentElement.scrollTop;

    if (top > 200) {
        document.getElementById("topoFixo").classList.add("topo-Fixo");
    } else {
        document.getElementById("topoFixo").classList.remove("topo-Fixo");
    }

}


$(document).ready(function() {
    $('#estado').change(function() {
      var estado = $(this).val();
      
      $.ajax({
        type: 'POST',
        url: 'api/WebService/estado.php',
        data: { estado: estado },
        success: function(response) {
          $('#detalhes').html(response);
        }
      });
    });
  });