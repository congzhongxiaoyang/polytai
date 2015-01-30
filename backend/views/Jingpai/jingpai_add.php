<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="./resource/css/public.css" />
		<script type="text/javascript" src="./js/calendar.php?lang={$cfg_lang}"></script>
<link href="./js/calendar/calendar.css" rel="stylesheet" type="text/css" />
<link rel="alternate stylesheet" type="text/css" media="all" href="./jscalendar/calendar-blue.css" title="winter" />
<link rel="alternate stylesheet" type="text/css" media="all" href="./jscalendar/calendar-blue2.css" title="blue" />
<link rel="alternate stylesheet" type="text/css" media="all" href="./jscalendar/calendar-brown.css" title="summer" />
<link rel="alternate stylesheet" type="text/css" media="all" href="./jscalendar/calendar-green.css" title="green" />
<link rel="alternate stylesheet" type="text/css" media="all" href="./jscalendar/calendar-win2k-1.css" title="win2k-1" />
<link rel="alternate stylesheet" type="text/css" media="all" href="./jscalendar/calendar-win2k-2.css" title="win2k-2" />
<link rel="alternate stylesheet" type="text/css" media="all" href="./jscalendar/calendar-win2k-cold-1.css" title="win2k-cold-1" />
<link rel="alternate stylesheet" type="text/css" media="all" href="./jscalendar/calendar-win2k-cold-2.css" title="win2k-cold-2" />
<link rel="alternate stylesheet" type="text/css" media="all" href="./jscalendar/calendar-system.css" title="system" />

<!-- import the calendar script -->
<script type="text/javascript" src="./jscalendar/calendar.js"></script>

<!-- import the language module -->
<script type="text/javascript" src="./jscalendar/lang/calendar-en.js"></script>

<!-- helper script that uses the calendar -->
<script type="text/javascript">
var oldLink = null;
function setActiveStyleSheet(link, title) {
  var i, a, main;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
      a.disabled = true;
      if(a.getAttribute("title") == title) a.disabled = false;
    }
  }
  if (oldLink) oldLink.style.fontWeight = 'normal';
  oldLink = link;
  link.style.fontWeight = 'bold';
  return false;
}

function selected(cal, date) {
  cal.sel.value = date;
  if (cal.dateClicked && (cal.sel.id == "sel1" || cal.sel.id == "sel3"))
    cal.callCloseHandler();
}
function closeHandler(cal) {
  cal.hide();
  _dynarch_popupCalendar = null;
}
function showCalendar(id, format, showsTime, showsOtherMonths) {
  var el = document.getElementById(id);
  if (_dynarch_popupCalendar != null) {
    _dynarch_popupCalendar.hide();
  } else {
    var cal = new Calendar(1, null, selected, closeHandler);
    if (typeof showsTime == "string") {
      cal.showsTime = true;
      cal.time24 = (showsTime == "24");
    }
    if (showsOtherMonths) {
      cal.showsOtherMonths = true;
    }
    _dynarch_popupCalendar = cal;
    cal.setRange(1900, 2070);
    cal.create();
  }
  _dynarch_popupCalendar.setDateFormat(format);
  _dynarch_popupCalendar.parseDate(el.value);
  _dynarch_popupCalendar.sel = el;
  _dynarch_popupCalendar.showAtElement(el.nextSibling, "Br");

  return false;
}

var MINUTE = 60 * 1000;
var HOUR = 60 * MINUTE;
var DAY = 24 * HOUR;
var WEEK = 7 * DAY;

function isDisabled(date) {
  var today = new Date();
  return (Math.abs(date.getTime() - today.getTime()) / DAY) > 10;
}

function flatSelected(cal, date) {
  var el = document.getElementById("preview");
  el.innerHTML = date;
}

function showFlatCalendar() {
  var parent = document.getElementById("display");
  var cal = new Calendar(0, null, flatSelected);
  cal.weekNumbers = false;
  cal.setDisabledHandler(isDisabled);
  cal.setDateFormat("%A, %B %e");
  cal.create(parent);
  cal.show();
}
</script>

<script type="text/javascript">
var oldLink = null;
function setActiveStyleSheet(link, title) {
  var i, a, main;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
      a.disabled = true;
      if(a.getAttribute("title") == title) a.disabled = false;
    }
  }
  if (oldLink) oldLink.style.fontWeight = 'normal';
  oldLink = link;
  link.style.fontWeight = 'bold';
  return false;
}

