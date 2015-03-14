$(document).ready(function(){

    //导航栏效果
	$(window).scroll(function(){
		//滑动到此处后固定于浏览器窗口顶部
		if($(window).scrollTop() >= 144){
			$('#masthead').addClass("masthead-fixed-top");
		}
		else{
			$('#masthead').removeClass("masthead-fixed-top");
		}
	})


	//返回顶部插件
	$.goup({
            trigger: 100,
            bottomOffset: 150,
            locationOffset: 100,
            title: 'Back to top',
            titleAsText: true
    });

})