$(function () {
    $("input,textarea").mouseenter(function () {
        $(this).focus();
        $(this).css("border","1px solid blue");
    });
    $("input,textarea").mouseleave(function () {
        $(this).css("border","1px solid #fff");
    });
    var url = $("#url").val();
    $(".sub").click(function () {
        var that = $(this).parents("tr");
        var data = new Array();
        for (i = 0; i < 4; i++) {
            data[i] = that.find("input").eq(i).val();
        }
        var intro = that.find("textarea").val();
        $.post(url,
            {
                effect  : data[0],
                type    : data[1],
                price   : data[2],
                id      : data[3],
                intro   : intro
            },
            function (data) {
                if (data == 'ok') {
                    $("#sold_res").fadeIn(1000,function(){
                        $(this).html("修改成功");
                        setTimeout('window.location.src = history.go(0)',2000);
                    });
                    
                } else {
                    $("#sold_res").fadeIn(1000,function(){
                        $(this).html("修改失败");
                        setTimeout('$("#sold_res").fadeOut()',2000);
                    });
                }
            }
        );
    });

    //无刷新分页
    $(document).on('click', '.page>div>ul>li>a', function(){
        var tr = $("table").attr("tr");
        var url = $(this).attr("href");
        $.get(url,function(data){
            $(".page").html(data[1]);
            $("table").find("tr").show();
            for(i = 0; i < data[0].length; i++){
                var that = $("table").find("tr").eq(i+1).children("td");
                that.eq(0).find("input").val(data[0][i]["effect"]);
                that.eq(1).find("input").val(data[0][i]["type"]);
                that.eq(2).find("input").val(data[0][i]["price"]);
                that.eq(3).find("textarea").html(data[0][i]["intro"]);
                that.eq(4).find("input").eq(0).val(data[0][i]["id"]);
            }
            for (k = data[0].length; k <= tr; k++) {
                $("table").find("tr").eq(k+1).hide();
            }
        })
    });
})
    