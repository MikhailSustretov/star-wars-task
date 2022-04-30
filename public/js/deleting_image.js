
$(document).ready(function () {
    $('.image-form').submit(function (e) {
        e.preventDefault();

        let img = $(this).find('.img-thumbnail');
        let button = $(this).find('.btn-danger');

        $.ajax({
            url: '/images/' + img.attr('alt'),
            type: 'delete',
            dataType: 'json',
            success: function () {
                img.remove();
                button.remove();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        })
    })
});
