$(document).ready(function(){
	// 按钮点击效果
	$('a').on('touchstart',function(){
		$(this).addClass('hover');
	}).on('touchend',function(){
		$(this).removeClass('hover');
	});

	// 主页菜单滑动定位
	window.onload = window.onscroll = function() {
			var oNav=document.getElementById('nav');
			var oTop = document.documentElement.scrollTop || document.body.scrollTop;
			if (oTop >= 51) {
				if (typeof document.body.style.maxHeight === "undefined") {
					oNav.style.top = oTop + 'px';
				} else {
					oNav.style.position = 'fixed';
					oNav.style.top = 0;
					oNav.style.zIndex=10000;
					oNav.style.background = 'rgba(204,204,204,0.8)';
					oNav.style.boxShadow = '0 1px 1px rgba(0,0,0,0.45)'
				}
			} else {
				oNav.style.position = 'static';
				oNav.style.background = 'none';
				oNav.style.boxShadow = 'none'
			}				
		};
	// 主页菜单点击切换
	function scrollDoor() {}
	scrollDoor.prototype = {
	    sd: function(menus, divs, openClass, closeClass) {
	        var _this = this;
	        if (menus.length != divs.length) {
	            return false;
	        }
	        for (var i = 0; i < menus.length; i++) {
	            _this.$(menus[i]).value = i;
	            _this.$(menus[i]).onclick = function() {
	                for (var j = 0; j < menus.length; j++) {
	                    _this.$(menus[j]).className = closeClass;
	                    _this.$(divs[j]).style.display = "none";
	                }
	                _this.$(menus[this.value]).className = openClass;
	                _this.$(divs[this.value]).style.display = "block";
	            }
	        }
	    },
	    $: function(oid) {
	        if (typeof(oid) == "string")
	            return document.getElementById(oid);
	        return oid;
	    }
	}
	window.onload = function() {
	    var SDmodel = new scrollDoor();
	    SDmodel.sd(["m01", "m02", "m03", "m04"], ["c01", "c02", "c03", "c04"], "active", "inactive");
	}
	// 分配业务员
	$('.salesList a').click(function(){
		$(this).siblings('a').removeClass('active');
		if($(this).hasClass('active')){
			$(this).removeClass('active');
		}
		else {
			$(this).addClass('active');
		}
	});

	$('.sendMessage').click(function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
		}
		else {
			$(this).addClass('active');
		}
	});

});