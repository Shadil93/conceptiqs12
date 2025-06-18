
var spinner = $('#loader');
$(document).on("submit", ".formUpdate", function (evt) {
  evt.preventDefault();
  $('.error-validation').html("");
   spinner.show();
  var actionurl = "";
  var dataContent = $(this).data("content");
  var page = $(this).data("page");
  var actionurl = base_url +dataContent;
  var formname = new FormData(this);
  $.ajax({
    type: "POST",
    url: actionurl,
    data: formname,
    cache: false,
    contentType: false,
    processData: false,
    success: function (result) {

     $('#edit-modal').modal('hide');
      spinner.hide();
      if (result.status == true) {
        Lobibox.notify("success", {
          size: "mini",
          position: "top right",
          msg: result.message,
          delay: 4000,
        });
      }
      $('.result-'+page).html(result.htmlUpdate);
   },
    error: function (data) {
        spinner.hide();
      $.each(data.responseJSON.errors, function (key, value) {
        console.log(value);
        field = $('[name="' + key + '"]');
        field.next("span.error-validation").html(value);     
      });
    },
  });
});

