function get_data() {
    var name = $.trim($("#username").val());
    var password = $.trim($("#password").val());
    var auth = $.trim($("#auth").val());
    if (auth == '') {
        $("#vei").fadeIn(2000);
        setTimeout('$("#vei").fadeOut()', 3000);
        $("#auth").focus();
        return false;
    } else if (name == '') {
        $("#name").fadeIn(2000);
        setTimeout('$("#name").fadeOut()', 3000);
        $("username").focus();
        return false;
    } else if (password == '') {
        $("#pwd").fadeIn(2000);
        setTimeout('$("#pwd").fadeOut()', 3000);
        $("#password").focus();
        return false;
    } else {
        var re = /\d{9,11}/;
        if (!re.test(name)) {
            alert("名字格式9-11为数字");
            return false;
        }else{
            var data = $("#input").serialize();
            return data;
        }
    }
}
$(function () {
    $("#password").mousedown(function () {
        $password = $("#password").val();
        $("#look_password").show();
        $("#password").hide();
        $("#look_password").focus();
        $("#look_password").val($password);
    });

    $("#look_password").mouseup(function () {
        $("#password").show();
        $("#look_password").hide();
        $("#password").focus();
        $("#password").val($("#look_password").val());
    });

    if($("#automatic_res").val() != ''){
        $("#automatic").attr("checked", true);
    }

    $("#submit").click(function () {
        var data = get_data();
        var url = $("#submit").attr('url');
        if (data != false) {
            $.post(url,data, function (data) {
                if (data == 'ok') {
                    var urlor = $("#url").val();
                    window.location.href = urlor;
                } else {
                    $("#admin_res").show(function(){
                        $(this).html(data);
                    });
                    setTimeout('$("#admin_res").fadeOut()', 3000);
                }
            })
        }
    });
})