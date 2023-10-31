$(document).ready(function () {
    $('[data-bs-toggle="modal"]').click(function () {
        var target = $(this).data('bs-target');
        $('.modal').modal('hide');
        $(target).modal('show');
    });
});
