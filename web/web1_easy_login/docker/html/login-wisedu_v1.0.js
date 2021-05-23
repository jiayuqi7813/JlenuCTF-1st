// 这个是设计到登陆操作的统一js
var t;
var pwdDefaultEncryptSalt = "zV1RwfE3oCeKXzWH";
(function ($) {
    $(document).ready(function () {


        // 绑定帐号登录页面 用户名输入框修改事件，判断是否已经填写
        var casLogin_username = $("#casLoginForm").find("#username");
        casLogin_username.bind("change", function () {
            checkRequired($(this), "usernameError");
        });


        // 绑定帐号登录页面 密码输入框修改事件，判断是否已经填写
        var casLogin_password = $("#casLoginForm").find("#password");
        casLogin_password.bind("change", function () {
            checkRequired($(this), "passwordError");
        });

        // 绑定动态码登录页面 用户名输入框修改事件，判断是否已经填写
        $("#casDynamicLoginForm").find("#username").bind("change", function () {
            checkRequired($(this), "dynamicNameError");
        });

        // 绑定动态码登录页面 密码输入框修改事件，判断是否已经填写
        $("#casDynamicLoginForm").find("#dynamicCode").bind("change", function () {
            checkRequired($(this), "dynamicCodeError");
        });

        // 元素聚焦
        if ($("#username").val() != "") {
            $("#password").focus();
        } else {
            $("#username").focus();
        }

        // 帐号登陆提交banding事件
        var casLoginForm = $("#casLoginForm");
        casLoginForm.submit(doLogin);
        function doLogin() {
            var username = casLoginForm.find("#username");
            var password = casLoginForm.find("#password");
            var captchaResponse = casLoginForm.find("#captchaResponse");

            if (!checkRequired(username, "usernameError")) {
                username.focus();
                return false;
            }

            if (!checkRequired(password, "passwordError")) {
                password.focus();
                return false;
            }

            if (!checkRequired(captchaResponse, "cpatchaError")) {
                captchaResponse.focus();
                return false;
            }
            _etd2(password.val(),casLoginForm.find("#pwdDefaultEncryptSalt").val());
        }


        // 动态码登陆提交banding事件
        var casDynamicLoginForm = $("#casDynamicLoginForm");
        casDynamicLoginForm.submit(doDynamicLogin);
        function doDynamicLogin() {
            var username = casDynamicLoginForm.find("#username");
            var dynamicCode = casDynamicLoginForm.find("#dynamicCode");

            if (!checkRequired(username, "dynamicNameError")) {
                username.focus();
                return false;
            }

            if (!checkRequired(dynamicCode, "dynamicCodeError")) {
                dynamicCode.focus();
                return false;
            }
        }

        
        function _etd2(_p0, _p1) {
            try {
                var _p2 = CryptoJS.AES.encrypt(_p0, CryptoJS.enc.Utf8.parse(_p1),{
                    mode: CryptoJS.mode.ECB,
                    padding: CryptoJS.pad.Pkcs7
                  }).toString();   
                $("#casLoginForm").find("#passwordEncrypt").val(_p2);
            } catch(e) {
                $("#casLoginForm").find("#passwordEncrypt").val(_p0);
            }
        }

    });
})(jQuery);

// 统一校验必填和展示错误信息的方法
function checkRequired(obj, msgId) {
    if (obj.length == 0) {
        return true;
    }

    if (obj.val() == "") {
        $("#" + msgId).show();
        return false;
    } else {
        $("#" + msgId).hide();
        return true;
    }
}

function GetQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return null;
}



/**
  * 倒计时函数
  *
  */
var buttonDefaultValue;//记录默认按钮值
function countDownButton(obj, second) {
    if (second == 120) {
        buttonDefaultValue = obj.value;
    }
    // 如果秒数还是大于0，则表示倒计时还没结束
    if (second >= 0) {
        // 按钮置为不可点击状态
        obj.disabled = true;
        // 按钮里的内容呈现倒计时状态
        obj.value = second + "s";
        // 时间减一
        second--;
        // 一秒后重复执行
        setTimeout(function () {
            countDownButton(obj, second);
        }, 1000);
        // 否则，按钮重置为初始状态
    } else {
        // 按钮置未可点击状态
        obj.disabled = false;
        // 按钮里的内容恢复初始状态
        obj.value = buttonDefaultValue;
    }
}

//发送验证码.
