//{{-- Jquery Saídas --}}

$(document).ready(function () {
  $("#pesquisa").autocomplete({
    minLength: 2,
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
            response([{ label: "Produto não encontrado, verifique se existe uma entrada para o item.", value: null }]);
          }
        }
      });
    },
    select: function (event, ui) {
      /* console.log(ui); */
      $('#pesquisa').val(ui.item.label);
      $('#nome').val(ui.item.value['nome']);
      $('#numeroserie').val(ui.item.value['numeroSerie']);
      $('#id_entrada').val(ui.item.value['id_entrada']);
      $('#id_produto').val(ui.item.value['id_produto']);
      return false;
    }
  });
});

