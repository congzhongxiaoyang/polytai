<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="./resource/css/public.css" />
	<title></title>
</head>
<body>
	<form action="index.php?r=kill/kill_addpro" method="post">
		<table class="table">
			<tr>
				<td>选择商品</td>
				<td>
					<select name='goods'>
						<option value="">====选择商品====</option>
						<?php foreach($data as $k=>$v){?>
						<option value="<?php echo $v['goods_id']?>"><?php echo $v['goods_name']?></option>
						<?php }?>
					</select>
				</td>

			</tr>
			<tr>
				<td>秒杀价格</td>
				<td>
					<input type="text" name="k_price">
				</td>

			</tr>
			<tr>
				<td>设置时间</td>
				<td>
					起始时间：<input type="text" name="k_times" value="2000-01-01 00:00:00">&nbsp;&nbsp;&nbsp;截止时间：<input type="text" name="k_timed" value="2000-01-01 00:00:00">
				</td>

			</tr>
			
			<tr>
				<td colspan="2">
					<input type="submit" value="加入秒杀" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>