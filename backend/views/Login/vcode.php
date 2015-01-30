<?php
//生成数据，时间和毫秒数
$str="1,2,3,4,5,d,e,s,a,f";
$list=explode(",",$str);
$array_max=count($list)-1;
//生成几位的验证码
$n=4;
$vcode="";
for($i=0;$i<$n;$i++){
	$key=rand(0,$array_max);
	$vcode.=$list[$key];
}
session_start();
$_SESSION['vcode']=$vcode;
//echo $_SESSION["vcode"];die;
//告诉浏览器我是图片
header("content-type:image/png");

//生成图片，画个图，大小
$image=imagecreate(58,28);
//准备颜色（画笔）
$bgcolor=imagecolorallocate($image,15,150,222);

//填充背景颜色
imagefill($image,0,0,$bgcolor);
//验证码写入图片中
$font_color=imagecolorallocate($image,250,250,255);
//雪点
	$rand1=rand(0,0);
	for($i=1;$i<=$rand1;$i++ ){
		$x=rand(0,90);
		$y=rand(0,50);
		imagesetpixel($image,$x,$y,$font_color);
	}

imagestring($image,5,7,7,$vcode,$font_color);
//输出显示图像png
imagepng($image);
//释放内存
imagedestroy($image);
?> 