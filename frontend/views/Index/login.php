<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/common.css"/>
<title>登录</title>
</head>

	<!--头部信息-->
    <?php
				include('head.php');
			?>
    <!--头部信息END-->
<body class="loginBody">
<div class="logo">
    <img class="fl" src="images/logo.jpg" width="49" height="37" />
    <span class="logoSpan"></span>
    <span class="wel">欢迎登录</span>
</div>
<div class="loginWrapper">
    <div class="login_wrap clearfix">
    	<div class="imgWrap"><img src="./images/dt.jpg" width="455" height="371" border="0" alt=""></div>
        <form class="loginFrm" method="post" action="index.php?r=index/login_pro">
		
    		<p class="txt_r"></p>
            <div class="frmItem mt15">
            	<p>邮箱/用户名/已验证手机</p>
                <input type="text" id="name_id" class="txt" name='name' />
            </div>
            <div class="frmItem">
            	<p>密码</p>
                <input type="password" id="pwd" class="txt txtPwd" name='pwd'/>
                <span class="pwdIcon"></span>
            </div>
            <div class="frmItem mt50">
            	<input type="checkbox" class="checkBtn" name='auto'/><span>自动登录</span>
                <input type="checkbox" class="checkBtn" /><span>安全控件登录</span>
                <a class="forgetPwd" href="javascript:void(0);">忘记密码？</a>
            </div>
            <div class="frmItem">
				<input class="loginBtn" type="submit" value="登 录" id='sub_id'>  
            </div>
    	</form>
    </div>
</div>
</body>
</html>
