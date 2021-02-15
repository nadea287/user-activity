$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function confirmDelete(button, text) {
        $(button).on('click', function () {
            var response = confirm(text);
            if (!response) {
                return false;
            }
        });
    }
    confirmDelete('.delete-location-btn', 'sure');

    $(document).on('click', '.delete-location-btn', function () {
        var id = $(this).data('id');
        var delete_btn = $(this);

        if (confirmDelete) {
            delete_btn.closest('tr').remove();
            $.ajax({
               url: 'locations/' + id,
               method: 'DELETE',
               data: {
                   id:id
               }
            }).done(function (result) {

            }).fail(function (error) {
                console.log(error);
            });
        } else {
            return false;
        }
        console.log(delete_btn);
    });


});
