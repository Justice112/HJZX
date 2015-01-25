$(document).ready(function(){
	$("#wrap").css({'min-height':$(window).height()});
	$('.lookAll').css('margin-top',($(window).height()-160)/2+'px');
	if($('#content').height()<$(window).height()){
		$('#content').css({'min-height':$(window).height()});
		$('.recommend .footBar').css('position','fixed');
	}
	else{
		$('.recommend .footBar').css('position','absolute');
	};
	
	$('.closedDiv').click(function(e) {
		$(this).removeClass('closedDiv');
	});
	
	$(window).resize(function(){
		$(".swipe").height($(window).height()).width($(window).width());
	}).resize();
	window.mySwipe = new Swipe($('.newsList1 .swipe')[0],{
		continuous:false,
		callback:function(index, element){
			$('.swipeNum li').removeClass('now').eq(index).addClass('now');
			
			if($('.swipeNum .now').hasClass('search')){
				$('.changeList').fadeOut();
			}
			else if($('.swipeNum .now').next('li').hasClass('search')){
				$('.changeList').fadeIn();
			}
			/*
			$(element).find('section').animate({
				bottom:0
			});
			*/
		},
		transitionIng:function(index,element,num){
			$(element).find('section').css({
				opacity:1-num,
				bottom:-200*num+20
			});
		}
	}); 
	$('a').on('touchstart',function(){
		$(this).addClass('hover');
	}).on('touchend',function(){
		$(this).removeClass('hover');
	});
	$('.newsList1 .swipeNum li').remove();
	$('.newsList1 .swipe-wrap li').each(function(){
		$('.newsList1 .swipeNum').append('<li></li>');
	});
	$('.newsList1 .swipeNum li:last').addClass('search');
	
	$('.newsList1 .swipe-wrap li section').css('bottom',-200);
	$('.newsList1 .swipe-wrap li:eq(0)').find('section').css('bottom',20);
	$('.newsList1 .swipeNum').css('margin-left',-$('.swipeNum').width()/2);
	$('.swipeNum li:eq(0)').addClass('now');
	
	var swliwidth = $(window).width()/$('.swipe-wrap li').length ;
	$('.progressImage .swipeNum li').width(swliwidth);
	window.mySwipe = new Swipe($('.progressImage .swipe')[0],{
		continuous:false,
		transitionIng:function(index,element,num){
			$(element).find('section').css({
				opacity:1-num
			});
			$('.progressImage .swipeNum li').css({
				marginLeft: swliwidth*(index - 1 ) + swliwidth*(1 - num)
			});
		}
	});
	
	$(document).scroll(function(){
		if($(document).scrollTop() > $(window).height()){
			$('.moreArticle').css('right',0);
		}else{
			$('.moreArticle').css('right','');
		}
	});
	
	
	$('.video').click(function(){
		$('video')[0].play();
		$('video')[0].webkitEnterFullscreen();
	});
	document.onwebkitfullscreenchange=function(){
		if(!document.webkitFullscreenElement){
			$('video')[0].pause();
		}
	};
	$('.related a').each(function(index, element) {
		if($(element).children('p').height()<41){	
			var a = $(element).children('p').height();
			$(element).children('p').css('padding-top',(40-a)/2 + 'px');
		}
		else{
			$(element).children('img').css('margin-top',($(element).children('p').height()-40)/2 + 'px');
			$(element).children('img').css('margin-bottom',-40 - ($(element).children('p').height()-40 )/2+ 'px');
		}
	});
	
	//垂直居中
	$('.related a').each(function(index, element) {
		if($(element).children('p').height()<41){	
			var a = $(element).children('p').height();
			$(element).children('p').css('padding-top',(40-a)/2 + 'px');
		}
		else{
			$(element).children('img').css('margin-top',($(element).children('p').height()-40)/2 + 'px');
			$(element).children('img').css('margin-bottom',-40 - ($(element).children('p').height()-40 )/2+ 'px');
		}
	});
	
	var openMenu = false;
	
	$('header .list').click(function(e) {
		if(openMenu){
			$('.menuBox').slideUp('fast');
			openMenu = false;
		}
		else{
			$('.menuBox').slideDown('fast');
			openMenu = true;
		}
	});
	$('.menuBox').show();
	window.mySwipe = new Swipe($('.menuBox .menuBoxList')[0],{
		continuous:true,
		callback:function(index, element){
			$('.num li').removeClass('now').eq(index%2).addClass('now');
			/*
			$(element).find('section').animate({
				bottom:0
			});
			*/
		},
		transitionIng:function(index,element,num){
			$(element).css({
				opacity:1-num
			});
		}
	}); 
	$('.menuBox').hide();

    $(".submit").click(function(){
        $(this).parents('form').submit();
    })


    /*用户意向checkbox*/
});