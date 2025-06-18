$(document).on('click', '.status-change', function()

    {
      var content = $(this).data("content");

      var id = $(this).val();
      $.ajax({
        type: "get",
        data: {
          id: id
        },
        url: base_url + "admin"+content,

        success: function(response) {
          alertify.set('notifier', 'position', 'top-right');
          alertify.success(response.message);
          },
        error: function() {
          console.log('error');
        }
      })
    })