function selected(cal, date) {
  cal.sel.value = date;
  if (cal.dateClicked && (cal.sel.id == "sel1" || cal.sel.id == "sel3"))
    cal.callCloseHandler();
}
function closeHandler(cal) {
  cal.hide();
  _dynarch_popupCalendar = null;
}
function showCalendar(id, format, showsTime, showsOtherMonths) {
  var el = document.getElementById(id);
  if (_dynarch_popupCalendar != null) {
    _dynarch_popupCalendar.hide();
  } else {
    var cal = new Calendar(1, null, selected, closeHandler);
    if (typeof showsTime == "string") {
      cal.showsTime = true;
      cal.time24 = (showsTime == "24");
    }
    if (showsOtherMonths) {
      cal.showsOtherMonths = true;
    }
    _dynarch_popupCalendar = cal;
    cal.setRange(1900, 2070);
    cal.create();
  }
  _dynarch_popupCalendar.setDateFormat(format);
  _dynarch_popupCalendar.parseDate(el.value);
  _dynarch_popupCalendar.sel = el;
  _dynarch_popupCalendar.showAtElement(el.nextSibling, "Br");

  return false;
}

var MINUTE = 60 * 1000;
var HOUR = 60 * MINUTE;
var DAY = 24 * HOUR;
var WEEK = 7 * DAY;

function isDisabled(date) {
  var today = new Date();
  return (Math.abs(date.getTime() - today.getTime()) / DAY) > 10;
}

function flatSelected(cal, date) {
  var el = document.getElementById("preview");
  el.innerHTML = date;
}

function showFlatCalendar() {
  var parent = document.getElementById("display");
  var cal = new Calendar(0, null, flatSelected);
  cal.weekNumbers = false;
  cal.setDisabledHandler(isDisabled);
  cal.setDateFormat("%A, %B %e");
  cal.create(parent);
  cal.show();
}
</script>
	<title></title>
	<style type="text/css">
.ex { font-weight: bold; background: #fed; color: #080 }
.help { color: #080; font-style: italic; }
table { font: 13px verdana,tahoma,sans-serif; }
a { color: #00f; }
a:visited { color: #00f; }
a:hover { color: #f00; background: #fefaf0; }
a:active { color: #08f; }
.key { border: 1px solid #000; background: #fff; color: #008;
padding: 0px 5px; cursor: default; font-size: 80%; }
</style>
</head>
<body>
	<form action="index.php?r=jingpai/jingpai_addpro" method="post">
		<table class="table">
			<tr>
				<td>选择商品</td>
				<td>
					<select name='gid'>
						<option value="">====选择商品====</option>
						<?php foreach($data as $k=>$v){?>
						<option value="<?php echo $v['goods_id']?>"><?php echo $v['goods_name']?></option>
						<?php }?>
					</select>
				</td>

			</tr>
			<tr>
				<td class="label">最低价格</td>
				<td><input type="text" name="price" value=''></td>
			</tr>
			<tr>
				<td class="label">加价幅度</td>
				<td><input type="text" name="highest" value=''></td>
			</tr>
			<tr>

		<tr valign="top">
		<td>开始日期</td>
		<td>
		<input type="text" name="start_time" id="sel1" size="30"
		><input type="reset" value="选择日期"
		onclick="return showCalendar('sel1', '%Y-%m-%d %H:%M:%I', '24', true);"><br />
		</form>
          </td>
          <td>   
            <!-- the calendar will be inserted here -->
            <div id="display" style="float: right; clear: both;"></div>
            <div id="preview" style="font-size: 80%; text-align: center; padding: 2px">&nbsp;</div> 
          </div>
          </td>

        </tr>
		<tr valign="top2">
		<td>结束日期</td>
		<td>
		<input type="text" name="end_time" id="sel2" size="30"
		><input type="reset" value="选择日期"
		onclick="return showCalendar('sel2', '%Y-%m-%d %H:%M:%I', '24', true);"><br />
		</form>
          </td>
          <td>   
            <!-- the calendar will be inserted here -->
            <div id="display" style="float: right; clear: both;"></div>
            <div id="preview" style="font-size: 80%; text-align: center; padding: 2px">&nbsp;</div> 
          </div>
          </td>
        </tr>

			<tr>
				<td colspan="2">
					<input type="submit" value="加入竞拍" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>