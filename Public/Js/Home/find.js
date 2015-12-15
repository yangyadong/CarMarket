$(document).ready(function () {
    $("#type").change(function () {
        var type = $("#type").val();
        if (type == 'car_num' || type == 'price') {
            $("#text1,#text2,#span").show();
            $("#text").hide();
        } else {
            $("#text").show();
            $("#text1,#text2,#span").hide();
        }
    });
    $("#carshow").find(".img-rounded").mouseenter(function () {
        $(this).css({ width: "180"});
    });
    $("#carshow").find(".img-rounded").mouseout(function () {
        $(this).css({ width: "150"});
    });
})