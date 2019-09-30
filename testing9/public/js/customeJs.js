$(document).ready(function () {
    $("#nalert").hide();
    $("#nalert").fadeTo(1600, 600).slideUp(600, function () {
        $("#nalert").slideUp(600);
    });
});

$('.n').click(function() {
    var id = $(this).data('id');
    $.get('dishupdate/' + id, function(response) {
        $('#d_name').html(response.data.d_name);
        $('.id').attr('value', response.data.id);
        $('.d_name').attr('value', response.data.d_name);
        $('.d_prise').attr('value', response.data.d_prise);
    });
});

$('#updateDishModal').on('hide.bs.modal', function() {
    $('#updateDishModal form')[0].reset();
});
