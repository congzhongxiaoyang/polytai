<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商城详情</title>
<link rel="stylesheet" type="text/css" href="styles/common.css"/>
<script type="text/javascript" src="scripts/jquery1.42.min.js"></script>
<script type="text/javascript" src="scripts/jquery.superslide.2.1.1.js"></script>
</head>

<body>
<div class="wrapper">
	<!-- 头部区域 -->
	<div class="headerWrapper">
    	<div class="header">
        	<!--顶部登录信息-->
        	<div class="site_wrap">
            	<div class="site_con">
                	<span>您好，欢迎来到锡盟鑫泰！</span>
                    <a href="javascript:void(0);">【登录】</a>
                    <a href="javascript:void(0);">【免费注册】</a>
                </div>
            </div>
            <!--顶部登录信息END-->
            <div class="site_title clearfix">
            	<div class="notice_wrap">
                	<span></span>
                </div>
                <div class="logo_wrap fl clearfix">
                	<img class="fl" src="images/logo.jpg" width="49" height="37" />
                    <span></span>
                </div>
            </div>
            <!-- 导航 -->
            <div class="menuWrapper">
            	<div class="menu_wrap clearfix">
                	<div class="addShopping clearfix">
                    	<span>加入购物车</span>
                        <a href="javascript:void(0);"><span class="arrowIcon"></span></a>
                    </div>
                	<div class="allType">
                    	<p>全部分类<span class="arrowIcon"></span></p>
                        <ul class="type_list none">
                        	<li><a href="javascript:void(0);">多肽保健</a></li>
                            <li><a href="javascript:void(0);">多肽美容</a></li>
                            <li class="noBorder"><a href="javascript:void(0);">多肽食品</a></li>
                        </ul>
                    </div>
                	<ul class="menu_list fl clearfix">
                    	<li><a href="javascript:void(0);">多肽保健</a>|</li>
                        <li><a href="javascript:void(0);">多肽美容</a>|</li>
                        <li><a href="javascript:void(0);">多肽食品</a>|</li>
                    </ul>
                </div>
            </div>
            <!-- 导航END -->
        </div>
    </div>
    <!-- 头部区域END -->
    <!-- 内容区域 -->
    <div class="containerWrapper">
    	<div class="container mall_wrap">
        	<!--内容区域-->
            <div>
            	<div class="location clearfix">
                	<a class="go" href="javascript:void(0);">去购物车结算</a>
                    <p>
                    	<a href="javascript:void(0);">鑫泰亿联首页</a>>
                        <a href="javascript:void(0);">多肽美容</a>>
                        <a href="javascript:void(0);">保湿水</a>
                    </p>
                </div>
                <div class="clearfix">
                	<div class="sub_left">
                    	<div class="sl_con">
                        	<ul class="firstList">
                            	<li class="current"><a href="javascript:void(0);"><span class="arrowIcon"></span>类型</a>
                                	<ul class="secList">
                                    	<li class="current"><a href="javascript:void(0);">补水霜</a></li>
                                        <li><a href="javascript:void(0);">洁面乳</a></li>
                                        <li><a href="javascript:void(0);">洁面乳</a></li>
                                        <li><a href="javascript:void(0);">洁面乳</a></li>
                                        <li><a href="javascript:void(0);">洁面乳</a></li>
                                        <li><a href="javascript:void(0);">洁面乳</a></li>
                                        <li><a href="javascript:void(0);">洁面乳</a></li>
                                        <li><a href="javascript:void(0);">洁面乳</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"><span class="arrowIcon"></span>功效</a></li>
                                <li><a href="javascript:void(0);"><span class="arrowIcon"></span>适用人</a></li>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- 右侧 -->
                    <div class="sub_right mb30">
                    	<!---->
                        <div class="detail_wrap clearfix">
                        	<div class="proImg">
                            	<div class="imgWrap"><input type="image" src="<?php echo $data['k_img']?>" width=330 height=330></div>
                                
                            </div>
                            <div class="proIntroduce">
                            	<form>
                            	<p class="proName"><?php echo $data['k_name']?></p>
                                <div class="price_wrap clearfix">
                                	<span class="price">惊爆价：￥<?php echo $data['k_price']?></span>
                                    <div class="price_msg">
                                    	<p><span class="discount">还等什么快来抢购吧</span></p>
                                        <p>(市场价：￥<?php echo $data['g_price']?>)</p>
                                    </div>

                                </div>
								<div>开始时间：<?php echo $data['k_times']?><br>截止时间：<?php echo $data['k_timed']?><br>
								<p class="jiancheng">
					<?php 
							
