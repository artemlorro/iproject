jQuery(document).ready(function($){

	var searchInput = $("#search input.search_text");
	
	searchInput.focus(function() {
		if( $(this).val() == 'Найти' ) {
			$(this).val('');
		}	
	});
	
	searchInput.blur(function() {
		if( $(this).val() == '' ) {
			$(this).val('Найти');
		}
	});
	
	var choiceInput = $("#choice_obj_name input");
	
	choiceInput.focus(function() {
		if( $(this).val() == 'Название (необязательно)' ) {
			$(this).val('');
		}
	});
	
	choiceInput.blur(function() {
		if( $(this).val() == '') {
			$(this).val('Название (необязательно)');
		}
	});
	
	var subscribeInput = $("#subscribe .subscribe_mail input");
	
	subscribeInput.focus(function() {
		if( $(this).val() == 'Введите ваш е-мэйл' ) {
			$(this).val('');
		}
	});
	
	subscribeInput.blur(function() {
		if( $(this).val() == '') {
			$(this).val('Введите ваш е-мэйл');
		}
	});

	$( "#slider-range" ).slider({
		range: true,
		min: 0.5,
		max: 20,
		values: [ 5.5, 15 ],
		slide: function( event, ui ) {
			$( "#price_label span.min" ).html(ui.values[ 0 ]);
			$( "#price_label span.max" ).html(ui.values[ 1 ]);
			$( "#price_min" ).val(ui.values[ 0 ]);
			$( "#price_max" ).val(ui.values[ 1 ]);
		}
	});
		
	$( "#slider-square-range" ).slider({
		range: true,
		min: 20,
		max: 150,
		values: [ 50, 90 ],
		slide: function( event, ui ) {
			$( "#square_label span.min" ).html(ui.values[ 0 ]);
			$( "#square_label span.max" ).html(ui.values[ 1 ]);
			$( "#square_min" ).val(ui.values[ 0 ]);
			$( "#square_max" ).val(ui.values[ 1 ]);
		}
	});

	$( "#price_label span.min" ).html('5.5');
	$( "#price_label span.max" ).html('15');
	$( "#square_label span.min" ).html('50');
	$( "#square_label span.max" ).html('90');
	

	$("ul.tabs").tabs("div.panes > div", {current: 'active'});
	$(".map_tabs ul").tabs("div.panes > div", {current: 'active'});
	
	$("ul.tabs_select").tabs("div.panes > div", {current: 'current'});

	var tabsAPI = $("ul.tabs_select").data("tabs");
	
	$(".obj_select_tabs").change (function(){
		var index = $(this).val();
		tabsAPI.getPanes().hide().eq(index).show();
	});


	function checkWidth() {
		var curWidth = $('#wrap').width();
		
		var minSize = 980;
		var midSize = 1260;
		var maxSize = 1600;
		
/*		var topLineMinSizes = [ 99 , 129 , 79 , 79 , 119 , 87 , 99 , 99 , 79 , 89  ];
		var topLineMidSizes = [ 128 , 160 , 104 , 112 , 144 , 118 , 128 , 130 , 120 , 94 ];
		var topLineMaxSizes = [ 163 , 203 , 132 , 143 , 183 , 151 , 163 , 165 , 153 , 121 ];
		
		var footerBlockMinSizes = [ 122 , 173 , 110 , 151 , 144 , 160 , 120 ];
		var footerBlockMidSizes = [ 150 , 215 , 165 , 200 , 190 , 200 , 140 ];
		var footerBlockMaxSizes = [ ];
*/		
		if( curWidth < 1260 ) {
/*			$("#main").width( minSize );
			$("#content").width( 740 );
			$(".object").css("margin", "0 5px 30px 0");
			$("#headline_block").width( minSize );
			$("#top_menu").css( "min-width", minSize);
			$("#top_menu_line").width( minSize-2);
			$("#top_menu_content").width( minSize-2);
			$("#info_line").width( minSize );*/
			$("#services").hide();
			$("#puzomerka").hide();
/*			$("#registration").css("margin", "46px 62px 0 65px");
			$("#menu").width( minSize );
			$("ul.menu_main").width( 826 );
			$("#subfooter_top").css("min-width", minSize);
			$("#subfooter_bottom").css("min-width", minSize);
			$("#footer_top").width(minSize);
			$("#footer_bottom").width( minSize );
			$("#footer_title").width(minSize);
			$("#footer_bottom ul.footer_menu").css("margin", "0 15px 0 0");*/
			$("#info_footer").hide();
/*			$("#social_block").width( 420 );
			$("#social_block div#search").css("clear", "none");
			$("#social_block div#search").css("margin-left", "60px");
			$("#social_block div#copyright").css("margin-left", "65px");
			$("#social_block div#copyright").css("padding-top", "20px");
	//$("#content_news").width( 700 );
			$("#line_month").height( 65 );
			$("#line_month ul.month").css("top", "7px");
			$(".vacancy_details").width( 450 );
			$(".index_gallery").width( 650 );
			$(".index_gallery").css("background", "url(images/gallery/banner_border_mini1.png) no-repeat");
			$(".images div img").width( 640 );
			$(".ceo_letter").width( 300 );  */
			$(".ceo_photo").hide();
/*			$(".slidetabs").css("left", "450px");
			$(".forward").css("left", "590px");
			$("#ind_object_block").width( 980 );
			$("#specobjects").width( 980 );
			$(".specobj").css("margin-right", "2px");
			$(".black_search_wrap").width( 980 );
			$(".black_search_form").width( 978 );
			$(".images div").css("top", "5px");
			$(".images div").css("left", "5px");
			$(".text_quote").width( 540 ); */
			$(".obj_four_room").hide();
			$(".director").hide();
			$(".director980").show();
			$(".director_photo").hide();
			$(".right_ind_info_block").insertAfter("#inform_block");
/*			$(".right_ind_info_block").width( 490 );
			$(".right_ind_info_block").css("margin","60px 0 30px 50px");
			$("#bl_ind_right").css("left","255px");
			$(".h1name").css("font-size", "55px");
			//$("#registration").css( "padding", "0 30px");
			//$("#reg_button").css( "float", "left");
			//$("#log_in").css( "margin-left", "9px");
			//$("log_in").css("float", "left");
			
			for (var i = 0; i < topLineMinSizes.length; i++) {
				$("#top_menu_line" + (i+1) ).width(topLineMinSizes[i]);
				$("#top_menu" + (i+1) ).width(topLineMinSizes[i]+2);
			}
			
			for (var i = 0; i < footerBlockMinSizes.length; i++) {
				$("#block" + (i+1) ).width(footerBlockMinSizes[i]);
			} */
		}
		
		else if( curWidth < 1610 ) {
			//$("#sidebar").show();
/*			$("#main").width( midSize );
			$("#content").width( 1020 );
			$(".object").css("margin", "0 13px 30px 0");
			$("#headline_block").width( midSize );
			$("#top_menu").css( "min-width", midSize);
			$("#top_menu_line").width( midSize-2);
			$("#top_menu_content").width( midSize-2);
			$("#info_line").width( midSize );   */
			$("#services").show();
			$("#puzomerka").show();
/*			$("#registration").css("margin", "46px 0 0 0");
			$("#menu").width( midSize );
			$("ul.menu_main").width( 1000 );
			$("#subfooter_top").css("min-width", midSize);
			$("#subfooter_bottom").css("min-width", midSize);
			$("#footer_top").width(midSize);
			$("#footer_bottom").width( midSize );
			$("#footer_title").width(midSize);
			$("#footer_bottom ul.footer_menu").css("margin", "0 25px 0 0");  */
			$("#info_footer").show();
/*			$("#social_block").width( 429 );
			$("#social_block div#search").css("clear", "left");
			$("#social_block div#search").css("margin-left", "0px");
			$("#social_block div#copyright").css("margin-left", "100px");
			$("#social_block div#copyright").css("padding-top", "0px");
			//$("#content_news").width( 980 );
			$("#line_month").height( 45 );
			$("#line_month ul.month").css("top", "13px");
			$(".vacancy_details").width( 730 );
			$(".index_gallery").width( 810 );
			$(".index_gallery").css("background", "url(images/gallery/banner_border.png) no-repeat");
			$(".images div img").width( 800 );
			$(".images div img").height( 319 );
			$(".ceo_letter").width( 215 );  */
			$(".ceo_photo").show();
/*			$(".slidetabs").css("left", "600px");
			$(".forward").css("left", "765px");
			$("#ind_object_block").width( 825 );
			$("#specobjects").width( 825 );
			$(".specobj").css("margin-right", "30px");
			$(".black_search_wrap").width( 797 );
			$(".black_search_form").width( 799 );
//			$(".images img").attr("src").replace("_mini","");
			$(".images div").css("top", "0");
			$(".images div").css("left", "0");
			$(".text_quote").width( 680 );   */
			$(".obj_four_room").show();
			$(".director_photo").show();
			$(".director").show();
			$(".director980").hide();
			$(".right_ind_info_block").insertAfter(".ind_articles");
/*			$(".right_ind_info_block").width( 435 );
			$(".right_ind_info_block").css("margin","20px 0 0 25px");
			$("#bl_ind_right").css("left","225px");
			$(".h1name").css("font-size", "66px");

			for (var i = 0; i < topLineMidSizes.length; i++) {
				$("#top_menu_line" + (i+1) ).width(topLineMidSizes[i]);
				$("#top_menu" + (i+1) ).width(topLineMidSizes[i]+2);
			}			
			for (var i = 0; i < footerBlockMidSizes.length; i++) {
				$("#block" + (i+1) ).width(footerBlockMidSizes[i]);
			}  */
		}
		
		else {
			//$("#sidebar").show();
/*			$("#main").width( maxSize );
			$("#content").width( 1020 );
			$(".object").css("margin", "0 13px 30px 0");
			$("#headline_block").width( maxSize );
			$("#top_menu").css( "min-width", maxSize);
			$("#top_menu_line").width( maxSize-2);
			$("#top_menu_content").width( maxSize-2);
			$("#info_line").width( maxSize ); */
			$("#services").show();
			$("#puzomerka").show();
/*			$("#registration").css("margin", "46px 0 0 0");
			$("#menu").width( maxSize );
			$("ul.menu_main").width( 1000 );
			$("#subfooter_top").css("min-width", maxSize);
			$("#subfooter_bottom").css("min-width", maxSize);
			$("#footer_top").width(maxSize);
			$("#footer_bottom").width( maxSize );
			$("#footer_title").width(maxSize);
			$("#footer_bottom ul.footer_menu").css("margin", "0 25px 0 0"); */
			$("#info_footer").show();
/*			$("#social_block").width( 429 );
			$("#social_block div#search").css("clear", "left");
			$("#social_block div#search").css("margin-left", "0px");
			$("#social_block div#copyright").css("margin-left", "100px");
			$("#social_block div#copyright").css("padding-top", "0px");
		//	$("#content_news").width( 980 );
			$("#line_month").height( 45 );
			$("#line_month ul.month").css("top", "13px");
			$(".vacancy_details").width( 730 );
			$(".index_gallery").width( 810 );
			$(".index_gallery").css("background", "url(images/gallery/banner_border.png) no-repeat");
			$(".images div img").width( 800 );
			$(".images div img").height( 319 );
			$(".ceo_letter").width( 215 ); */
			$(".ceo_photo").show();
/*			$(".slidetabs").css("left", "600px");
			$(".forward").css("left", "765px");
			$("#ind_object_block").width( 825 );
			$("#specobjects").width( 825 );
			$(".specobject").css("margin-right", "30px");
			$(".black_search_wrap").width( 797 );
			$(".black_search_form").width( 799 );
			$(".images img").attr("src").replace("_mini","");
			$(".images div").css("top", "0");
			$(".images div").css("left", "0");
			$(".text_quote").width( 680 ); */
			$(".obj_four_room").show();
			$(".director_photo").show();
			$(".director").show();
			$(".director980").hide();
/*			$(".right_ind_info_block").insertAfter(".ind_articles");
			$(".right_ind_info_block").width( 435 );
			$(".right_ind_info_block").css("margin","20px 0 0 25px");
			$("#bl_ind_right").css("left","225px");
			$(".h1name").css("font-size", "66px");

			for (var i = 0; i < topLineMaxSizes.length; i++) {
				$("#top_menu_line" + (i+1) ).width(topLineMaxSizes[i]);
				$("#top_menu" + (i+1) ).width(topLineMaxSizes[i]+2);
			}
		}*/
	}
	
	checkWidth();
	$(window).resize( checkWidth );

	$("#left_side_bar").tabs("#content_news .panel", {effect: 'ajax', history: true, onClick:function(){
		checkWidth();
	}});

	$('.dropdown').dropkick();

	// Mod boxes
	$("#consultation_link1").fancybox();
	$("#consultation_link2").fancybox();
	$("#consultation_link3").fancybox();

	$(".slidetabs").tabs(".images > div", {
		rotate: true,
		interval: 1000
    }).slideshow();

	$(".scrollable").scrollable({circular: true});
  
    //vertical scrollable with jquery tools
    $(".vertical").scrollable({vertical: true, circular: true});

    $(".vert_items img").click(function() {
	
		if ($(this).hasClass("active")) { return; }
	 
		// calclulate large image's URL based on the thumbnail URL 
		var url = $(this).attr("src").replace("_small", "");
	 
		// get handle to element that wraps the image 
		var wrap = $(".big_photo");
	 
		// the large image 
		var img = new Image();
	 
		// call this function after it's loaded
		img.onload = function() {
	 
			// change the image
			var curImg = wrap.find("img");
			curImg.attr("src", url);
			curImg.parent().attr("href", url);
	 
		};
	 
		// begin loading the image 
		img.src = url;
	 
		// activate item
		$(".vert_items img").removeClass("active");
		$(this).addClass("active");

	});
	
	$("#firstThumbnail").click();

	$("#home_adv_link").click( function(){
		$(".advanced_search").toggle();
		var link = $(this);
		if( link.html().match(/Расширенный/) ) {
			link.html('Простой поиск <img src="images/choice_search_up.png" alt=""/>');
		} else {
			link.html('Расширенный поиск <img src="images/choice_search.png" alt=""/>');
		}
		return false;
	});
	
	// responsive design realization

	function adjustStyle(width){
		if (width < 1260) {
			$("#responsive_style").attr("href", "css/small_responsive.css");
		} else {
			$("#responsive_style").attr("href", "css/medium_responsive.css");
		}
	}
	
	$(function(){
		adjustStyle($(this).width());
		$(window).resize(function(){
			adjustStyle($(this).width());
		});
	});
});