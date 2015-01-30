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
			<td class="th" colspan="10">编辑订单</td>
		</tr>


		<form method="post" action="index.php?r=order/upd_do">
		<?php foreach($data as $key=>$val){?>
			<table border="1">
			<input type="hidden" name="order_id" value="<?php echo $val['order_id']; ?>">
			<tr>
				<td>下订单人:</td>
				<td><?php echo $val['user_name']; ?></td>
			</tr>
			<tr>
				<td>订单号:</td>
				<td><?php echo $val['order_sn']; ?></td>
			</tr>
			<tr>
				<td>订单状态:</td>
				<td>
					<select name="order_status">
						<option value="" selected>--请选择--</option>
						<option value="0">未确认</option>
						<option value="1">已确认</option>
						<option value="2">已取消</option>
						<option value="3">无效</option>
						<option value="4">退货</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>商品配送情况</td>
				<td><select name="shipping_status">
						<option value="" selected>--请选择--</option>
						<option value="0">未发货</option>
						<option value="1">已发货</option>
						<option value="2">已收货</option>
						<option value="3">备货中</option>
					</select></td>
			</tr>
			<tr>
				<td>支付状态</td>
				<td><select name="pay_status">
						<option value="" selected>--请选择--</option>
						<option value="0">未付款</option>
						<option value="1">付款中</option>
						<option value="2">已付款</option>
					</select></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="提交"></td>
			</tr>

			</table>
			<?php } ?>
		</form>
		
		
		
	</table>
		
</body>
</html>