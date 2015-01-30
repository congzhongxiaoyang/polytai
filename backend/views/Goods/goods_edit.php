<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="./resource/css/public.css" />
	<title></title>
	<script type="text/javascript" charset="utf-8" src="./resource/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="./resource/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="./resource/ueditor/lang/zh-cn/zh-cn.js"></script>

    <style type="text/css">
        div{
            width:100%;
        }
    </style>
</head>
<body>
	<form action="index.php?r=goods/goods_edit_pro" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr >
				<td class="th" colspan="2">添加商品</td>
			</tr>
			<tr>
				<td>商品名称</td>
				<td>
					<input type="text" name="name" class="title" value="<?php echo $info['goods_name'];?>"/>
				</td>
			</tr>
			<tr>
				<td>商品价格</td>
				<td><input type="text" name="price" value="<?php echo $info['shop_price'];?>"/></td>
			</tr>
			<tr>
				<td>缩略图</td>
				<td><input type="file" name="myfile"/><img src="<?php echo $info['goods_img'];?>" width="50" height="50" border="0" alt=""></td>
			</tr>
			<tr>
				<td>关键字</td>
				<td>
					<input type="text" name="key" value="<?php echo $info['keywords'];?>"/>
				</td>
			</tr>
			<tr>
				<td>分类</td>
				<td>
					<select name='cat_id'>
						<option value="">====选择分类====</option>
						<?php foreach($categoey as $val) {
							if($val['cat_id']==$info['cat_id']){
								echo "<option selected value='".$val['cat_id']."'>".$val['cat_name']."</option>";
							}else {
								echo "<option value='".$val['cat_id']."'>".$val['cat_name']."</option>";	
							}
						}
						?>
						</select>
				</td>
			</tr>
			<tr>
				<td>内容</td>
				<td>
					<div>
						<script id="editor" type="text/plain" style="width:800px;height:500px;" value=""><?php echo $info['goods_desc'];?></script>						
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="h_id" value="<?php echo $info['goods_id'];?>">
					<input type="hidden" name="h_sn" value="<?php echo $info['goods_sn'];?>">
					<input type="submit" value="发表" class="input_button" />
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>

<script type="text/javascript">

	function sub() {
		alert(editor.getContent());

	}

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
</body>
</html>