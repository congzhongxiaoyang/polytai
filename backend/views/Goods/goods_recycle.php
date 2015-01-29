<?php
use yii\widgets\LinkPager;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<style>
.page{float:right;}
.page li{float:left;}
</style>
	<link rel="stylesheet" href="./resource/css/public.css" />
	<script type="text/javascript" src="./resource/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./resource/js/public.js"></script>	
</head>
<body>
	<table class="table" style="text-align:center">
		<tr>
			<td class="th" colspan="10">回收站</td>
		</tr>
		<tr>
			<th>RID</th>
			<th>商品名称</th>
			<th>商品编号</th>
			<th>商品价格</th>
			<th>操作</th>
		</tr>
		<?php foreach($info as $val) {?>
		<tr>
			<td><?php echo $val['goods_id'];?></td>
			<td><a href=""><?php echo $val['goods_name'];?></a></td>
			<td><?php echo $val['goods_sn'];?></td>
			<td><?php echo $val['shop_price'];?></td>		
			<td><a href="index.php?r=goods/goods_restore&goods_id=<?php echo $val['goods_id'];?>" >[还原]</a>
				<a href="index.php?r=goods/goods_del&goods_id=<?php echo $val['goods_id'];?>" class="del">[删除]</a>
			</td>
		</tr>
		<?php }?>
	</table>
		<div style="float:right"><div class="page"><?= LinkPager::widget(['pagination' => $pages]); ?>  </div></div>
</body>
</html>