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
})(jQuery)
