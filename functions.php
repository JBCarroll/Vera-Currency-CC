<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

// function customscript() {

// 	wp_enqueue_script( 'customscript01', get_theme_file_uri( '/assets/js/custom.js' ), true );
// }

// add_action( 'wp_enqueue_scripts', 'customscript' );

function VeraCurrencyChange() {
	?>
	<script>
		function geoip(json) {
		// Get country code based on IP
		var country_code = json.country_code;

		// Set dynamic values in an object
		var price_obj = {
			prices: {
				GB: '£9.99',
				US: '$12.99',
				CA: '$12.99',
				ZA: '<?php echo the_field('netherlands'); ?>',
				AU: '$14.99',
				NZ: '50',
				NL: '€5000',
				FR: '€11.99',
				IN: '119 ₹',
				JP: 'JP¥800',
				PF: '€11.99',
			}
		},
			get_price = price_obj['prices'][country_code];

		// Check if we have a price for the visitor's country, if not we'll set a default of $12.99
		if (get_price == null) {
			display_price = '$12.99';
		} else {
			// Else the price does exist is the array
			display_price = get_price;
		}

		// Get the element we want to update by class
		$('.update_price').html(display_price); 
		}
	</script>

<script async src="https://get.geojs.io/v1/ip/geo.js"></script>
	<?php
}
add_action( 'wp_footer', 'VeraCurrencyChange' );
