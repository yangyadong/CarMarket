$(function () {
    var stair = $("#show_nav").attr("one");
    var secondary = $("#show_nav").attr("two");
    var that = $("ul").children("li").eq(stair-1).next("ol");
    that.show();
    that.children("li").eq(secondary-1).css({background: "#0f0"});
    $("#product,#sell,#adnew,#sale,#system").click(function () {
        $(this).next("ol").toggle();
        $(this).children("span").removeClass();
        $(this).children("span").addClass("glyphicon glyphicon-collapse-up");
        $(this).siblings("li").not($(this)).next("ol").hide();
        $(this).siblings("li").not($(this)).children("span").removeClass();
        $(this).siblings("li").not($(this)).children("span").addClass("glyphicon glyphicon-collapse-down");
    });
    $("ul,ol").children("li").mouseenter(function () {
        $(this).css({background: "#faa"});
    });
    $("ul,ol").children("li").mouseleave(function () {
        $(this).css({background: "#daf"});
        $("ol").children("li").css({background: "#0ff"});
        that.children("li").eq(secondary-1).css({background: "#0f0"});
    });
})