<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>后盾网HDPHP博客后台管理首页</title>
	<link rel="stylesheet" href="./resource/css/admin.css" />
	<script type="text/javascript" src="./resource/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./resource/js/admin.js"></script>
<!-- 默认打开目标 -->
<base target="iframe"/>
</head>
<body>
<!-- 头部 -->
	<div id="top_box">
		<div id="top">
			<p id="top_font">HDPHP博客后台管理首页 （V1.1）</p>
		</div>
		<div class="top_bar">
			<p class="adm">
				<span>管理员：</span>
				<span class="adm_pic">&nbsp&nbsp&nbsp&nbsp</span>
				<span class="adm_people">[houdunwang]</span>
			</p>
			<p class="now_time">
				今天是：2013.7.13 
				您的当前位置是：
				<span>首页</span>
			</p>
			<p class="out">
				<span class="out_bg">&nbsp&nbsp&nbsp&nbsp</span>&nbsp
				<a href="" target="_self">退出</a>
			</p>
		</div>
	</div>
<!-- 左侧菜单 -->
		<div id="left_box">
			<p class="use">常用菜单</p>
			<div class="menu_box">
				<h2>前台首页</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="" class="pos">前台首页</a>				        	
				        </li> 
				    </ul>
				
				</div>
			</div>

			<div class="menu_box">
				<h2>商品管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="index.php?r=goods/goods_add" class="pos">添加商品</a>				        	
				        </li> 
				    </ul>  

				    <ul class="con">
				        <li class="nav_u">
				        	<a href="index.php?r=goods/goods_list" class="pos">商品列表</a>    	
				        </li> 
				    </ul> 

					 <ul class="con">
				        <li class="nav_u">
				        	<a href="index.php?r=goods/goods_recycle" class="pos">回收站</a>    	
				        </li> 
				    </ul>
					
				</div>
			</div>

			<div class="menu_box">
				<h2>分类管理</h2>
				<div class="text">
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="index.php?r=category/category_add" class="pos">添加分类</a>				        	
				        </li> 
				    </ul> 

					<ul class="con">
				        <li class="nav_u">
				        	<a href="index.php?r=category/category_list" class="pos">分类列表</a>    	
				        </li> 
				    </ul>
				</div>
			</div>

			<div class="menu_box">
				<h2>订单管理</h2>
				<div class="text">
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="index.php?r=admin/order_list" class="pos">订单列表</a>				        	
				        </li> 
				    </ul> 

					<ul class="con">
				        <li class="nav_u">
				        	<a href="index.php?r=admin/goods_comment" class="pos">评论列表</a>    	
				        </li> 
				    </ul>
				</div>
			</div>

			<div class="menu_box">
				<h2>秒杀管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="index.php?r=admin/miaosha_add" class="pos">添加秒杀</a>				        	
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="index.php?r=admin/miaosha_list" class="pos">秒杀列表</a>				        	
				        </li> 
				    </ul>
				
				</div>
			</div>

			<div class="menu_box">
				<h2>竞拍管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="index.php?r=admin/jingpai_add" class="pos">添加竞拍</a>				        	
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="index.php?r=admin/jingpai_list" class="pos">竞拍列表</a>				        	
				        </li> 
				    </ul>
				
				</div>
			</div>

			
			 <div class="menu_box">
				<h2>系统管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="index.php?r=admin/copy" class="pos">系统信息</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="" class="pos">密码修改</a>				        	
				        </li> 
				    </ul>
				
				</div>
			</div>			
		</div>
		<!-- 右侧 -->
		<div id="right">
			<iframe  frameboder="0" border="0" 	scrolling="yes" name="iframe" src=""></iframe>
		</div>
	<!-- 底部 -->
	<div id="foot_box">
		<div class="foot">
			<p>@Copyright © 2013-2013 houdunwang.com All Rights Reserved. 京ICP备0000000号</p>
		</div>
	</div>

</body>
</html>
<!--[if IE 6]>
    <script type="text/javascript" src="./js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.adm_pic, #left_box .pos, .span_server, .span_people', 'background');
    </script>
<![endif]-->
