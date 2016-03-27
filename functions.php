<?php


//////////////////////
// WORDPRESS FUNCTIONS
//////////////////////


remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); 



////////
// MENUS
////////

function menu_init() {
	register_nav_menus(
		array(
			'main_nav' => 'Main Menu',
			'footer_nav1' => 'Left Footer Menu'
		)
	);
}
add_action( 'init', 'menu_init' );


// add a home button to the header nav
/*
add_filter('wp_nav_menu_items', 'aa_custom_menu', 10, 2);
function aa_custom_menu( $items,$args ) {
	if($args->theme_location == 'main_nav') {
		$newitems = '<li id="home"><a href="'.esc_url(home_url('/')).'" title=""><i class="fa fa-home"></i><strong>Home</strong></a></li>';
		$items = $newitems.$items;
	}
	return $items;
}
*/

///////////
// EXCERPT
///////////

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	//if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	// } else {
	// 	$excerpt = implode(" ",$excerpt);
	// } 

	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}


///////////
// SIDEBARS
///////////

function sidebar_widgets_init() {

	register_sidebar( array(
		'name' => 'Main Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'sidebar2',
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'sidebar_widgets_init' );



//////////////////
// FEATURED IMAGE
/////////////////

//edit thumbnail size
if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails' );

	// CUSTOM POST IMAGE SIZE
	//add_image_size('home-thumb', 250, 200, true); //custom size
}


// remove jquery and add google's CDN version
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, null);
   //wp_register_script('jquery-ui', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js", false, null);
   wp_enqueue_script('jquery');
  // wp_enqueue_script('jquery-ui');
}

function add_fonts() {
	wp_register_style( 'font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), null );
	wp_enqueue_style('font_awesome');
}         
add_action('wp_enqueue_scripts', 'add_fonts');


///////////////////
// SHORTCODES
///////////////////

// button shortcode
function shortcode_button( $atts ) {
	
	$a = shortcode_atts ( array(
			"text" => "Read More",
			"page" => "about",
			"align" => "none"),
		$atts );
	if($a['align']=="right") {
		$style = 'style="float:right;"';
	} elseif($a['align']=="left") {
		$style = 'style="float:left;"';
	} else {
		$style = "";
	}
	if (strpos($a['page'], 'http') !== false) {
		$display = '<a href="'.$a['page'].'" target="_blank" class="outlineButton" '.$style.'>'.$a['text'].'</a>';
	} else {
		$display = '<a href="'.esc_url(home_url('/')).$a['page'].'" class="outlineButton" '.$style.'>'.$a['text'].'</a>';
	}

	$display = str_replace( array( '<p>  </p>' ), '', $display );

	return $display;
}
add_shortcode('button', 'shortcode_button');






///////////////////
// PODS FUNCTIONS
///////////////////

if(function_exists('pods')) {
	global $aa;
	$aa['name'] = get_option('companyinfo_name');
	$aa['address1'] = get_option('companyinfo_address1');
	$aa['address2'] = get_option('companyinfo_address2');
	$aa['city'] = get_option('companyinfo_city');
	$aa['province'] = get_option('companyinfo_province');
	$aa['postal'] = get_option('companyinfo_postal');
	$aa['email'] = get_option('companyinfo_email');
	$aa['phone'] = get_option('companyinfo_phone');
	$aa['hours'] = get_option('companyinfo_hours');
	$aa['facebook'] = get_option('companyinfo_facebook');
	$aa['twitter'] = get_option('companyinfo_twitter');
	$aa['google'] = get_option('companyinfo_google');
	$aa['pinterest'] = get_option('companyinfo_pinterest');
	$aa['instagram'] = get_option('companyinfo_instagram');
	$aa['googlemap'] = get_option('companyinfo_googlemap');
	$aa['facebook_widget'] = get_option('companyinfo_facebook_widget');
	$aa['facebook_sdk'] = get_option('companyinfo_facebook_sdk');
}



///////////////////
// CUSTOM FUNCTIONS
///////////////////

// GET CURRENT PAGE URL
// function curPageURL() {
// 	$pageURL = 'http';
// 	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
// 		$pageURL .= "://";
// 		if ($_SERVER["SERVER_PORT"] != "80") {
// 			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
// 		} else {
// 			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
// 		}
// 	return $pageURL;
// }


// function nicetrim($s, $n) {
//   $MAX_LENGTH = $n;
//   $str_to_count = html_entity_decode($s);
//   if (strlen($str_to_count) <= $MAX_LENGTH) {
//     return $s;
//   }

//   $s2 = substr($str_to_count, 0, $MAX_LENGTH - 3);
//   $s2 .= "...";
//   return htmlentities($s2);
// }



// FILTER STRING - LEAVE ONLY NUMBERS
// function remove_non_numeric($string) {
// 	return preg_replace('/\D/', '', $string);
// }



// FILTER STRING - LEAVE ONLY NUMBERS/LETTERS, DASH, PERIOD, SPACE
// function remove_non_alphanumeric($text) {
// 	return preg_replace("/[^a-zA-Z0-9\.\s\-]/","",$text);
// }





?>