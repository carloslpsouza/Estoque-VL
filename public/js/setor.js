//{{-- Jquery Setor --}}

$(document).ready(function () {
  $("#setor").autocomplete({
    minLength: 2,
    source: function (request, response) {
      //console.log(request.term);
      $.ajax({
        url: "/getsetor",
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
            response([{ label: "Setor não encontrado vá para setor cadastro.", value: null }]);
          }
        }
      });
    },
    select: function (event, ui) {
      /* console.log(ui); */
      $('#setor').val(ui.item.label);
      $('#id-setor').val(ui.item.value);
      return false;
    }
  });
});
