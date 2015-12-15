$(document).ready(function () {
    $('#nav').children('ul').children('li').mouseenter(function () {
        $(this).css("color", "#F6624A");
        $(this).children('div').toggle();
        $(this).siblings().not($(this)).children('div').hide();
        $(this).siblings().not($(this)).css("color", "#A7B3C2");
    });
    $('#nav').children('ul').children('li').mouseout(function () {
        $(this).css("color", " #A7B3C2");
    });
    $("#nav").find("ol").children("li").mouseenter(function () {
        $(this).css("color", " #F6624A");
    });
    $("#nav").find("ol").children("li").mouseout(function () {
        $(this).css("color", " #A7B3C2");
    });
    $("#baoma").click(function () {
        $("#baomashow").show();
        $("#baomashow").siblings("div").not($(this)).hide();
    });
    $("#benchi").click(function () {
        $("#benchishow").show();
        $("#benchishow").siblings("div").not($(this)).hide();
    });
    $("#laoshilaishi").click(function () {
        $("#show").show();
        $("#show").siblings("div").not($(this)).hide();
    });
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