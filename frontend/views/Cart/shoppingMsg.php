<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>购物车核对信息</title>
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
                  <a href="javascript:void(0);">我的购物车</a>>
                  <a class="current" href="javascript:void(0);">填写核对订单信息</a>>
                  <a href="javascript:void(0);">支付信息</a>>
                  <a href="javascript:void(0);">交易成功</a>
                </p>
                <span class="fl">填写核对订单信息</span>
              </div>
              <div class="shopping_panel">
              	<div class="title">收货人信息<a href="javascript:void(0);">保存收货人信息</a></div>
                <form class="newAddress" method="post" action="index.php?r=cart/recieve">
                	<div class="title"><input type="radio" />使用新地址</div>
                    <div class="frmItem">
                    	<label class="lbl"><span class="redSpan2">*</span>收货人：</label>
                        <input class="txt" type="text" name="recieve" />
                    </div>
					<input type="hidden" name="aid" value="<?php echo $id;?>">
                    <div class="frmItem">
                    	<label class="lbl"><span class="redSpan2">*</span>所在地区：</label>
                         <select name="pro" id="pro" onchange="select('pro','city')">
						<?php foreach($region as $k=>$v){?>
							<option value=''>请选择</option>
							<option value="<?php echo $v['region_id'];?>"><?php echo $v['region_name'];?></option>
							<?php
							}
							?>
                        </select>
                        <select name="city" id="city" onchange="select('city','dis')" >
							<option>请选择</option>
                        </select>
                        <select name="dis" id="dis">
                        	<option>请选择</option>
                        </select>
                    </div>
                    <div class="frmItem">
                    	<label class="lbl"><span class="redSpan2">*</span>详细地址：</label>
                        <input class="txt width290" type="text" name="detail" />
                    </div>
                    <div class="frmItem">
                    	<label class="lbl"><span class="redSpan2">*</span>手机号码：</label>
                        <input class="txt" type="text" name="mobile" />
                        <span>或</span>
                        <label class="lbl">固定电话：</label>
                        <input class="txt" type="text" name="tel" />
                    </div>
                    <div class="frmItem">
                    	<label class="lbl">邮箱：</label>
                        <input class="txt" type="text" name="email" />
                        <label>用来接受订单提醒邮件，便于您及时了解订单详情</label>
                    </div>
                    <div class="btnWrapper">
                    	<a class="btn" href="javascript:void(0);"><input type="submit" value="保存收货人地址"></a>
                    </div>
                </form>
                <div class="menuList">
                	<div class="title">
                    	<a href="javascript:void(0);">返回购物清单</a>
                    	<span>商品清单</span>
                    </div>
                    <table class="menuTab">
                    	<tr class="title">
             				<td class="width415">商品</td>
                            <td>商城价</td>
                            <td>优惠</td>
                            <td>数量</td>
                            <td>库存状态</td>
                        </tr>
						<?php foreach($qingdan as $k=>$v){?>
                        <tr>
                        	<td>
                            	<div class="clearfix">
                                	<div class="imgWrap"><img src="<?php echo $v['goods_thumb'];?>"/></div>
                                    <div class="menu_msg">
                                    	<p class="proName">
                                        	<a class="redSpan" href="javascript:void(0);"><?php echo $v['goods_name'];?></a>
                                        </p>
                                        <p>商品编号：<span><?php echo $v['goods_sn'];?></span></p>
                                    </div>
                                </div>
                            </td>
                            <td><span>￥<?php echo $v['goods_price'];?></span></td>
                            <td><span>￥<?php echo ($v['market_price']-$v['goods_price']);?></span></td>
                            <td><span><?php echo $v['goods_num'];?></span></td>
                            <td><span>有货</span></td>
                        </tr>
                       <?php } ?>
                    </table>
                    <div class="btnWrapper">
                    	<a href="javascript:void(0);">立即提交</a>
                    </div>
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
<script type="text/javascript" src="scripts/jq.js"></script>
<script type="text/javascript">
<!--
	//地区四级联动
	function select(myid,cid)
	{
		//alert(cid);
		var pid=$('#'+myid).val();
		//alert(pid);
		$.ajax({
		url:'index.php?r=cart/selectadd',
		type:'post',
		data:{'pid':pid},
		success:function (e)
			{
				$('#'+cid).html(e);
			}
		});

		
	}
//-->
</script>
</body>
</html>
