<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>用户登录_轻松购</title>
	<link rel="icon" href="img/nhic.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/iconfont.css">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<div id="ajax-hook"></div>
<div class="wrap">
    <div class="wpn">
        <form action="checkuser.php" method="post">
        <div class="form-data pos">
            <a href=""><img src="img/logo2.png" class="head-logo"></a>
            <div class="change-login">
                <p class="account_number on">账号登录</p>
            </div>
            <div class="form1">
                <p class="p-input pos">
                    <input type="text" id="num" name="uname" placeholder="手机号/用户名/邮箱">
                    <span class="tel-warn num-err hide"><em></em><i class="icon-warn"></i></span>
                </p>
                <p class="p-input pos">
                    <input type="password" style="display:none"/>
                    <input type="password" name="upwd" id="pass" id="pass2" autocomplete="new-password" placeholder="请输入密码">
                    <span class="tel-warn num-err hide"><em></em><i class="icon-warn"></i></span>
                </p>
                <p class="p-input pos code">
                    <input type="text" id="veri" name="checkno" class="checkno" placeholder="请输入验证码">
					<img src="checkno.php" alt="验证码"
					onclick="this.src='checkno.php?t='+Math.random()"/>
                    <span class="tel-warn num-err tel-veri hide"><em></em><i class="icon-warn"></i></span>
                </p>
            </div>
            <div class="r-forget cl">
                <a href="register.php" class="z">账号注册</a>
                <a href="getpass.php" class="y">忘记密码</a>
            </div>
            <button type="button" class="lang-btn off log-btn">登录</button>

            </form>
            <div class="third-party">
                    <a href="javascript:;" class="log-qq icon-qq-round"></a>
                    <a href="javascript:;" class="log-qq icon-weixin"></a>
                    <a href="javascript:;" class="log-qq icon-sina1"></a>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/function.js"></script>
<script>
    function check(){//数据格式没问题时恢复按钮作用
        if($('#num').val().length>=3&&$('#pass').val().length>=6&&$('#veri').val().length==4){
            $('.log-btn').removeClass('off');
            $('button').attr("type","submit");
        }else{
            $('.log-btn').addClass('off');
            $('button').attr("type","button");
        };
    }
</script>
<script src="js/login.js"></script>
</body>
</html>