
// var spinner = $('#loader');

$(document).on("click", ".edit-modal", function (evt) {
  evt.preventDefault();
$('.error-validation').html("");
  // spinner.show();
  var actionurl = "";
  var content = $(this).data("content");
  var id = $(this).data("id");
  var page = $(this).data("page");
  var actionurl = '/admin'+content;

    $.ajax({
    type: "get",
    url: actionurl,
    data: {id},
     success: function (result) {
        $('.edit-modal-form').html(result.htmlEdit);
        $('#edit-modal').modal('show');
      },
    error: function (data) {
        // spinner.hide();
        $.each(data.responseJSON.errors, function (key, value) {
          console.log(value);
          field = $('[name="' + key + '"]');
          field.next("span.error-validation").html(value);
          });
    },
  });
});

