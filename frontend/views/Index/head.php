<!--顶部登录信息-->
        	<div class="site_wrap">
            	<div class="site_con">          	 
					<?php if(@$info) {												
							echo "<span><font color='red'>".$info."</font>&nbsp;&nbsp;您好，欢迎来到锡盟鑫泰！</span><div style='float:right'><a href='index.php?r=index/ucenter'>【个人中心】</a>
							<a href='index.php?r=index/logout'>【退出】</a></div>";
						}else {
							echo "<span>您好，欢迎来到锡盟鑫泰！</span><div style='float:right'><a href='index.php?r=index/login'>【登录】</a>
							<a href='index.php?r=index/register'>【免费注册】</a></div>";
						}
					?>
                </div>
            </div>
            <!--顶部登录信息END-->	