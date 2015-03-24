$(document).ready(function () {
    $(".inputs").labelFloat();
    var ready_state = 0;
    //用户名
    $("#input-username").focus(function () {
        $("#username-notice").html("");  
        $(this).removeClass("blur-wrong").addClass("click-input");
    })
    $("#input-username").blur(function () {
        $(this).removeClass("click-input");
    })
    //密码
    $("#input-password").focus(function () {
        document.getElementById("password-notice").innerHTML = "";
        $("#password-notice").removeClass("wrong");
        $(this).removeClass("blur-wrong").addClass("click-input");
    })
    $("#input-password").blur(function () {
        $(this).removeClass("click-input").removeClass("blur-wrong");
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
            ready_state = 1;
        }
    })
    //生成验证码函数
    function creatCode() {
        var code = '';
        for (i = 0; i < 4; i++) {
            tmp = Math.ceil(Math.random() * 15); //Math.ceil上取整；Math.random取0-1之间的随机数
            code += tmp.toString(16);   //10进制转换为16进制
        }
        return code;
    }

    //提交表单
    $("#submit").click(function () {
        if ($("#input-username").val() == "") {
            document.getElementById("username-notice").innerHTML = "请输入用户名";
            $("#username-notice").addClass("wrong");
            return false;
        }
        if ($("#input-password").val() == "") {
            document.getElementById("password-notice").innerHTML = "请输入密码";
            $("#password-notice").addClass("wrong");
            return false;
        }
        if ($("#input-checkcode").val() == "") {
            document.getElementById("checkcode-notice").innerHTML = "请输入验证码";
            $("#checkcode-notice").addClass("wrong");
            return false;
        }
        if(ready_state != 1){
            return false;
        }
    })
})