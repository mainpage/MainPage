$(document).ready(function () {
    $(".inputs").labelFloat();
    //注册一个框状态数组，初始状态为0，输入的信息符合要求为1
    var ready_state = new Array(0, 0, 0, 0, 0);
    //用户名
    $("#input-username").focus(function () {
        //document.getElementById("username-notice").innerHTML = "请输入用户名(2-12位字母或数字)";
        $("#username-notice").html("请输入用户名(2-7位)");  //jquery不支持innerHtml？ 用html()
        $("#username-notice").removeClass("wrong").removeClass("success");
        $(this).removeClass("blur-wrong").addClass("click-input");
    })
    $("#input-username").blur(function () {
        var input = $(this).val();
        var usernameReg = /^[a-zA-Z0-9]{2,7}$/;
        //用户名为空
        if (input == "") {
            document.getElementById("username-notice").innerHTML = "";
            $(this).removeClass("click-input").removeClass("blur-wrong");
        }
        //用户名格式错误
        else if (!usernameReg.test(input)) {
            document.getElementById("username-notice").innerHTML = "错误(2-7位字母或数字)";
            $("#username-notice").addClass("wrong");
            $(this).removeClass("click-input").addClass("blur-wrong");
        }
        //用户名格式正确
        else {
            $(this).removeClass("click-input");
            //$(this).css("color", "black");
            document.getElementById("username-notice").innerHTML = "检测中";
            //ajax判断用户名是否存在
            $.get("ajaxCheck", { "data": input, "type": "userName" }, function (state) {
                //document.getElementById("username-notice").innerHTML = state;
                //alert(state);
                if (state == "allow") {
                    document.getElementById("username-notice").innerHTML = "<img width=22px height=22px src=\"https://assets-cdn.github.com/images/modules/ajax/success.png\">";
                    $("#username-notice").addClass("success");
                    ready_state[0] = 1;
                }
                else {
                    document.getElementById("username-notice").innerHTML = "用户名已存在";
                    $("#username-notice").addClass("wrong");
                    $("#input-username").addClass("blur-wrong");
                }
            })
        }
    })
    //邮箱
    $("#input-email").focus(function () {
        document.getElementById("email-notice").innerHTML = "请输入邮箱地址";
        $("#email-notice").removeClass("wrong").removeClass("success");
        $(this).removeClass("blur-wrong").addClass("click-input");
    })
    $("#input-email").blur(function () {
        var input = $(this).val();
        var emailReg = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)+$/;
        //邮箱地址为空
        if (input == "") {
            document.getElementById("email-notice").innerHTML = "";
            $(this).removeClass("click-input").removeClass("blur-wrong");
        }
        //邮箱格式错误
        else if (!emailReg.test(input)) {
            document.getElementById("email-notice").innerHTML = "邮箱格式错误";
            $("#email-notice").addClass("wrong");
            $(this).removeClass("click-input").addClass("blur-wrong");
        }
        //邮箱格式正确
        else {
            $(this).removeClass("click-input");
            //$(this).css("color", "black");
            document.getElementById("email-notice").innerHTML = "检测中";
            //ajax判断邮箱是否已被使用
            $.get("ajaxCheck", { "data": input, "type": "email" }, function (state) {
                if (state == "allow") {
                    document.getElementById("email-notice").innerHTML = "<img width=22px height=22px src=\"https://assets-cdn.github.com/images/modules/ajax/success.png\">";
                    $("#email-notice").addClass("success");
                    ready_state[1] = 1;
                }
                else {
                    document.getElementById("email-notice").innerHTML = "邮箱已被使用";
                    $("#email-notice").addClass("wrong");
                    $("#input-email").addClass("blur-wrong");
                }
            })
        }
    })
    //密码
    $("#input-password").focus(function () {
        document.getElementById("password-notice").innerHTML = "请设置密码(3-12位字符)";
        //将确认密码框置空并清除样式,同时将密码和确认密码的准备状态置为0
        $("#input-confirm-password").val("");
        $("#input-confirm-password").removeClass("blur-wrong");
        $("#confirm-password-notice").removeClass("wrong").removeClass("success");
        $("#confirm-password-notice").html("");
        ready_state[2] = ready_state[3] = 0;

        $("#password-notice").removeClass("wrong").removeClass("success");
        $(this).removeClass("blur-wrong").addClass("click-input");
    })
    /*$("#input-password").keyup(function(){
    var len = $(this).val().length;
    if(len<=5 && len>=3){
    document.getElementById("password-notice").innerHTML = "弱";
    }
    if(len<=10 && len>5){
    document.getElementById("password-notice").innerHTML = "中";
    }
         
    })*/
    $("#input-password").blur(function () {
        var input = $(this).val();
        var len = $(this).val().length;
        //密码为空
        if (input == "") {
            document.getElementById("password-notice").innerHTML = "";
            $(this).removeClass("click-input").removeClass("blur-wrong");
        }
        //密码长度错误
        else if (len < 3) {
            document.getElementById("password-notice").innerHTML = "密码太短";
            $("#password-notice").addClass("wrong");
            $(this).removeClass("click-input").addClass("blur-wrong");
        }
        else if (len > 12) {
            document.getElementById("password-notice").innerHTML = "密码太长";
            $("#password-notice").addClass("wrong");
            $(this).removeClass("click-input").addClass("blur-wrong");
        }
        //密码长度正确
        else {
            $(this).removeClass("click-input").addClass("blur-success");
            //$(this).css("color", "black");
            document.getElementById("password-notice").innerHTML = "<img width=22px height=22px src=\"https://assets-cdn.github.com/images/modules/ajax/success.png\">";
            $("#password-notice").addClass("success");
            ready_state[2] = 1;
        }
    })
    //确认密码
    $("#input-confirm-password").focus(function () {
        document.getElementById("confirm-password-notice").innerHTML = "再次输入密码";
        $("#confirm-password-notice").removeClass("wrong").removeClass("success");
        $(this).removeClass("blur-wrong").addClass("click-input");
    })
    $("#input-confirm-password").blur(function () {
        var input = $(this).val();
        //密码为空
        if (input == "") {
            document.getElementById("confirm-password-notice").innerHTML = "";
            $(this).removeClass("click-input").removeClass("blur-wrong");
        }
        //密码不一致
        else if (input != $("#input-password").val()) {
            document.getElementById("confirm-password-notice").innerHTML = "密码不一致";
            $("#confirm-password-notice").addClass("wrong");
            $(this).removeClass("click-input").addClass("blur-wrong");
        }
        //密码一致
        else {
            $(this).removeClass("click-input");
            //$(this).css("color", "black");
            document.getElementById("confirm-password-notice").innerHTML = "<img width=22px height=22px src=\"https://assets-cdn.github.com/images/modules/ajax/success.png\">";
            $("#confirm-password-notice").addClass("success");
            ready_state[3] = 1;
        }
    })
    //验证码
    var code;
    $("#input-checkcode").focus(function () {
        document.getElementById("checkcode-notice").innerHTML = "请输入验证码";
        $("#checkcode-notice").removeClass("wrong").removeClass("success");
        $(this).removeClass("blur-wrong").addClass("click-input");
        //验证码未显示(即首次点击时),生成验证码
        if ($("#checkcode-img").attr("src") == "") { //.src无效
            code = creatCode();
            $("#checkcode-img").attr("src", "createCode?code=" + code);
            $("#checkcode-img").show();
            document.getElementById("checkcode-notice").innerHTML = "请输入验证码";
            $("#checkcode-notice").removeClass("wrong").removeClass("success");
            $(this).removeClass("blur-wrong").addClass("click-input");
        }
    })
    $("#checkcode-img").click(function () {
        code = creatCode();
        $(this).attr("src", "createCode?code=" + code);
        $(this).show();
    })
    $("#input-checkcode").blur(function () {
        var input = $(this).val();
        //验证码为空
        if (input == "") {
            document.getElementById("checkcode-notice").innerHTML = "";
            $(this).removeClass("click-input").removeClass("blur-wrong");
        }
        //验证码错误
        else if (input != code) {
            document.getElementById("checkcode-notice").innerHTML = "验证码错误";
            $("#checkcode-notice").addClass("wrong");
            $(this).removeClass("click-input").addClass("blur-wrong");
        }
        //验证码正确
        else {
            $(this).removeClass("click-input");
            //$(this).css("color", "black");
            document.getElementById("checkcode-notice").innerHTML = "<img width=22px height=22px src=\"https://assets-cdn.github.com/images/modules/ajax/success.png\">";
            $("#checkcode-notice").addClass("success");
            ready_state[4] = 1;
        }
    })
    //生成验证码函数
    function creatCode() {
        var code = '';
        for (i = 0; i < 4; i++) {
            tmp = Math.ceil(Math.random() * 15); //Math.ceil上取整；Math.random取0-1之间的随机数
            code += tmp.toString(16);   //10进制转换为16进制
            /*if (tmp > 9) {
            switch (tmp) {
            case (10):
            code += 'a';
            break;
            case (11):
            code += 'b';
            break;
            case (12):
            code += 'c';
            break;
            case (13):
            code += 'd';
            break;
            case (14):
            code += 'e';
            break;
            case (15):
            code += 'f';
            break;
            }
            }
            else {
            code += tmp;
            }*/
        }
        return code;
    }

    //提交表单
    $("#submit").click(function () {
        if ($("#input-username").val() == "") {
            document.getElementById("username-notice").innerHTML = "请输入用户名";
            $("#username-notice").addClass("wrong");
        }
        if ($("#input-email").val() == "") {
            document.getElementById("email-notice").innerHTML = "请输入邮箱地址";
            $("#email-notice").addClass("wrong");
        }
        if ($("#input-password").val() == "") {
            document.getElementById("password-notice").innerHTML = "请设置密码";
            $("#password-notice").addClass("wrong");
        }
        if ($("#input-confirm-password").val() == "") {
            document.getElementById("confirm-password-notice").innerHTML = "请再次输入密码";
            $("#confirm-password-notice").addClass("wrong");
        }
        if ($("#input-checkcode").val() == "") {
            document.getElementById("checkcode-notice").innerHTML = "请输入验证码";
            $("#checkcode-notice").addClass("wrong");
        }
        var ready = 1;
        for (var i = 0; i < ready_state.length; i++) {
            if (ready_state[i] == 0) ready = 0;
        }
        //此时页面填写的信息不符合要求，阻止提交
        if (!ready) {
            return false;
        }
    })
})