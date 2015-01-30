
<option>请选择</option>
<?php foreach($info as $k=>$v){ ?>
<option value="<?php echo $v['region_id'];?>"><?php echo $v['region_name'];?></option>
<?php
}
?>
      