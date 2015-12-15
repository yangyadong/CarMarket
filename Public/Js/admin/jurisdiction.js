//数据处理
function trandata() {
    var data = "";
    var k = 1;
    for (i = 0; i < 5; i++) {
        for (j = 1; j < 4; j++) {
            if ($(".hash").eq(i).find("input").eq(j).is(":checked")) {			//判断复选框是否选中
                data = data + k + '-' + j + ',';
            }
        }
        k++;
    }
    return data;
};


$(function () {

    //选中
    for (i = 0; i < 5; i++) {
        for (j = 0; j < 4; j++) {
            var data = $(".hash").eq(i).find("input").eq(j).val();
            if (data != '') {
                $(".hash").eq(i).find("input").eq(j).attr("checked", true);
            }
        }
    }


    $("#sub").click(function () {
        var comp_data = trandata();
        if ($("#add_save").val() != '') {
            var add_save = $("#add_save").val();
        } else {
            alert('请输入姓名');
            return;
        }
        if ($("#Gjob_num").val() != '') {
            var job_num = $("#Gjob_num").val();
        }
        if ($("#add_save_position").val() != 'staffaa') {
            var values = $("#add_save_position").val();
            if (values == 'top_manager') {
                var add_save_position = '总经理';
            } else if (values == 'director') {
                var add_save_position = '主管';
            } else if (values == 'manager') {
                var add_save_position = '部门经理';
            } else {
                var add_save_position = '员工';
            }
        } else {
            alert('请选择职位');
            return;
        }
        $.ajax({
            url: 'add_save',
            dataType: "json",
            type: 'post',
            data: ({id: comp_data, name: add_save, position: add_save_position, num: job_num}),
            success: function (data) {
                if (data == 'false') {
                    alert('操作失败');
                } else if (data == 'save') {
                    alert('修改成功');
                } else {
                    alert('添加成功\n工号为:' + data);
                }
            }
        });
    });
})
