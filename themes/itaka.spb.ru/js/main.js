jQuery(document).ready(function($){

// default text removal from input on click
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

// 	jquery tools tabs attachment

	$("ul.tabs").tabs("div.panes > div", {current: 'active'});
	$(".map_tabs ul").tabs("div.panes > div", {current: 'active'});
	$("ul.tabs").tabs("div.panel > div", {current: 'active'});

	$(".tabs_side_search").tabs("div.panes_side_search > div", {current: 'active'});
	
	$("ul.tabs_select").tabs("div.panes", {effect: 'ajax', history: true, onClick:function(){
		checkWidth();
	}});

	var tabsAPI = $("ul.tabs_select").data("tabs");
	$(".dropdown_home").dropkick({
		theme: 'obj',
		change: function (value, label) {
			tabsAPI.getPanes().hide().eq(value).show();
		}
	});

//	if( $('#content_news .panel').length ) {
//		$("#left_side_bar").tabs("#content_news .panel", {effect: 'ajax', history: true, onClick:function(){
//			checkWidth();
//		}});
//	}

//	if( $("#content_vacancy .panel").length ) {
//		$("#left_side_bar").tabs("#content_vacancy .panel", {effect: 'ajax', history: true, onClick:function(){
//			checkWidth();
//		}});
//	}
// dropkick attachment
	$('.dropdown').dropkick();

// responsive design realization
	function checkWidth() {
		var curWidth = $('#wrap').width();
		
		var minSize = 980;
		var midSize = 1260;
		var maxSize = 1600;
		
		if( curWidth < 1260 ) {
			$("#services").hide();
			$("#puzomerka").hide();
			$("#info_footer").hide();
			$(".ceo_photo").hide();
			$(".obj_four_room").hide();
			$(".director").hide();
			$(".director980").show();
			$(".director_photo").hide();
			$(".right_ind_info_block").insertAfter("#inform_block");
			$("#responsive_style").attr("href", "css/small_responsive.css");
		}
		
		else if( curWidth < 1610 ) {
			$("#services").show();
			$("#puzomerka").show();
			$("#info_footer").show();
			$(".ceo_photo").show();
			$(".obj_four_room").show();
			$(".director_photo").show();
			$(".director").show();
			$(".director980").hide();
			$(".right_ind_info_block").insertAfter(".ind_articles");
			$("#responsive_style").attr("href", "/themes/itaka.spb.ru/css/medium_responsive.css");
		}
		
		else {
			$("#services").show();
			$("#puzomerka").show();
			$("#info_footer").show();
			$(".ceo_photo").show();
			$(".obj_four_room").show();
			$(".director_photo").show();
			$(".director").show();
			$(".director980").hide();
			$("#responsive_style").attr("href", "/themes/itaka.spb.ru/css/medium_responsive.css");
		}
	}
	
	checkWidth();
	$(window).resize( checkWidth );

// Mod boxes through fancybox plugin
	$("#consultation_link1").fancybox();
	$("#consultation_link2").fancybox();
	$("#consultation_link3").fancybox();

	$(".choice_links .city_region_choice").fancybox();
	$(".choice_links .region_choice").fancybox();
	$(".choice_links .metro_choice").fancybox();
	$(".choice_links .house_choice").fancybox();
	$(".choice_links .floor_choice").fancybox();
	$(".choice_links .train_station_choice").fancybox();

	$("#letter_link").fancybox();
	$("#letter_sent_link").fancybox();


// scrollable with jquery tools
	$(".scrollable").scrollable({circular: true});
  
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

// sliding down and up sidesearch
	$("#home_adv_link").click( function(){
		$(".advanced_search").toggle();
		var link = $(this);
		if( link.html().match(/Расширенный/) ) {
			link.html('Простой поиск <img src="images/choice_search_up.png" alt="">');
		} else {
			link.html('Расширенный поиск <img src="images/choice_search.png" alt="">');
		}
		return false;
	});

// sidesearch options choice 
	$("#search_option_home1 li").click(function() {
		$(this).siblings().removeClass("current_option");
		$(this).addClass("current_option");
		$("#object_type").attr("value", $(this).attr('obj-type') );
	});

	$("#search_option_home2 li").click(function() {
		$(this).siblings().removeClass("current_option");
		$(this).addClass("current_option");
		$("#object_type").attr("value", $(this).attr('obj-type') );
	});

	$("#search_option_rent li").click(function() {
		$(this).siblings().removeClass("current_option");
		$(this).addClass("current_option");
		$("#object_type").attr("value", $(this).attr('obj-type') );
	});

	$("#search_option_rent2 li").click(function() {
		$(this).siblings().removeClass("current_option");
		$(this).addClass("current_option");
		$("#object_type").attr("value", $(this).attr('obj-type') );
	});

	$("#catalogue_title div").click(function (){
		$(this).siblings().removeClass("active_choice");
		$(this).addClass("active_choice");
		$("#operation_type").attr("value", $(this).attr('operation-type') );
	});

	$("#search_option_zn li").click(function() {
		$(this).siblings().removeClass("current_option");
		$(this).addClass("current_option");
		$("#object_type").attr("value", $(this).attr('search-opt') );
	});
	

	$("#table_object .table_block4").click( function(){
		$("#table_object .table_block4 a").toggle();
		var priceSort = $(this);
		if( priceSort.html().match(/от/) ) {
			priceSort.html('<a>Цена до</a><img src="images/arrow_price_up.png" alt="">');
		} else {
			priceSort.html('<a>Цена от</a><img src="images/arrow_price.png" alt="">');
		}
		return false;
	});

});