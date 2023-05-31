//{{-- Jquery Entradas --}}

// CSRF Token
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

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
      $('#nome').val(ui.item.label);
      $('#id-produto').val(ui.item.value);
      return false;
    }
  });
});

//{{-- Jquery Saídas --}}

$(document).ready(function () {
  $("#pesquisa").autocomplete({
    source: function (request, response) {
      //console.log(request.term);
      $.ajax({
        url: "/getentrada",
        type: 'post',
        dataType: "json",
        data: {
          _token: CSRF_TOKEN,
          busca: request.term,
          tipo: $("input[name='tipo']:checked").val()
        },
        success: function (data) {
          if (data.length > 0) {
            response(data);
          } else {
            response([{ label: "Produto não encontrado", value: null }]);
          }
        }
      });
    },
    select: function (event, ui) {
      console.log(ui);
      $('#pesquisa').val(ui.item.label);
      $('#nome').val(ui.item.value['nome']);
      $('#numeroserie').val(ui.item.value['numeroSerie']);
      return false;
    }
  });
});