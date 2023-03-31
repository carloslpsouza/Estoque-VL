//{{-- Jquery Entradas --}}

// CSRF Token
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
/* var CSRF_TOKEN = document.getElementsByName("_token"); */
$(document).ready(function () {
  $("#nome").autocomplete({
    source: function (request, response) {
      //console.log(request.term);
      $.ajax({
        url: "/getproduto",
        type: 'post',
        dataType: "json",
        data: {
          _token: CSRF_TOKEN,
          busca: request.term
        },
        success: function (data) {
          response(data);
        }
      });
    },
    select: function (event, ui) {
      console.log(ui);
      $('#nome').val(ui.item.label); // demonstra o cliente pesquisado
      $('#id-produto').val(ui.item.value); // demonstra o email do cliente no formulário
      return false;
    }
  });
});

