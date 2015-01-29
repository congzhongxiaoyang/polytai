<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="./resource/css/public.css" />
	<title></title>
</head>
<body>
	<form action="index.php?r=category/category_editpro" method="post">
		<table class="table">
			<tr >
				<td class="th" colspan="2">添加分类</td>
			</tr>
			<tr>
				<td>分类名称</td>
				<td><input type="text" name="name" value='<?php echo $info['cat_name'];?>'/></td>
			</tr>
			<tr>
				<td>开启状态</td>
				<td>
					<input type="radio" name="show" value="1" <?php if($info['is_show']==1){ echo "checked='checked'"; }?>/>开启
					<input type="radio" name="show" value="0" <?php if($info['is_show']==0){ echo "checked='checked'";}?>/>关闭
				</td>

			</tr>
			<tr>
				<td>关键字</td>
				<td><input type="text" name="key" value='<?php echo $info['keywords'];?>'/></td>
			</tr>
			<tr>
				<td>描述</td>
				<td>
					<textarea name="desc" id="description" class="textarea" value=""><?php echo $info['cat_desc'];?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="h_id" value="<?php echo $info['cat_id'];?>"> 
					<input type="submit" value="修改" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>