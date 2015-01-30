<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="./resource/css/login.css" />
	<script type="text/javascript" src="./resource/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./resource/js/login.js"></script>
	<title></title>
</head>
<body>
	<div id="divBox">
		<form action="" method="POST" id="login">
			<input type="text" id="userName" name="userName"/>
			<input type="password" id="psd" name="psd"/>
			<input type="" value="" id="verify" name="verify"/>
			<input type="button" id="sub" value="" onclick="login()"/>
			<!-- 验证码 -->
			<img src="index.php?r=login/captcha" id="verify_img" width=100 height=30/>

		</form>
		<div class="four_bj">
			
			<p class="f_lt"></p>
			<p class="f_rt"></p>
			<p class="f_lb"></p>
			<p class="f_rb"></p>
		</div>

		<ul id="peo">
			
		</ul>
		<ul id="psd">
			
		</ul>
		<ul id="ver">
			
		</ul>
	</div>
	<script type="text/javascript">
	<!--
		function login(){
			var name=$("#userName").val();
			var pwd=$("#psd").val();
			//var verify=$("#verify").val();
			$.ajax({
				   type: "GET",
				   url: "index.php?r=login/loginpro",
				   data: {"name":name,"pwd":pwd},
				   success: function(msg){
					   //alert(msg);

					   if(msg==0){
							alert("用户名错误");
					   }
					   if(msg==1){
							alert("密码错误");
					   }
					   if(msg==2){
							location.href="index.php?r=admin/index";
					   }
				   }
			});
		}

	//-->
	</script>

</body>
</html>