function get_judge() {
    var name = $.trim($("#email").val());
    if (name != '') {
        var password = $.trim($("#password").val());
        if (password != '') {
            var password1 = $.trim($('#password1').val());
            if (password1 != '') {
                if (password == password1) {
                    var data = new Array();
                    data.form_data = $('#input').serialize();
                    data.url = $("#reg").attr('url');
                    return data;
                } else {
                    alert('密码不一致');
                }
            } else {
                alert('请输入确认密码');
            }
        } else {
            alert('请输入密码');
        }
    } else {
        alert('请输入账号');
    }
}
$(function () {
    $('#reg').click(function () {
        var res = get_judge();
        $.post(res.url, res.form_data, function (res) {
                if (res != 'yes') {
                    alert(res);
                } else {
                    $("#new").fadeIn(2000);
                    setTimeout('$("#new").fadeOut()', 3000);
                }
            }
        );
    });
})