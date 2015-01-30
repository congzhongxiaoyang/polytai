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
		<style>
.page{float:right;}
.page li{float:left;}
</style>
</head>
<body>
	<table class="table">
		<tr>
			<td class="th" colspan="10">查看栏目</td>
		</tr>
		<tr>
			<th>ID</th>
			<th>评论商品</th>
			<th>评论人</th>
			<th>评论内容</th>
			<th>评论时间</th>
			<th>审核</th>
			<th>操作</th>
		</tr>
		<?php foreach($model as $key=>$val){?>
		<tr>
			<td><?php echo $val['comment_id']?></td>
			<td><?php echo $val['goods_name']?></td>
			<td><?php echo $val['user_name']?></td>
			<td><?php echo $val['content']?></td>
			<td><?php echo date("Y-m-d h:i:s",$val['add_time']); ?></td>
			<td><?php if($val['status']=='0'){
				$id=$val['comment_id'];
				$str="";
				$str="未审核<a href='index.php?r=order/comment_upd&id=".$id."'>[审核]</a>";
				
				echo  $str;
			}else if($val['status']=='1'){
				echo "已通过";
			}?></td>
			<td>
				
				<a href="index.php?r=order/comment_del&id=<?php echo $val['comment_id']?>" class="del">[删除]</a>
			</td>
		</tr>
		<?php } ?>
	</table>
		<div class="page">
			<?= LinkPager::widget(['pagination' => $pages]); ?>
		</div>
</body>
</html>