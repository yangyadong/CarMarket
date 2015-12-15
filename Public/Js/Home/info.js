$(document).ready(function () {
    $("#reduce").click(function () {
        var num = $("#num").val();
        num = parseInt(num);
        if (num > 1) {
            $("#num").val(num - 1);
        }
    });
    $("#add").click(function () {
        var num = $("#num").val();
        num = parseInt(num);
        $("#num").val(num + 1);
    });
})