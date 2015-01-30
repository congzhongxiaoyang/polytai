<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/common.css"/>
<script src="scripts/jq.js"></script>
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
        	<div class="imgWrap"><img src="./images/dt.jpg" width="347" height="347" border="0" alt=""></div>
            <form class="registerFrm" method="post" action="index.php?r=index/register_pro" onsubmit='return check()'>
            	<div class="frmItem">
                	<label class="lbl"><span class="redSpan">*</span>账户名：</label>
                    <input type="text" class="txt" name="name" id="name_id" onblur="ckname()" />
                    <span class="userIcon"></span><span id='sp_name'></span>
                </div>
                <div class="frmItem">
                	<label class="lbl"><span class="redSpan">*</span>请输入密码：</label>
                    <input type="password" onblur="ckpwd()" name="pwd" id="pwd_id" class="txt" />
                    <span class="pwdIcon"></span><span id='sp_pwd'></span>
                </div>
                <div class="frmItem">
                	<label class="lbl"><span class="redSpan">*</span>请输入密码：</label>
                    <input type="password" onblur="ckrepwd()" name="repwd" id="repwd_id" class="txt" />
                    <span class="pwdIcon"></span><span id='sp_repwd'></span>
                </div>
                <div class="frmItem clearfix">
                	<label class="lbl fl"><span class="redSpan">*</span>验证码：</label>
                    <input type="text" name="yzm" class="txt txtTest" />
                    <div class="testImg"><img src="index.php?r=index/captcha" id="verify_img" width=100 height=30/>
</div>
                    <a class="changeTest" href="javascript:void(0);">看不清？<span class="redSpan" onclick="document.getElementById('verify_img').src='index.php?r=index/captcha&count='+Math.random(); return false;">换一张</span></a>
                </div>
                <div class="frmItem">
                	<input type="checkbox" class="checkBtn" id='agree_id'/><label>我已阅读并同意<a class="redSpan" href="javascript:void(0);">《用户注册协议》</a></label>
                </div>
                <div class="frmItem">
						<input class="submitBtn" type="submit" value="立即注册" id='sub_id'>            	
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
<script type="text/javascript">
	function ckname(){	
		var name=$("#name_id").val();
		if(name==""){
			$("#sp_name").html("<font color='red'>&nbsp;不能为空！</font>");
			return false;
		}else {
			$.ajax({			
				url:"index.php?r=index/ck_name",
				dataType:'jsonp',
				type:"get",
				data:{"name":name},
				success:function(e) {
					if(e==1){
						$("#sp_name").html("<font color='red'>&nbsp;用户名已存在！</font>");
						document.getElementById('sub_id').disabled="disabled";
						return false;
					}else {
						$("#sp_name").html("<font color='blue'>&nbsp;用户名正确！</font>");
					}
				}
			});
		}
	}

	function ckpwd(){	
		var pwd=$("#pwd_id").val();
		if(pwd==""){
			$("#sp_pwd").html("<font color='red'>&nbsp;不能为空！</font>");
		}else {
			var middle=/^[0-9a-z]{6,}$/;
			if(pwd.match(middle)) {
				$("#sp_pwd").html("<font color='blue'>&nbsp;格式正确！</font>");	
			}else {
				$("#sp_pwd").html("<font color='red'>&nbsp;格式不正确！</font>");
				return false;
			}
		}
	}

	function ckrepwd(){	
		var pwd=$("#pwd_id").val();
		var repwd=$("#repwd_id").val();
		if(repwd==""){
			$("#sp_repwd").html("<font color='red'>&nbsp;不能为空！</font>");
		}else {
			var middle=/^[0-9a-z]{6,}$/;
			if(pwd.match(middle)) {
				if(pwd==repwd) {
					$("#sp_repwd").html("<font color='blue'>&nbsp;密码匹配！</font>");				
				}else {
					$("#sp_repwd").html("<font color='red'>&nbsp;密码不匹配！</font>");
					return false;
				}
			}else {
				$("#sp_repwd").html("<font color='red'>&nbsp;格式不正确！</font>");
				return false;
			}						
		}
	}

	function check() {
		var agree = $("#agree_id");
		//$("#sub_id").disabled="disabled";
		if(agree.attr('checked')) {
			return true;
		}else {
			alert('您还没有同意我们的协议！');
			return false;
		}

	}
</script>

</body>
</html>

