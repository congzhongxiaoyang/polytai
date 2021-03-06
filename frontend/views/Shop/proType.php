<?php 
header("content-type:text/html;charset=utf-8");
use yii\widgets\LinkPager;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商城分类页</title>
<link rel="stylesheet" type="text/css" href="styles/common.css"/>
<script type="text/javascript" src="scripts/jquery1.42.min.js"></script>
<script type="text/javascript" src="scripts/jquery.superslide.2.1.1.js"></script>
</head>
<style>
.page{float:right;}
.page li{float:left;}
</style>
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
    	<div class="container">
        	<!--内容区域-->
            <div>
            	<div class="location clearfix">
                	<a class="go" href="index.php?r=cart/shoppingcar">去购物车结算</a>
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
                                    	<?php foreach($fen as $k=>$v){?>

                                        <li><a href="javascript:void(0);"><?php echo $v['cat_name'];?></a></li>
                                       <?php }?>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"><span class="arrowIcon"></span>功效</a></li>
                                <li><a href="javascript:void(0);"><span class="arrowIcon"></span>适用人</a></li>
                            </ul>
                        </div>
                        <!---->
                        <div class="sl_con mt10">
                        	<p class="title">热卖产品</p>
                        	<ul class="sl_list">
							 <?php foreach($list as $k=>$v){
								  ?>
                            	<li>
                                	<a href="javascript:void(0);">
                                		<div class="imgWrap"><img src="<?php echo $v['goods_thumb'];?>" width=125 height=125/></div>
                                        <p><?php echo $v['goods_name'];?></p>
                                        <p class="price"><span>￥<?php echo $v['shop_price'];?></span></p>
                                    </a>
                                </li>
                                <?php }
									?>
                            </ul>
                        </div>
                        <!--END-->
                        <!---->
                        <div class="sl_con mt10">
                        	<p class="title">浏览记录</p>
                        	<ul class="sl_list">
                            	<li>
                                	<a href="javascript:void(0);">
                                		<div class="imgWrap"></div>
                                        <p>鑫泰亿联鑫泰亿联鑫泰亿联鑫泰亿联鑫泰亿联鑫泰亿联</p>
                                        <p class="price"><span>￥2555.00</span></p>
                                    </a>
                                </li>
                                <li>
                                	<a href="javascript:void(0);">
                                		<div class="imgWrap"></div>
                                        <p>鑫泰亿联鑫泰亿联鑫泰亿联鑫泰亿联鑫泰亿联鑫泰亿联</p>
                                        <p class="price"><span>￥2555.00</span></p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--END-->
                    </div>

		
          
                    <div class="sub_right">
                    	<!---->
                        <div class="sr_con">
                        	<p class="title">热卖推荐</p>
                            <!--轮播效果-->
                            <div class="scroll_wrap">
                              <div class="picScroll-left">
                                <div class="hd">
                                    <ul></ul>
                                </div>
                                <div class="bd">
                                  <ul class="hotWrap clearfix">
								  <?php foreach($list as $k=>$v){
								  ?>
                                      <li>
                                          <div class="clearfix">
                                              <div class="imgWrap"><img src="<?php echo $v['goods_thumb'];?>" width=145 height=145/></div>
                                              <div class="pro">
                                                  <p class="proName"><?php echo $v['goods_name'];?></p>
                                                  <p class="price">特价：<span class="redSpan">￥<?php echo $v['shop_price'];?></span></p>
                                                  <a class="btn" href="javascript:void(0);">立即抢购</a>
                                              </div>
                                          </div>
                                      </li>
                                    <?php }
									?>
                                     
                                  </ul>
                                </div> 
                                <a href="javascript:void(0);" class="prev" id="idPre"></a>
                                <a href="javascript:void(0);" class="next" id="idNext"></a>                           
                              </div>
                            </div>
                      
                            <!--轮播效果END-->
                            <p class="title">补水霜>商品筛选</p>
                            <!---->
                            <div class="search_wrap">
                              <div class="searchMsg clearfix">
                                  <div class="page fr">
                                       共<span class="redSpan"><?php echo $count;?></span>个产品<span class="d4ColorTxt"> | </span>
                                 <?= LinkPager::widget(['pagination' => $pagination]); ?>
                                  </div>
                                  <div class="sort fl">
                                      排序：
                                	<a href="javascript:void(0);">销量</a>
                                    <a href="javascript:void(0);">收藏人气</a>
                                    <a href="javascript:void(0);">评论数</a>
                                  </div>
                              </div>
                              <div class="result_wrap">
                              	<ul class="clearfix">
								<?php foreach($data as $k=>$v){?>
                                	<li>
                                    	<div class="imgWrap"><img src="<?php echo $v['goods_img'];?>" width=250 height=250/></div>
                                        <p class="proName"><a href="index.php?r=shop/mall&gid=<?php echo $v['goods_id'];?>"><?php echo $v['goods_name'];?></a></p>
                                        <p><span class="appraise">已有<?php echo $comment;?>人评价</span>
                                        	<span class="price">￥<?php echo $v['shop_price'];?></span>
                                        </p>
                                        <p class="clearfix">
                                        	<a class="btn fr" href="javascript:void(0);">收藏</a>
                                            <a class="btn fl" href="javascript:void(0);">加入购物车</a>
                                        </p>
                                    </li>
                                   <?php }?>
                                </ul>
                                <div class="pageWrap">
                                  共<span class="redSpan"><?php echo $count;?></span>个产品<span class="d4ColorTxt"> | </span>
                                 <?= LinkPager::widget(['pagination' => $pagination]); ?>
                                </div>
                              </div>
                            </div>
                            <!--END-->
                        </div>
                        <!--END-->
                    </div>
                </div>
            </div>
            <!--内容区域-->
				 <!-- 底部区域 -->
            <div class="footerWrapper">
                <div class="footer">
                	<p><a class="returnHome" href="javascript:void(0);">
                    	<span class="btn_l"></span>
                    	<span class="btn_c">回首页 HOME</span>
                    	<span class="btn_r"></span>
                    </a>
                    </p>
                    <p class="call">400-625-2655</p>
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
<script type="text/javascript" src="scripts/common.js"></script>
<script type="text/javascript">
	if($(".hotWrap li").size()>2){
		$(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"leftLoop",vis:2});
	}
</script>
</body>
</html>
           