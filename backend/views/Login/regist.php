<h2 class="letter_spacing">注册</h2>
<form action='' method='post'>
<div>
<div class="wrapper">
<span>用&nbsp;&nbsp;户&nbsp;&nbsp;名:</span>
<input type="text" class="input" name='username' id='username' onblur="check_name();" >
<span id='rs_username' class='span'></span>
</div>
<div class="wrapper">
<span>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</span>
<input type="text" class="input" name='password' id='password' onblur='check_pwd()'>
<span id='rs_pwd' class='span'>
</div>
<div class="wrapper">
<span>确认密码:</span>
<input type="text" class="input" name='repassword' id ='repassword' onblur='check_pwd_s()' >
<span id='rs_pwd_s' class='span'>
</div>

<a><input type='reset' class='button1' value='重置'></a>
<a><input type='button' onclick="zhuce()" class='button1' value='提交'></a>
</div>
</form>
	<script type="text/javascript" src="./resource/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript">
<!--
function zhuce(){
	//alert(1)
	var name=$("#username").val();
	var pwd=$("#password").val();
	var repwd=$("#repassword").val();
	 $.ajax({
		   type: "GET",
		   url: "index.php?r=login/registpro",
		   data: {"name":name,"pwd":pwd,"repwd":repwd},
		   success: function(msg){
			  // alert(msg);

			   if(msg==0){
					alert("用户名不唯一");
			   }
			   if(msg==1){
					alert("密码不一致");
			   }
			   if(msg==2){
					location.href="login.html";
			   }
		   }
	});
}
//-->
</script>
