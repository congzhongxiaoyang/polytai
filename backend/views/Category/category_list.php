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
	<title></title>
	<link rel="stylesheet" href="./resource/css/public.css" />
	<script type="text/javascript" src="./resource/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./resource/js/public.js"></script>	

</head>
<body>
	<table class="table" style="text-align:center">
		<tr>
			<td class="th" colspan="10">查看分类</td>
		</tr>
		<tr>
			<th>CID</th>
			<th>分类名称</th>
			<th>状态</th>
			<th>操作</th>
		</tr>
		<?php foreach($info as $val) {?>
		<tr>
			<td><?php echo $val['cat_id'];?></td>
			<td><a href=""><?php echo $val['cat_name'];?></a></td>
			<td><?php if($val['is_show']==1){ echo "开启";}else { echo "关闭";}?></td>
			<td>
			<?php if($val['is_show']==1) {?>
				<a href="index.php?r=category/category_show&cat_id=<?php echo $val['cat_id'];?>&is_show=0">[关闭]</a>
			<?php }else {?>
				<a href="index.php?r=category/category_show&cat_id=<?php echo $val['cat_id'];?>&is_show=1">[开启]</a>
			<?php }?>
				<a href="index.php?r=category/category_edit&cat_id=<?php echo $val['cat_id'];?>">[编辑]</a>
				<a href="index.php?r=category/category_del&cat_id=<?php echo $val['cat_id'];?>" class="del">[删除]</a>
			</td>
		</tr>
		<?php }?>
	</table>
		<div style="float:right"><div class="page"><?= LinkPager::widget(['pagination' => $pages]); ?>  </div></div>
</body>
</html>