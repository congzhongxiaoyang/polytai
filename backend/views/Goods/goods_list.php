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
			<td class="th" colspan="10">商品列表</td>
		</tr>
		<tr>
			<th>GID</th>
			<th>商品名称</th>
			<th>商品编号</th>
			<th>商品价格</th>
			<th>上架</th>
			<th>新品</th>
			<th>促销</th>
			<th>操作</th>
		</tr>
		<?php foreach($info as $val) {?>
		<tr>
			<td><?php echo $val['goods_id'];?></td>
			<td><a href=""><?php echo $val['goods_name'];?></a></td>
			<td><?php echo $val['goods_sn'];?></td>
			<td><?php echo $val['shop_price'];?></td>
			<td>
				<?php if($val['is_on_sale']==1){?><a href="index.php?r=goods/goods_sale&goods_id=<?php echo $val['goods_id'];?>&on_sale=<?php echo $val['is_on_sale'];?>"><img src="./resource/images/action_check.png" id="toggle_sale_id<?php echo $val['goods_id'];?>"></a>
				<?php }else {?>
				<a href="index.php?r=goods/goods_sale&goods_id=<?php echo $val['goods_id'];?>&on_sale=<?php echo $val['is_on_sale'];?>"><img src="./resource/images/action_delete.png"></a>	
				<?php }?>
			</td>
			<td>
				<?php if($val['is_new']==1){?><a href="index.php?r=goods/goods_new&goods_id=<?php echo $val['goods_id'];?>&is_new=<?php echo $val['is_new'];?>"><img src="./resource/images/action_check.png"></a>
				<?php }else {?>
				<a href="index.php?r=goods/goods_new&goods_id=<?php echo $val['goods_id'];?>&is_new=<?php echo $val['is_new'];?>"><img src="./resource/images/action_delete.png"></a>	
				<?php }?>
			</td>
			<td>
				<?php if($val['is_promote']==1){?><a href="index.php?r=goods/goods_promote&goods_id=<?php echo $val['goods_id'];?>&is_promote=<?php echo $val['is_promote'];?>"><img src="./resource/images/action_check.png"></a>
				<?php }else {?>
				<a href="index.php?r=goods/goods_promote&goods_id=<?php echo $val['goods_id'];?>&is_promote=<?php echo $val['is_promote'];?>"><img src="./resource/images/action_delete.png" width="" height="" border="0" alt=""></a>
				<?php }?>
			</td>
			<td>
				<a href="">[详情]</a>
				<a href="">[编辑]</a>
				<a href="index.php?r=goods/goods_join&goods_id=<?php echo $val['goods_id'];?>" class="del">[删除]</a>
			</td>
		</tr>
		<?php }?>
	</table>
		<div style="float:right"><div class="page"><?= LinkPager::widget(['pagination' => $pages]); ?>  </div></div>
</body>

</html>