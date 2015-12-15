function show_res(res){
    $("#sold_res").show(function(){
        $(this).html(res);
    });
    setTimeout('$("#sold_res").fadeOut()',2000);
};

$(function () {
    $(".sold").click(function () {
        if(!confirm('确定要下架?')){
            return;
        }
        var that = $(this);
        var id = that.attr("Deid");
        var url = that.attr("url")
        $.post(url, {id: id}, function (data) {
            if (data == "ok") {
                show_res('下架成功');
                setTimeout("window.location.src = history.go(0)",2000);
            } else {
                show_res('下架失败');
            }
        })
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
                that.eq(0).html(data[0][i]["effect"]);
                that.eq(1).html(data[0][i]["type"]);
                that.eq(2).html(data[0][i]["price"]);
                that.eq(3).find("img").attr("src","/CarMarket/Public/"+data[0][i]["image"]);
                that.eq(4).html(data[0][i]["car_num"]);
                that.eq(5).find("input").attr("Deid",data[0][i]["id"]);
            }
            for (k = data[0].length; k <= tr; k++) {
                $("table").find("tr").eq(k+1).hide();
            }
        })
    });
})