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
      $('#pesquisa').val(ui.item.label);
      $('#id-produto').val(ui.item.value);
      return false;
    }
  });
});