$(document).ready(function(){

	//瀑布流插件
	$('#masonry').masonry({
	    itemSelector : '.note',
	    columnWidth : 240,
	})
	

	//ajax加载新内容

	//网上例子，未实现，ajax返回的内容不会处理
	/*nextHref = $("#page-nav a").attr("href");
	// 给浏览器窗口绑定 scroll 事件
	$(window).bind("scroll",function(){
	    // 判断窗口的滚动条是否接近页面底部
	    if( $(document).scrollTop() + $(window).height() > $(document).height() - 10 ) {
	        // 判断下一页链接是否为空
	        if(nextHref != undefined){
	            // 显示正在加载模块
	            //$("#page_loading").show("slow");
	            // Ajax 翻页
	            $.ajax({
	                url: $("#page-nav a").attr("href"),
	                type: "GET",
	                dataType: "html"
	                success: function(data){
	                    result = $(data).find("#masonry .note");
	                    nextHref = $(data).find("#page-nav a").attr("href");
	                    $("#page-nav a").attr("href", nextHref);
	                    alert($(data).html());
	                    // 把新的内容设置为透明
	                    $newElems = result.css({opacity:0});
	                    $newElems.imagesLoaded(function(){
	                        $("#masonry").masonry( 'appended', $newElems, true );
	                        // 渐显新的内容
	                        $newElems.animate({opacity:1});
	                        // 隐藏正在加载模块
	                        $("#page_loading").hide("slow");                            
	                    })
	                }
	            })
	        } 
	        else {
	            $("#page_loading span").text("木有了噢，最后一页了！");
	            $("#page_loading").show("fast");
	            setTimeout("$('#page_loading').hide()",1000);
	            setTimeout("$('#page_loading').remove()",1100);
	        }
	    })
	})*/

	//masonry('reload')方式
	/*$(window).bind("scroll",function(){
	    // 判断窗口的滚动条是否接近页面底部
	    if( $(document).scrollTop() + $(window).height() > $(document).height() - 10 ) {
	    	//ajax加载新内容
			nextPage = $("#next-page").val();
			if(nextPage){
				$.ajax({
			        url: "/thinkphpTest/index.php/Memo/index",
			        type: "GET",
			        dataType: "json",
			        data: {page: nextPage},  //获取下一页的页码，即span#next-page的内容
			        success: function(result){
			        	//alert(result.data[0]["keyword"]);
			        	arrayData = result.data; //.data属性是哪里来的？
			        	for(var i = 0; i <arrayData.length; i++){
			        		$("#masonry").append(
			        			"<div class=\"note\"><p style=\"font-size:25px;\">"+arrayData[i]["keyword"]+"</p><p><a>"+arrayData[i]["createTime"]+"</a></p><p>"+arrayData[i]["content"]+"</p></div>"
						    );
			        	}
			        	if(nextPage<$("#total-page").val()){
			        		$("#next-page").val(nextPage+1);
			        	}
			        	else{
			        		$("#next-page").val("");
			        	}
			        	$("#masonry").masonry('reload'); //整体重新布局，考虑改成 appended
			        }
				})
			}
			else{
	            $("#end-info").show("fast");
			}
	    }
	})*/
	
	//.masonry('appended'),此方法效率较高
	$(window).bind("scroll",function(){
	    // 判断窗口的滚动条是否接近页面底部
	    if( $(document).scrollTop() + $(window).height() > $(document).height() - 10 ) {
	    	//ajax加载新内容
			nextPage = $("#next-page").val();
			if(nextPage){
				$.ajax({
			        url: "index",
			        type: "GET",
			        dataType: "json",
			        data: {page: nextPage},  //获取下一页的页码，即span#next-page的内容
			        success: function(result){
			        	//alert(result.data[0]["keyword"]);
			        	arrayData = result.data; //data属性是哪里来的？
			        	var html = "";
			        	for(var i = 0; i<arrayData.length; i++){
			        		html+="<div class=\"note\"><p style=\"font-size:25px;\">"+arrayData[i]["keyword"]+"</p><p><a>"+arrayData[i]["createTime"]+"</a></p><p>"+arrayData[i]["content"]+"</p></div>";
			        	}
			        	if(nextPage<$("#total-page").val()){
			        		$("#next-page").val(parseInt(nextPage)+1);
			        	}
			        	else{
			        		$("#next-page").val("");
			        	}
			        	$newElems = $(html).css({opacity:0});
			        	$newElems.appendTo($("#masonry"));
			        	$newElems.imagesLoaded(function(){
	                        $("#masonry").masonry('appended', $newElems, true);
	                        // 渐显新的内容
	                        $newElems.animate({opacity:1});                           
	                    })
			        }
				})
			}
			else{
	            $("#end-info").show("fast");
			}
	    }
	})

})