date_default_timezone_set('PRC');
//date_default_timezone_set("Asia/Hong_Kong");//地区
//配置每天的活动时间段
$starttimestr = $data['k_times'];
$endtimestr = $data['k_timed'];

$starttime = strtotime($starttimestr);
$endtime = strtotime($endtimestr);
$nowtime = time();
if ($nowtime<$starttime){
die("活动还没开始,活动时间是：{$starttimestr}至{$endtimestr}");
}
if ($endtime>=$nowtime){
$lefttime = $endtime-$nowtime; //实际剩下的时间（秒）
 }else{
	 $lefttime=0;
	 $g_id=$data['k_id'];
	 die('<div><a class="buyBtn" href="index.php?r=kill/kill&g_id='.$g_id.'"><span class="carIcon"></span>立即秒杀</a></div>');
}							
							
 ?>	
		
			距离竞拍开始还有 <strong id="RemainD"></strong>天 <strong id="RemainH"></strong>小时 <strong id="RemainM"></strong>分钟 <strong id="RemainS"></strong>.<strong id="RemainL"></strong>秒	
							
							</p>
								</div>
                                <div>
                                	<a class="buyBtn" href="javascript:void(0);"><span class="carIcon"></span>立即秒杀</a>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!--END-->

                      
                    </div>
                    <!-- 右侧 END-->
                </div>
            </div>
            <!--内容区域-->
            <!-- 底部区域 -->
            <div class="footerWrapper">
                <div class="footer">
                	<p><a class="returnHome" href="index.php?r=index/index">
                    	<span class="btn_l"></span>
                    	<span class="btn_c">回首页 HOME</span>
                    	<span class="btn_r"></span>
                    </a>
                    </p>
                    <p class="call">400-000-88888</p>
                    <p>锡盟鑫泰生物制品有限责任公司 版权所有</p>
                    <p>锡盟鑫泰生物是亚洲最大最专业骨髓肽生产商，颐宁多肽是国内首例多肽保健品！</p>
                    <p>www.xmxtsw.com</p>
                </div>
            </div>
            <!-- 底部区域END -->
            <!--跟随窗口浮动区域-->
            <div class="fixedWrap" id="fixedWrap">
                <a href="javascript:void(0);">
                	<div class="imgWrap">
                    	<img src="images/fix_icon_1.png" width="21" height="27" />
                    </div>
                	<p>返回顶部</p>
                </a>
                <a href="javascript:void(0);">
                	<div class="imgWrap">

                    	<img class="mt5" src="images/fix_icon_2.png" width="27" height="22" />
                    </div>
                	<p>购物车</p>
                </a>
                <a href="javascript:void(0);">
                	<div class="imgWrap">
                    	<img class="mt5" src="images/fix_icon_3.png" width="24" height="19" />
                    </div>
                	<p>收藏夹</p>
                </a>
                <a href="javascript:void(0);">
                	<div class="imgWrap">
                    	<img src="images/fix_icon_4.png" width="28" height="26" />
                    </div>
                	<p>联系客服</p>
                </a>
            </div>
            <!--跟随窗口浮动区域-->
        </div>
    </div>
    <!-- 内容区域END -->
</div>
</body>
</html>
<script language="JavaScript">
function miao(){
	
}
var runtimes = 0;
function GetRTime(){

var nMS = <?php echo $lefttime; ?>*1000-runtimes*1000;

if (nMS>=0){
var nD=Math.floor(nMS/(1000*60*60*24))%24;
var nH=Math.floor(nMS/(1000*60*60))%24;
var nM=Math.floor(nMS/(1000*60)) % 60;
var nS=Math.floor(nMS/1000) % 60;

document.getElementById("RemainD").innerHTML=nD;
document.getElementById("RemainH").innerHTML=nH;
document.getElementById("RemainM").innerHTML=nM;
document.getElementById("RemainS").innerHTML=nS;
if(nMS==5*60*1000)
{
alert("还有最后五分钟！");
}
runtimes++;
setTimeout("GetRTime()",1000);
}
}
var Num = 0;
onload = function() {
 Refresh();
 setInterval("Refresh();",100);
 GetRTime();
}
function Refresh() {
 if (Num<10){
 document.getElementById("RemainL").innerHTML = Num;
 Num = Num + 1;
 }else{
 Num=0;
 }
}
</script>