$(document).on('click', '.deleteIcon-modal', function (e) {
    e.preventDefault();
 ;
    var page = $(this).data("page");
    var dataContent = $(this).data("content");
    var id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "get",
                url: base_url + "admin/"+dataContent + id,
                data: {},
                success: function (result) {

                    console.log(result);
                    var message = result.message;
                    if (result.status == true) {
                        Swal.fire(
                            '',
                            message,
                            'success'
                        );
                      
                    } else if (result.status == false) {
                        Swal.fire(
                            '',
                            message,
                            'error'
                        );
                    }
                    $('.result-' + page).html(result.htmlDelete);
                }
            });
        }
       
    })
});