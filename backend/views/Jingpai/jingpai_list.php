<?php
use yii\widgets\LinkPager;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="./resource/css/public.css" />
	<script type="text/javascript" src="./resource/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./resource/js/public.js"></script>	
<style>
.page{float:right;}
.page li{float:left;}
</style>
</head>
<body>
	<table class="table" style="text-align:center">
		<tr>
			<td class="th" colspan="10">竞拍列表</td>
		</tr>
		<tr>
			<th>编号</th>
			<th>商品图片</th>
			<th>商品名称</th>
			<th>商品原价</th>
			<th>秒杀价格</th>
			<th>起始时间</th>
			<th>截止时间</th>
			<th>库存</th>
			<th>操作</th>
		</tr>
		<?php foreach($info as $k=>$v){?>
		<tr>
			<td><?php echo $v['j_id'];?></td>
			<td><input type="image" src="<?php echo $v['goods_img'];?>" width=80 height=80></td>
			<td><?php echo $v['goods_name'];?></td>
			<td><?php echo $v['shop_price'];?></td>
			<td><?php echo $v['price'];?></td>
			<td><?php echo $v['start_time'];?></td>
			<td><?php echo $v['end_time'];?></td>
			<td><?php echo $v['goods_number'];?></td>
			<td>
				<a href="www.polytai.com/backend/web/index.php?r=shop/mall&gid=<?php echo $v['goods_id'];?>">[详情]</a>
				<a href="index.php?r=jingpai/jingpai_del&j_id=<?php echo $v['j_id'];?>" class="del">[删除]</a>
			</td>
		</tr>
		<?php }?>
		 
	</table>
<div style="float:right"><div class="page"><?= LinkPager::widget(['pagination' => $pages]); ?>  </div></div>
</body>
</html>