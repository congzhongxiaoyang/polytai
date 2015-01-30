<?php
use yii\grid\GridView;
use	yii\widgets\LinkPager;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="./resource/css/public.css" />
	<script type="text/javascript" src="./resource/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./resource/js/public.js"></script>	
</head>
<body>
	<table class="table">
		<tr>
			<td class="th" colspan="10">查看订单</td>
		</tr>
		<tr>
			<th>ID</th>
			<th>订单号</th>
			<th>下订单人</th>
			<th>下单时间</th>
			<th>地址</th>
			<th>订单状态</th>
			<th>商品配送情况</th>
			<th>支付状态</th>
			<th>操作</th>
		</tr>
		<?php foreach($model as $key=>$val){?>
		<tr>
			<td><?php echo $val['order_id']; ?></td>
			<td><?php echo $val['order_sn']; ?></a></td>
			<td><?php echo $val['user_name']; ?></td>
			 <td><?php echo date("Y-m-d h:i:s",$val['add_time']); ?></td>
			<td><?php echo $val['address']; ?></td>
			<td><?php 
			if($val['order_status']=='0'){
				echo "未确认";
			}else if($val['order_status']=='1'){
				echo "已确认";
			}else if($val['order_status']=='2'){
				echo "已取消";
			}else if($val['order_status']=='3'){
				echo "无效";
			}else{
				echo "退货";	
			}

			?></td>
			<td><?php 
			if($val['shipping_status']=='0'){
				echo "未发货";
			}else if($val['shipping_status']=='1'){
				echo "已发货";
			}else if($val['shipping_status']=='2'){
				echo "已收货";
			}else{
				echo "备货中";
			}

			?></td>
			<td><?php 
			if($val['pay_status']=='0'){
				echo "未付款";
			}else if($val['pay_status']=='1'){
				echo "付款中";
			}else{
				echo "已付款";
			}

			?></td>
			<td>
				<a href="index.php?r=order/order_upd&id=<?php echo $val['order_id']?>">[编辑]</a>
				<a href="index.php?r=order/order_del&id=<?php echo $val['order_id']?>" class="del">[删除]</a>
			</td>
		</tr>
		<?php } ?>
	</table>
		<div class="page">
			<?= LinkPager::widget(['pagination' => $pages]); ?>
		</div>
</body>
</html>