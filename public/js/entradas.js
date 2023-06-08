//{{-- Jquery Entradas --}}

$(document).ready(function () {
  $("#nome").autocomplete({
    minLength: 2,
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
          if (data.length > 0) {
            response(data);
          } else {
            response([{
              label: "Produto não encontrado",
              value: null
            }]);
          }
        }
      });
    },
    select: function (event, ui) {
      /* console.log(ui); */
      $('#setor').val(ui.item.label);
      $('#id-produto').val(ui.item.value);
      return false;
    }
  });
});


//{{-- Jquery fornecedor --}}

$(document).ready(function () {
  $("#fornecedor").autocomplete({
    minLength: 3,
    source: function (request, response) {
      //console.log(request.term);
      $.ajax({
        url: "/getfornecedor",
        type: 'post',
        dataType: "json",
        data: {
          _token: CSRF_TOKEN,
          busca: request.term
        },
        success: function (data) {
          if (data.length > 0) {
            response(data);
          } else {
            response([{ label: "Fornecedor não encontrado", value: null }]);
          }
        }
      });
    },
    select: function (event, ui) {
      console.log(ui);
      $('#fornecedor').val(ui.item.label);
      $('#nm-fornecedor').val(ui.item.label);
      $('#id-fornecedor').val(ui.item.value);
      return false;
    }
  });
});
