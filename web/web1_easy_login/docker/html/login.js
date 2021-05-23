$(function(){
    // 初始化checkbox事件
    $('#rememberMe').iCheck({
        checkboxClass: 'icheckbox_square-green',
        increaseArea: '20%' // optional
    });

    // 动态码登陆的时候校验和进行倒计时
    $("#casDynamicLoginForm").find("#getDynamicCode").click(function () {
        var username = $("#casDynamicLoginForm").find("#username");

        if (!checkRequired(username, "dynamicNameError")) {
            username.focus();
            return;
        }

        var captchaResponse = $("#casDynamicLoginForm").find("#dynamicCodeCaptchaResponse");
        if (!checkRequired(captchaResponse, "dyCpatchaError")) {
        	captchaResponse.focus();
            return;
        }
        
        var _t = username.val();
      	try{
      		_t = encryptAES(_t,$("#casDynamicLoginForm").find("#dynamicPwdEncryptSalt").val());
      	}catch(e){
      	}

        sendDynamicCodeByPhone(_t, "dynamicCodeType", captchaResponse.val());
    });

    // 绑定选项卡的点击事件
//    $(".auth_tab_content_item[tabid=02]").hide();
    $(".auth_tab_links li").bind("click",function(){
        selectLi($(this));
    });

});

function loadFresh(){
    if(window != window.top){
        // 处理同域名下的reload
        try{
            top.location.reload(true);
        }catch(ignoreErr){
        }
        // 处理跨域情况下的reload
        try{
            window.top.postMessage({type:"loginReload"},'*');
        }catch(ignoreErr){
        }
    }
}

