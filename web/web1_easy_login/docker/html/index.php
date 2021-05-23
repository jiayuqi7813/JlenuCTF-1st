
<!DOCTYPE html>
<?php 

$un=$_POST["username"];
$pd=$_POST["password"];
if(isset($un)&&isset($pd))
{
    if ($un=="1927034131") {
        
        if ($pd=="Ztlzt4NA6Za9ByhRnr1V3Q==") {
            die('JlenuCTF{wow_Y0u_GOT_MY_passw0rd}');
            exit(0);
        }
        echo("密码错误！！");
        exit(0);
    }
    echo("帐号错误！");
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="width=device-width,initial-scale=0.8, minimum-scale=0.8, maximum-scale=3"
          name="viewport"/>
    <meta name="renderer" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta property="qc:admins" content="754034015366713545637571540352652"/>
    <meta property="wb:webmaster" content="1ad39047f32b5b6b"/>
    <title>统一身份认证</title>
</head>
<script>
    

</script>



<link href="http://ids.jlenu.edu.cn/authserver/custom/css/login.css" rel="stylesheet">
<link href="http://ids.jlenu.edu.cn/authserver/custom/css/iCheck/custom.css" rel="stylesheet">
<script type="text/javascript">
    var secure = "false";
    var pwdDefaultEncryptSalt = "zV1RwfE3oCeKXzWH";
</script>

<body onload="loadFresh();">
<div class="auth_bg">
    <img src="http://ids.jlenu.edu.cn/authserver/custom/images/login-bg-autumn.jpg" alt="">
</div>
<div class="auth-language">Language:
    <div class="auth-language-select">
        <select id="language" onchange="changeLanguage()">
            <option value="zh_CN">简体中文</option>
            <option value="en">English</option>
        </select>
    </div>
</div>
<div class="auth_page_wrapper">
<div class="auth_logo">
    <img src="http://ids.jlenu.edu.cn/authserver/custom/images/login-logo.png" alt="logo"/>
</div>
<div class="auth_login_content">
    <div class="auth_login_left">
        <div class="auth_others">
            
        </div>
    </div>
    
        
        
        
            
        
    
    <div class="auth_login_right">
        <div class="auth_tab">
            <div class="auth_tab_links">
                <ul>
                    <li id="accountLogin" style="width:50%;" class="selected" tabid="01"><span>账号登录</span></li>
                    
                    
                        <li style="width:50%;" id="qrLogin" tabid="03" class="qrLogin"><i></i><span>扫码登录</span></li>
                    
                </ul>
            </div>
            <div class="clearfloat"></div>
            <div class="auth_tab_content">
                <div tabid="01" class="auth_tab_content_item">
                    <form id="casLoginForm" class="fm-v clearfix amp-login-form" role="form" action="" method="post">
                        

                        <p>
                            <i class="auth_icon auth_icon_user"></i>
                            <input id="username" name="username" placeholder="用户名" class="auth_input" type="text" value=""/>
                            <span id="usernameError" style="display:none;" class="auth_error">请输入用户名</span>
                        </p>

                        <p>
                            <i class="auth_icon auth_icon_pwd"></i>
                            <input id="password" placeholder="密码" class="auth_input" type="password" value="" autocomplete="off"/>
                            <input id="passwordEncrypt" name="password" style="display:none;" type="text" value=""/>
                            <span id="passwordError" style="display:none;" class="auth_error">请输入密码</span>
                        </p>

                        <p id="cpatchaDiv">

                        </p>

                        
                            <p>
                                <input type="checkbox" name="rememberMe" id="rememberMe"/> <label
                                    onmousedown="javascript:$('.iCheck-helper').click();">一周内免登录</label>
                            </p>
                        

                        <p>
                            <button type="submit" class="auth_login_btn primary full_width">登录
                            </button>
                        </p>
                        <a id="getBackPasswordMainPage" href="#" class="auth_login_forgetp">
                            <small>忘记密码？</small>
                        </a>

                        <input type="hidden" name="lt" value="LT-516751-AckPrSCIXRIuD1qcMZdTaFp01b4St01619267395181-fjDw-cas"/>
                        <input type="hidden" name="dllt" value="userNamePasswordLogin"/>
                        <input type="hidden" name="execution" value="e1s1"/>
                        <input type="hidden" name="_eventId" value="submit"/>
                        <input type="hidden" name="rmShown" value="1">
						<input type="hidden" id="pwdDefaultEncryptSalt" value="zV1RwfE3oCeKXzWH"/>
                    </form>
                </div>
                
                
                    <div tabid="03" class="auth_tab_content_item" style="display:none;">
                        







<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="renderer" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
          charset="UTF-8">
    <title>扫码登录</title>
    <link href="http://ids.jlenu.edu.cn/authserver/custom/css/qrcode-basic.css" rel="stylesheet">
    <!--[if IE 8]>
    <style>
        .qr_scan_box {
            margin: 0;
            background: #E3E3E3;
        }
    </style>
    <![endif]-->
</head>
<body class="qr_scan_box">
    <form id="qrLoginForm" role="form" action="#" method="post">
        
        <div id="qr_code" class="login--scan_box--scan">
            <div class="login--scan_pic scan_code_pic">
                <img id="qr_img" src="ll.png" width="186"/>
            </div>
        </div>
        <div id="qr_success" class="success--scan_box--success" style="display:none;">
            <div class="success--scan_box--succes--">
                <div class="success--scan_box">
                    <div class="success--scan_pic">
                        <img alt="" src="http://ids.jlenu.edu.cn/authserver/custom/images/Success.png" width="36" class="success--scan_success_img"/>
                        <span class="success--title success--title_h1">扫描成功</span>
                        <span class="success--sub_title">请在手机上『确认登录』</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="qr_invalid" class="refresh--scan_code--refresh--box" style="display:none;">
            <div class="refresh--scan_pic refresh--scan_code_pic refresh--scan_code_refresh">
                <img id="invalid_img" src="index.html" width="200"/>
                <div class="refresh--scan_Invalid">
                    <img  id="qr_basic_refresh" width="58" alt="" src="#" class="refresh--scan_invalid_icon"/>
                </div>
            </div>
        </div>

        <input type="hidden" name="lt" value="LT-516751-AckPrSCIXRIuD1qcMZdTaFp01b4St01619267395181-fjDw-cas"/>
        <input type="hidden" name="uuid" id="uuid" value=""/>
        <input type="hidden" name="dllt" value="qrLogin"/>
        <input type="hidden" name="execution" value="e1s1"/>
        <input type="hidden" name="_eventId" value="submit"/>
        <input type="hidden" name="rmShown" value="1">
    </form>
</body>
</html>
<script type="text/javascript">
    var contextPath = "/authserver";
</script>
<script type="text/javascript" src="http://ids.jlenu.edu.cn/authserver/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://ids.jlenu.edu.cn/authserver/custom/js/qrcode.js"></script>
<script type="text/javascript">
    $(function () {
//        getQrCode();
//        countDown();
    });
    $("#qr_basic_refresh").bind("click", function () {
        getQrCode($("#uuid").val());
        countDown();
        $("#qr_code").show();
        $("#qr_invalid").hide();
    });
</script>
                    </div>
                
                
            </div>
        </div>
    </div>
</div>

<div class="clearfloat"></div>
<div class="auth_login_footer">
    

 <span>
     Copyright&nbsp;©&nbsp;2015 wisedu&nbsp;All&nbsp;Rights&nbsp;Reserved&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;魔法少女的奇妙官网
 </span>

</div>
</div>

<script type="text/javascript" src="http://ids.jlenu.edu.cn/authserver/custom/js/jquery.min.js"></script>
<script type="text/javascript" src="http://ids.jlenu.edu.cn/authserver/custom/js/login-language.js"></script>
<script type="text/javascript" src="http://ids.jlenu.edu.cn/authserver/custom/js/icheck.min.js"></script>

<script type="text/javascript" src="/login.js"></script>
<script type="text/javascript" src="/login-wisedu_v1.0.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>


</body>

</html>
