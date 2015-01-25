$(document).ready(function() {
	
	//分辨率适应
	$(window).resize(function(){
		$('body').css({minHeight:$(window).height(),width:$(window).width()});
		$('#aside,#content .colL').css({height:$(window).height()});
		$('#content.newsDetail .colL .scrollbar').css({height:$(window).height()-70});
		$('#content.crmDetail .fixed').css({height:$(window).height()-54,left:$(window).width()-240});
		$('#content.crmDetail .intention').css({width:$(window).width()-830});
		
		$('.submitBox').css({width:$(window).width()-230-$('#content .colL').width(),marginLeft:$('#content .colL').width()+1});
		$('.submitBoxB').css({width:$(window).width()-230});
		 
		$('#demoGrid').css({height:$(window).height()-98});
		$('#demoGridResult').css({height:$(window).height()-48});
		$('.leftIframe').css({width:$(window).width()-461});
	}).resize();
	
	//fancybox
	$('.fancybox').fancybox({padding:0,margin:15,title:{type:null}});
	$('.editImgBox .link').fancybox({
		padding:0,
		href:'#LinkPOP'
	});
	$('.editBtn .crop').fancybox({
		type:'iframe',
		width:'100%',
		height:'100%',
		padding:0,
		margin:0,
		href:'pop_crop.html',
		closeBtn : false,
		tpl:{wrap:'<div class="fancybox-wrap2" tabIndex="-1"><div class="fancybox-skin2"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>'},
		helpers:{title:null}
	});
	$('.baiduXY').fancybox({
		type:'iframe',
		width:'85%',
		height:'90%',
		padding:0,
		margin:0,
		href:'http://api.map.baidu.com/lbsapi/getpoint/index.html',
		helpers:{title:null}
	});
	
	//拖动排序
	$(".movablePlateY ul").sortable({ items: 'li' , axis: 'y' });
	$(".atlasUpload ul").sortable({ items: 'li' , axis: 'y', handle: "img" });
	$(".projectProgres .imgList").sortable({ items: '.uploadImgList', handle: ".sort" });
	$(".destopKvList ul").sortable({ items: 'li' ,cancel: '.waitUpload' , handle: ".sort" });
	$("#content .colL nav ul").sortable({ items: 'li' , axis: 'y' , handle: ".sort" });
	
	//上传图片
	$('.file_upload').uploadifive({
		'buttonClass'  : 'btn upload',
		'width': '',
		'height': '',
		'buttonText'      : '替换图片'
	});
	$('.file_upload2').uploadifive({
		'buttonClass'  : 'btn file_upload2',
		'width': '',
		'height': '',
		'buttonText'      : '左图右文'
	});
	$('.file_upload3').uploadifive({
		'buttonClass'  : 'btn file_upload3',
		'width': '',
		'height': '',
		'buttonText'      : '左文右图'
	});
	$('.file_uploadImg').uploadifive({
		'buttonClass'  : 'btn',
		'width': '',
		'height': '',
		'buttonText'      : '上传'
	});
	$('.file_uploadImg2').uploadifive({
		'buttonClass'  : 'btn',
		'width': '',
		'height': '',
		'buttonText'      : '自定义'
	});
	$('.file_xls').uploadifive({
		'buttonClass'  : 'btn',
		'width': '',
		'height': '',
		'buttonText'      : '上传数据文件'
	});
	$('.file_atlas').uploadifive({
		'buttonClass'  : 'btnFile',
		'align': 'left',
		'width': '',
		'height': '',
		'buttonText'      : '上传图集'
	});
	
	//Tip
	$('#content .colL nav i.iconYes,#content .colL nav i.iconNo').miniTip({
		'className' : 'minitip1',
		'showAnimateProperties' : {'top': '-=3'},
		'hideAnimateProperties' : {'top': '+=3'}
	});
	$('.tableList i,#demoDiv i.iconYes,#demoDiv s').miniTip({
		'className' : 'minitip2',
		'position' : 'left',
		'showAnimateProperties' : {'top': '-=3'},
		'hideAnimateProperties' : {'top': '+=3'}
	});
	$('#demoDiv .message,#demoDiv .tips').miniTip({
		'className' : 'minitip3',
		'position' : 'left',
		'showAnimateProperties' : {'top': '-=3'},
		'hideAnimateProperties' : {'top': '+=3'}
	});
	$('.mangaeList i.iconYes,.mangaeList i.iconNo,.mangaeList .iocnGear').miniTip({
		'className' : 'minitip2',
		'position' : 'left',
		'showAnimateProperties' : {'top': '-=3'},
		'hideAnimateProperties' : {'top': '+=3'}
	});
	
	
	//Tabs
	$('.tabsBox').organicTabs({'speed':100});
	
});