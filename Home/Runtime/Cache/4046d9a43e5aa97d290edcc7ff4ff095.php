<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>表单标签浮动效果</title>
<style type="text/css">
	*{
		font-family: Microsoft YaHei;
		margin: 0;
		padding: 0;	
		/*width: 100%;*/
	}

	.header{
		height: 40px;
		margin: 0 0 30px 0;
		padding: 0;
		background-color: #428bca;
		box-shadow: inset 0 -2px 5px rgba(0,0,0,.1);
		font-size: 25px;
		color: #fff;
		text-align: center;
		padding-top: 10px;
	}
	.container{
		width: 1000px;
		margin: 0 auto;
	}
	.login{
		width: 400px;
		margin: 0 auto;
		padding: 10px 
	}
	.login h2{
		font-size: 20px;
		text-align: center;
		padding: 10px 0;
		color: #fff;
		text-shadow: 0 -1px 0 rgba(0,0,0,0.3);
		background-color: #829aa8;
		border: 1px solid #768995;
		border-radius: 3px 3px 0 0;
	}
	.login form{
		padding: 0 30px 20px 30px;
		border: 1px solid #d8dee2;
	}
	.input{
		position: relative;
	}
	.input input{
		position: relative;
		display: block;
		width: 100%;
		box-sizing: border-box;
		height: 35px;
		margin: 30px 0;
		padding: 7px 8px;
		font-size: 17px;
		background-color: transparent;
		color: #333;
		vertical-align: middle;
		border: 1px solid #ccc;
		border-radius: 3px;
		outline: none;
		box-shadow: inset 0 1px 2px rgba(0,0,0,0.075);
		z-index: 1;
	}
	.input label{
		position: absolute;
		top: 0;
		left: 0;
		padding: 7px 8px;
		color: #ccc;
		font-size: 15px;
	}
	.input span{
		display: block;
		background-color: #fff;
		position: relative;
		float: left;
	}
	.input input:focus{
	    border-color: rgba(82,168,236,.8);
	    box-shadow: 0 0 8px rgba(82,168,236,.6);
	}
	button{
		display: block;
		width: 100%;
		cursor: pointer;
		font-size: 18px;
		padding: 5px 2px;
		margin: 20px 0 10px 0;
		text-align: center;
		background-color: #e6e6e6;
		color: #6C6464;
		border: 1px solid #ccc;
		border-radius: 3px;
	}
	button:hover{
		border-color: rgba(82,168,236,.8);
	    box-shadow: 0 0 8px rgba(82,168,236,.6);
	}
</style>
</head>

<body>
<div class="header">
	<p>表单标签浮动效果</p>
</div>
<div class="container">
	<div class="login">
		<h2>用户登录</h2>
		<form>
			<div class="input">
				<label for="user-name">用户名</label>
				<input type="text" name="user-name" />
			</div>
			<div class="input">
				<label for="password">密码</label>
				<input type="text" name="password" />
			</div>
			<button type="submit">登录</button>
		</form>
	</div>
</div>

<script src="__PUBLIC__/Js/jquery-1.11.2.min.js"></script>
<script src="__PUBLIC__/Js/jquery.easing.min.js" type="text/javascript"></script>
<script type="text/javascript">
	(function($){
		$.fn.labelFloat = function(){
			var labels = $(this).prev();
			$(labels).each(function(){
				//按字符分割label内容存入span
				var fieldname = $(this).text();
				var fieldname_array = fieldname.split("");
				//alert(fieldname_array);
				$(this).text("");
				for(var i=0;i<fieldname_array.length;i++){
					$(this).append("<span>"+fieldname_array[i]+"</span>");
				}
			})
			$(this).bind("focus",function(){
				float_top = -$(this).outerHeight()/2;
				if($(this).val()==""){
					$(this).prev().find("span").stop(true).each(function(i,ele){
						//alert($(ele).html());
						$(ele).css("z-index","2");
						$(ele).delay(100*i).animate({top: float_top},300,'easeOutBack');
					})
				}
			})
			$(this).bind("blur",function(){
				if($(this).val()==""){
					$(this).prev().find("span").stop(true).each(function(i,ele){
						//alert($(ele).html());
						$(ele).delay(100*i).animate({top: 0},300,'easeInOutBack',function(){
							$(ele).css("z-index","0");
						});
					})	
				}	
			})
		}
	})(jQuery);

	$(".input input").labelFloat();
</script>

</body>
</html>