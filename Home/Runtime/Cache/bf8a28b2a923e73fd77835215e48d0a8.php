<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>淘宝图片放大效果</title>
<style type="text/css">
	*{
		font-family: Microsoft YaHei;
		margin: 0;
		padding: 0;	
	}
	
	li{
		list-style-type: none;
	}

	.head{
		height: 40px;
		margin: 0 0 30px 0;
		padding: 0;
		background-color: #428bca;
		box-shadow: inset 0 -2px 5px rgba(0,0,0,.1);
		font-family: Micriosoft YaHei;
		font-size: 25px;
		color: #fff;
		text-align: center;
		padding-top: 10px;
	}
	.booth{
		display: inline-block;
		border: 1px solid #CCC;
		height: 432px;
		margin-left: 200px;
	}
	.booth img{
	    cursor: move;
    }
	.zoom{
		position: absolute;
		overflow: hidden;
		border: 1px solid #CCC;
	}
	.mask{
		position:absolute;
		background:url("__PUBLIC__/Images/home/works/imagezoom/mask.png") repeat scroll 0 0 transparent;
		cursor:move;
		z-index:1;
	}
	.thumb{
		margin: 0 0 0 200px;
		padding: 0;
	}
	.thumb li{
		display: inline-block;
		padding: 20px;
	}
	.thumb li a{
		display:inline-block;
	}
	.tb-selected a{
		border: 2px solid #000;
	}
</style>
</head>

<body>
	<div class="head">
		<p>淘宝图片放大效果</p>
	</div>
	<div class="booth">
		<a href="__PUBLIC__/Images/home/works/imagezoom/1-big.jpg"><img src="__PUBLIC__/Images/home/works/imagezoom/1.jpg"></a>
	</div>
	<ul class="thumb">
		<li class="tb-selected">
			<a href="#"><img src="__PUBLIC__/Images/home/works/imagezoom//1-small.jpg" mid="__PUBLIC__/Images/home/works/imagezoom/1.jpg" big="__PUBLIC__/Images/home/works/imagezoom/1-big.jpg"></a>
		</li>
		<li>
			<a href="#"><img src="__PUBLIC__/Images/home/works/imagezoom/2-small.jpg" mid="__PUBLIC__/Images/home/works/imagezoom/2.jpg" big="__PUBLIC__/Images/home/works/imagezoom/2-big.gif"></a>
		</li>
		<li>
			<a href="#"><img src="__PUBLIC__/Images/home/works/imagezoom//3-small.jpg" mid="__PUBLIC__/Images/home/works/imagezoom/3.jpg" big="__PUBLIC__/Images/home/works/imagezoom/3-big.gif"></a>
		</li>
		<li>
			<a href="#"><img src="__PUBLIC__/Images/home/works/imagezoom/4-small.jpg" mid="__PUBLIC__/Images/home/works/imagezoom/4.jpg" big="__PUBLIC__/Images/home/works/imagezoom/4-big.jpg"></a>
		</li>
	</ul>
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
	(function($){
		$.fn.imagezoom = function(){
			//zoom-div大小,用户自定义设置
			var zoomWidth = 435;
			var zoomHeight = 435;
			//获得booth-div,image的位置及大小
			var boothLeft = $(".booth").offset().left;
			var boothTop = $(".booth").offset().top;
			var boothWidth = $(".booth").width();
			var boothHeight = $(".booth").height();
			var imageWidth = $(".booth img").width();
			var imageHeight = $(".booth img").height();
			var imageLeft = $(".booth img").offset().left;
			var imageTop = $(".booth img").offset().top;
			//为图片绑定mouseenter事件,$(this)指向img元素
			$(this).bind("mouseenter",function(){
				//添加zoom-div并设置大小和位置
				var bigImageSrc = $(this).parent().attr("href");
				if($(".zoom").length ==0){
					$("body").append("<div class='zoom'><img src='" + bigImageSrc + "'/></div>");
				}
				$(".zoom").css({
					left: boothLeft + boothWidth + 10,
					top: boothTop,
					width: zoomWidth,
					height: zoomHeight
				})
				//添加mask-div
				if($(".mask").length ==0){
					$("body").append("<div class='mask'></div>");
				}

				var maskWidth, maskHeight;
				var scaleX, scaleY;
				//在mouseenter事件内部绑定mousemove事件，防止mousemove在mouseenter之前执行
				$("body").bind("mousemove",function(e){
					//计算大小图片比例
					if ($(".mask").width()==0){
						var bigImageWidth = $(".zoom img").width();
						var bigImageHeight = $(".zoom img").height();
						scaleX = bigImageWidth/imageWidth;
						scaleY = bigImageHeight/imageHeight;
						maskWidth = zoomWidth/scaleX;
						maskHeight = zoomHeight/scaleY;
						$(".mask").width(maskWidth);
						$(".mask").height(maskHeight);

					}
					//获取鼠标所在位置
					var mouseX = e.pageX;
					var mouseY = e.pageY;
					if (mouseX < imageLeft || mouseX > imageLeft + imageWidth || mouseY < imageTop || mouseY > imageTop + imageHeight) {
						$(".zoom").remove();
						$(".mask").remove();
						//解除body绑定的mousemove事件
						$("body").unbind("mousemove");
						return;
					}
					//$("p").html(mouseX+","+mouseY);
					//计算mask位置
					var maskLeft, maskTop;
					if(mouseX - maskWidth/2 < imageLeft){
						maskLeft = imageLeft;
					}
					else if(mouseX + maskWidth/2 > imageLeft + imageWidth){
						maskLeft = imageLeft + imageWidth - maskWidth;
					}
					else{
						maskLeft = mouseX - maskWidth/2;
					}
					if(mouseY - maskHeight/2 < imageTop){
						maskTop = imageTop;
					}
					else if(mouseY + maskHeight/2 > imageTop + imageHeight){
						maskTop = imageTop + imageHeight - maskHeight;
					}
					else{
						maskTop = mouseY - maskHeight/2;
					}
					//$("p").html(imageTop);
					//设置mask位置
					$(".mask").css({
						top: maskTop,
						left: maskLeft
					})
					//计算mask相对于图片的偏移
					var maskOffsetLeft = maskLeft - imageLeft;
					var maskOffsetTop = maskTop - imageTop;
					//设置zoom-div的scroll属性
					$(".zoom").get(0).scrollLeft = maskOffsetLeft * scaleX;
					$(".zoom").get(0).scrollTop = maskOffsetTop * scaleY;
				})
			})
		}

	})(jQuery);

	$(".booth img").imagezoom();

	$(".thumb li").hover(function(){
		$(this).addClass("tb-selected");
		$(this).siblings().removeClass("tb-selected");
		var midImageLink = $(this).find("img").attr("mid");
		var bigImageLink = $(this).find("img").attr("big");
		$(".booth img").attr("src",midImageLink);
		$(".booth a").attr("href",bigImageLink);
	})
</script>
</body>
</html>