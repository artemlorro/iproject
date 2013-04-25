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
	
});