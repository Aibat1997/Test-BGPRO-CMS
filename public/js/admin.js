$(document).ready(function () {
    $('#showed').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('#not-showed').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    });
});

$(".show").click(function () {
    $(this).parent().addClass('active-top-show');
    $(".not-show").parent().removeClass('active-top-show');
    $("#not-showed_wrapper").hide();
    $("#not-showed").hide();
    $("#showed_wrapper").show();
});
$(".not-show").click(function () {
    $(this).parent().addClass('active-top-show');
    $(".show").parent().removeClass('active-top-show');
    $("#showed_wrapper").hide();
    $("#not-showed_wrapper").show();
    $("#not-showed").show();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function () {
    readURL(this);
});
