//{{-- Jquery User --}}

$(document).ready(function () {
  $("#gerente").autocomplete({
    minLength: 2,
    source: function (request, response) {
      //console.log(request.term);
      $.ajax({
        url: "/getuser",
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
            response([{ label: "Usuário não encontrado.", value: null }]);
          }
        }
      });
    },
    select: function (event, ui) {
      console.log(ui);
      $('#gerente').val(ui.item.label);
      $('#id-gerente').val(ui.item.value);
      return false;
    }
  });
});
