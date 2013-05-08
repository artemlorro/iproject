jQuery(document).ready(function($){

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

	$( "#slider-range2" ).slider({
		range: true,
		min: 0.5,
		max: 20,
		values: [ 5.5, 15 ],
		slide: function( event, ui ) {
			$( "#price_label2 span.min" ).html(ui.values[ 0 ]);
			$( "#price_label2 span.max" ).html(ui.values[ 1 ]);
			$( "#price_min2" ).val(ui.values[ 0 ]);
			$( "#price_max2" ).val(ui.values[ 1 ]);
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

	$( "#slider-square_grounds-range" ).slider({
		range: true,
		min: 20,
		max: 150,
		values: [ 50, 90 ],
		slide: function( event, ui ) {
			$( "#square_grounds_label span.min" ).html(ui.values[ 0 ]);
			$( "#square_grounds_label span.max" ).html(ui.values[ 1 ]);
			$( "#square_grounds_min" ).val(ui.values[ 0 ]);
			$( "#square_grounds_max" ).val(ui.values[ 1 ]);
		}
	});

	$( "#slider-square_house-range" ).slider({
		range: true,
		min: 20,
		max: 150,
		values: [ 50, 90 ],
		slide: function( event, ui ) {
			$( "#square_house_label span.min" ).html(ui.values[ 0 ]);
			$( "#square_house_label span.max" ).html(ui.values[ 1 ]);
			$( "#square_house_min" ).val(ui.values[ 0 ]);
			$( "#square_house_max" ).val(ui.values[ 1 ]);
		}
	});
	
	$( "#price_label span.min" ).html('5.5');
	$( "#price_label span.max" ).html('15');
	$( "#price_label2 span.min" ).html('5.5');
	$( "#price_label2 span.max" ).html('15');
	$( "#square_label span.min" ).html('50');
	$( "#square_label span.max" ).html('90');
	$( "#square_grounds_label span.min" ).html('50');
	$( "#square_grounds_label span.max" ).html('90');
	$( "#square_house_label span.min" ).html('50');
	$( "#square_house_label span.max" ).html('90');
});