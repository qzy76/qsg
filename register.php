<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>用户注册_轻松购</title>
	<link rel="icon" href="img/nhic.ico" type="image/x-icon">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/iconfont.css">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div id="ajax-hook"></div>
    <div class="wrap">
        <div class="wpn">
            <div class="form-data pos register">
                <a href=""><img src="img/logo2.png" class="head-logo"></a>
                <form action="adduser.php" method="post">
                    <p class="p-input pos">
                        <input type="text" id="num" name="uname" placeholder="用户名">
                    <span class="tel-warn num-err hide"><em></em><i class="icon-warn"></i></span>
                    </p>
                    <p class="p-input pos" id="pwd">
                        <input type="password" style="display: none"/>
                        <input type="password" name="upwd" id="pass" placeholder="输入密码">
                        <span class="tel-warn pwd-err hide"><em></em><i class="icon-warn" style="margin-left: 5px"></i></span>
                    </p>
                    <p class="p-input pos" id="confirmpwd">
                        <input type="password" style="display: none;"/>
                        <input type="password" name="Rupwd" id="pass2"  placeholder="再次输入密码">
                        <span class="tel-warn confirmpwd-err hide"><em></em><i class="icon-warn" style="margin-left: 5px"></i></span>
                    </p>
                     <p class="p-input pos code">
                    <input type="text" id="veri" name="checkno" class="checkno" placeholder="请输入验证码">
                    <img src="checkno.php" alt="验证码"
                    onclick="this.src='checkno.php?t='+Math.random()"/>
                    <span class="tel-warn num-err tel-veri hide"><em></em><i class="icon-warn"></i></span>
                </p>
                <div class="reg_checkboxline pos">
                    <span class="z"><i class="icon-ok-sign boxcol"></i></span>
                    <input type="hidden" name="agree" value="1">
                    <div class="Validform_checktip"></div>
                    <p>我已阅读并接受 <a href="#" target="_brack">《轻松购协议说明》</a></p>
                </div>
                <button type="button" class="lang-btn log-btn off">注册</button>
                <div class="bottom-info">已有账号，<a href="login.php">马上登录</a></div>
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
    <script src="js/login.js"></script>
    <script src="js/register.js"></script>
</body>
</html>