// JavaScript Document
$(function(){
	//随窗口浮动的模块
	var scrollWrap=function(){
	  var fixedWrapTop=document.getElementById("fixedWrap").offsetTop;
	  var top= document.documentElement.scrollTop||document.body.scrollTop;
	  if(top>300){
		  $("#fixedWrap").css("top",top+"px");
		}else{
		  $("#fixedWrap").css("top","285px");
		}
	}
	window.onload=window.onscroll=scrollWrap;
	//菜单
	$(".allType").mouseover(function(){
		$(this).children(".type_list").removeClass("none");
	});
	$(".allType").mouseout(function(){
		$(this).children(".type_list").addClass("none");
	});
	
});