<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/common.css"/>
<title>注册</title>
</head>

<body class="registerBody">
<div class="wrapper">
	<!--头部信息-->
    <?php
				include('head.php');
			?>
    <!--头部信息END-->
    <!--logo-->
    <div class="logo">
      <img class="fl" src="images/logo.jpg" width="49" height="37" />
      <span class="logoSpan"></span>
      <span class="wel">欢迎注册</span>
  	</div>
    <!--logo END-->
    <!--注册信息-->
    <div class="register_wrap">
    	<p class="title">注册信息</p>
        <div class="register_panel clearfix">
        	<div class="imgWrap"></div>
            <form class="registerFrm" method="post" action="index.php?r=index/register_do">
            	<div class="frmItem">
                	<label class="lbl"><span class="redSpan">*</span>账户名：</label>
                    <input type="text" class="txt" onblur="checkname()" name="name" id="name" value="邮箱/用户名/已验证手机" />
                    <span class="userIcon"></span>
                </div>
                <div class="frmItem">
                	<label class="lbl"><span class="redSpan">*</span>请输入密码：</label>
                    <input type="password" onblur="checkpwd()" name="pwd" id="pwd" class="txt" />
                    <span class="pwdIcon"></span>
                </div>
                <div class="frmItem">
                	<label class="lbl"><span class="redSpan">*</span>请输入密码：</label>
                    <input type="password" onblur="checkrepwd()" name="repwd" id="repwd" class="txt" />
                    <span class="pwdIcon"></span>
                </div>
                <div class="frmItem clearfix">
                	<label class="lbl fl"><span class="redSpan">*</span>验证码：</label>
                    <input type="text" name="yzm" class="txt txtTest" />
                    <div class="testImg"><img src="index.php?r=index/captcha" id="verify_img" width=100 height=30/>
</div>
                    <a class="changeTest" href="javascript:void(0);">看不清？<span class="redSpan">换一张</span></a>
                </div>
                <div class="frmItem">
                	<input type="checkbox" value="1" class="checkBtn" /><label>我已阅读并同意<a class="redSpan" href="javascript:void(0);">《用户注册协议》</a></label>
                </div>
                <div class="frmItem">
						<input class="submitBtn" type="submit" value="立即注册">
                	
                </div>
            </form>
        </div>
    </div>
    <!--注册信息END-->
    <!-- 底部区域 -->
    <div class="footerWrapper">
        <div class="footer">
            <p class="call">400-625-2655</p>
            <p>锡盟鑫泰生物制品有限责任公司 版权所有</p>
            <p>锡盟鑫泰生物是亚洲最大最专业骨髓肽生产商，颐宁多肽是国内首例多肽保健品！</p>
            <p>www.xmxtsw.com</p>
        </div>
    </div>
    <!-- 底部区域END -->
</div>
</body>
</html>
<script src="scripts/Jquery.js"></script>
<script>
	function checkname(){
		
		var name=$('#name').val();
		
		var i=0;
		var a = name.split(""); 
		for (var i=0;i<a.length;i++) { 
	if (a[i].charCodeAt(0)<299){ 
		i++; 
	} else { 
		i+=2; 
	}
	
}
var aa=name.substr(name.length-3);


if(i=='0'){
	alert("用户名不能为空！！！")
		return false;
}else if(i<6||i>13&&i<15||i>22){
	if(!(/^[\w\W]{6,10}$/.test(name))){
		alert("用户名长度不能低于6位大于10位！！！");
		return false;
	}
}else if(i==12){
	
	if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(name))){
		alert("请输入正确的手机号！！！");
	}
}else if(aa=='com'){
	
	if(!(/^\+?[a-z0-9](([-+.]|[_]+)?[a-z0-9]+)*@([a-z0-9]+(\.|\-))+[a-z]{2,6}$/.test(name))){
		alert("请输入正确的邮箱！！！");
	}
}
$.ajax({
			   type: "GET",
			   url: "index.php?r=index/check",
			   data: {"name":name},
			  success: function(msg){
				  	if(msg==1){
						alert("用户名已存在！！！");
					}else{
						alert("可以使用");
					}
				}
			});

}
function checkpwd(){
	var pwd=$('#pwd').val();
	if(!(/^[\w\W]{6,10}$/.test(pwd))){
		alert("密码长度不能低于6位！！！");
		return false;
	}
}
function checkrepwd(){
	var pwd=$('#pwd').val();
	var repwd=$('#repwd').val();
	if(pwd==repwd){
		alert("两次输入密码一样");
	}else{
		alert("两次输入密码不同");
	}
}
</script>
