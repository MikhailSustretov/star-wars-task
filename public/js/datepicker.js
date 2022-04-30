$(function () {
    $("#created").datepicker({dateFormat: 'yy-mm-dd'})
        .on('change', function (ev) {
            $(this).valid();
        });
});