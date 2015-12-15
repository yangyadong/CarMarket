$(document).ready(function () {
    $("#password").mousedown(function () {
        $password = $("#password").val();
        $("#look_password").show();
        $("#password").hide();
        $("#look_password").val($password);
    });
    $("#look_password").mouseup(function () {
        $("#password").show();
        $("#look_password").hide();
        $("#password").focus();
    });
})