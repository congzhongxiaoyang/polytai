<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的购物车</title>
<link rel="stylesheet" type="text/css" href="styles/common.css"/>
<script type="text/javascript" src="scripts/jquery1.42.min.js"></script>
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
    	<div class="container">
        	<!--内容区域-->
            <div class="shopping_wrap">
            	<div class="title clearfix">
                	<p class="fr">
                    	<a class="current" href="javascript:void(0);">我的购物车</a>>
                        <a href="javascript:void(0);">填写核对订单信息</a>>
                        <a href="javascript:void(0);">支付信息</a>>
                        <a href="javascript:void(0);">交易成功</a>
                    </p>
                	<span class="fl">我的购物车</span>
                </div>
                <div class="shoppingTab">
                	<form method="post" action="index.php?r=cart/ordera">
                	<table>
                    	<tr class="title">
                        	<td class="width55"><input class="checkBtn" type="checkbox" />全选</td>
                            <td class="width290">产品</td>
                            <td>价格</td>
                            <td>库存</td>
                            <td>优惠</td>
                            <td>数量</td>
                            <td>操作</td>
                        </tr>
						<?php foreach($data as $k=>$v){?>
                        <tr>
                        	<td><input class="checkBtn" type="checkbox" /></td>
                            <td>
                            	<div class="pro_msg clearfix">
                                	<div class="imgWrap"></div>
                                    <a class="proName" href="javascript:void(0);"><?php echo $v['goods_name'];?></a>
									
                                </div>
                                <div class="give_wrap">
                                  <p>【赠品】多肽保健礼盒</p>
                                  <p>【赠品】多肽保健礼盒</p>
                                </div>
                            </td>
                            <td><span>￥<?php echo $v['price'];?></span>
							<?php if($v['is_promote']==1){?>
							<span class="cuIcon"></span><span class="giveIcon"></span>
							<?php
							}else{?>
							<span class="giveIcon"></span>
							<?php }?>
							</td>
                            <td><span>有货</span></td>
                            <td>
                            </td>
							<input type="hidden" name="gid" id="gid<?php echo $v['goods_id'];?>" value="<?php echo $v['goods_id'];?>">
                            <td>
                              <div class="num clearfix">
                                <a onclick="minus(<?php echo $v['goods_id'];?>)">-</a>
                                <input type="text" class="txt" id="num<?php echo $v['goods_id'];?>" value="<?php echo $v['number'];?>" />
                                <a onclick="plus(<?php echo $v['goods_id'];?>)">+</a>
                              </div>
                            </td>
                            <td><a class="deleteBtn" onclick="del(<?php echo $v['id'];?>)">删除</a></td>
                        </tr>
						<input type="hidden" name="goods_name" value="<?php echo $v['goods_name'];?>">
                       <?php }?>
                       
                    </table>
                    
                </div>
                <div class="discount_wrap">
                  <table class="moneyTable">
                    <tr>
                        <td class="txt_l"><a href="javascript:void(0);"><span class="subIcon"></span>使用优惠券抵部分总额</a></td>
                        <td><span>共<?php echo $cc;?>件商品，总金额：</span></td>
                        <td><span>￥<?php echo $total;?></span></td>
                    </tr>
                    <tr>
                        <td class="txt_l"><a href="javascript:void(0);"><span class="subIcon"></span>使用积分抵现支付</a></td>
                        <td><span>抵现：</span></td>
                        <td><span>-￥0.00</span></td>
                    </tr>
                    <tr>
                        <td class="txt_l"><a href="javascript:void(0);"><span class="subIcon"></span>添加订单备注</a></td>
                        <td><span>运费：</span></td>
                        <td><span>+￥0.00</span></td>
                    </tr>
                    <tr>
                        <td class="txt_l"></td>
                        <td><span>应付金额：</span></td>
                        <td><span>=￥<?php echo $total;?></span></td>
                    </tr>
                  </table>
                  <div class="submit_wrap">
                  	应付总额：<span class="money">￥<?php echo $total;?></span>元
				<input type="hidden" name="total_price" value="<?php echo $total;?>">
				
						<a href="javascript:void(0);"><input type="submit" value="提交订单"></a>
					</form>
                    
                  </div>
                </div>
                <!---->
                <div class="recommend">
                	<div class="title"><a href="javascript:void(0);">查看更多>></a>其他用户还购买了</div>
                    <div class="proList clearfix">
                    	<div class="proItem clearfix">
                        	<div class="imgWrap"></div>
                            <div class="proWrap">
                            	<p>鑫泰亿联鑫泰亿联鑫泰亿联鑫泰亿联</p>
                                <p class="proFun">此商此商品具有美白效果，补水效果。此商品具有美白效果，补水效果。此商品具有美白效果，补水效果。品具有美白效果，补水效果。</p>
                            </div>
                        </div>
                        <div class="proItem clearfix">
                        	<div class="imgWrap"></div>
                            <div class="proWrap">
                            	<p>鑫泰亿联鑫泰亿联鑫泰亿联鑫泰亿联</p>
                                <p class="proFun">此商此商品具有美白效果，补水效果。此商品具有美白效果，补水效果。此商品具有美白效果，补水效果。品具有美白效果，补水效果。</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END-->
                <!---->
                <div class="recommend">
                	<div class="title"><a href="javascript:void(0);">查看更多>></a>今日最受欢迎</div>
                    <div class="proList">
                    	<ul class="pro_list clearfix">
                        	<li>
                            	<div class="imgWrap"></div>
                                <p class="proName"><a href="javascript:void(0);">多肽补水霜</a></p>
                                <p><span class="nowPrice">￥200.00</span>
                                	<span class="oldPrice">￥280.00</span>
                                </p>
                                <p><a class="addCar" href="javascript:void(0);">加入购物车</a></p>
                            </li>
                            <li>
                            	<div class="imgWrap"></div>
                                <p class="proName"><a href="javascript:void(0);">多肽补水霜</a></p>
                                <p><span class="nowPrice">￥200.00</span>
                                	<span class="oldPrice">￥280.00</span>
                                </p>
                                <p><a class="addCar" href="javascript:void(0);">加入购物车</a></p>
                            </li>
                            <li>
                            	<div class="imgWrap"></div>
                                <p class="proName"><a href="javascript:void(0);">多肽补水霜</a></p>
                                <p><span class="nowPrice">￥200.00</span>
                                	<span class="oldPrice">￥280.00</span>
                                </p>
                                <p><a class="addCar" href="javascript:void(0);">加入购物车</a></p>
                            </li>
                            <li>
                            	<div class="imgWrap"></div>
                                <p class="proName"><a href="javascript:void(0);">多肽补水霜</a></p>
                                <p><span class="nowPrice">￥200.00</span>
                                	<span class="oldPrice">￥280.00</span>
                                </p>
                                <p><a class="addCar" href="javascript:void(0);">加入购物车</a></p>
                            </li>
                            <li>
                            	<div class="imgWrap"></div>
                                <p class="proName"><a href="javascript:void(0);">多肽补水霜</a></p>
                                <p><span class="nowPrice">￥200.00</span>
                                	<span class="oldPrice">￥280.00</span>
                                </p>
                                <p><a class="addCar" href="javascript:void(0);">加入购物车</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--END-->
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
<script type="text/javascript" src='scripts/jq.js'></script>
<script type="text/javascript">
<!--
//alert($);
	function plus(id){
		var num=$('#num'+id).val();
		var gid=$('#gid'+id).val();
		
		$.ajax({
			url:'index.php?r=shop/plus',
			data:{'num':num,'gid':gid},
			type:'get',
			success:function(e){
				//alert(e);
				if(e==0){
					alert('库存不足');
				}else{
					$('#num'+id).val(e);
				}
			}
		
		});
	}
	//减一
	function minus(id){
		var num=$('#num'+id).val();
		var gid=$('#gid'+id).val();
		//alert(gid);
		$.ajax({
			url:'index.php?r=shop/minus',
			data:{'num':num,'gid':gid},
			type:'get',
			success:function(e){
				//alert(e);
				if(e==0){
					alert('至少为购买一件商品！');
				}else{
					$('#num'+id).val(e);
				}
			}
		
		});
	
	}
	//删除
	function del(id){
		location.href="index.php?r=cart/del&gid="+id;
	
	}
//-->
</script>
</body>
</html>
