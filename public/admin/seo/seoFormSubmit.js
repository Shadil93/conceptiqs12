$(document).on('submit', '.seoFormSubmit', function (e) {
    e.preventDefault();
    var spinner = $('#loader');
    spinner.show();
  
    var content = $(this).data('content');
    var submitForm = new FormData(this);
  
   $.ajax({
      type: "POST",
      url: base_url + content,
      data: submitForm,
      processData: false,
      contentType: false,
      success: function (res) {
        spinner.hide();
  
  
        // $('.seoFormSubmit').trigger("reset");
  
        var message = res.message;
  
        if (res.status == true) {
  
          Swal.fire(
            '',
            message,
            'success'
          );
          $('.image').val('');
        } else if (res.status == false) {
          Swal.fire(
            '',
            message,
            'error'
          );
        }
      
       
      }, error: function (data) {
        spinner.hide();
        console.log(data.responseJSON.errors);

      }
    })
  })
  
  
  
  
  