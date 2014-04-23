<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Young Voices' );
define( 'CHILD_THEME_URL', 'http://www.studioissa.com/' );
define( 'CHILD_THEME_VERSION', '2.0.1' );

//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font-raleway', '//fonts.googleapis.com/css?family=Lato:500,700', array(), CHILD_THEME_VERSION );
}


add_action( 'wp_enqueue_scripts', 'prefix_enqueue_awesome' );
/**
 * Register and load font awesome CSS files using a CDN.
 *
 * @link   http://www.bootstrapcdn.com/#fontawesome
 * @author FAT Media
 */
function prefix_enqueue_awesome() {
	wp_enqueue_style( 'prefix-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array(), '4.0.3' );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

// Add Support for Media Queries on IE8 and below
add_action('wp_head','fix_media_queries_IE8');

function fix_media_queries_IE8(){
	
	return '<!--[if lt IE 9]>
	    		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
			<![endif]-->';
}

fix_media_queries_IE8();

/** Conditional html element classes for IE */
// reference from http://genesissnippets.com/conditional-css-classes-for-ie-in-genesis/
remove_action( 'genesis_doctype', 'genesis_do_doctype' );
add_action( 'genesis_doctype', 'child_do_doctype' );
function child_do_doctype() {
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7 ]> <html class="ie6" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <?php
}

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );


//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'home-top',
	'name'        => __( 'Home - Top', 'magazine' ),
	'description' => __( 'This is the Top section of the homepage.', 'magazine' ),
) );

genesis_register_sidebar( array(
	'id'          => 'home-left',
	'name'        => __( 'Home - Left', 'magazine' ),
	'description' => __( 'This is the Left section of the homepage.', 'magazine' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-middle',
	'name'        => __( 'Home - Middle', 'magazine' ),
	'description' => __( 'This is the middle section of the homepage.', 'magazine' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-right',
	'name'        => __( 'Home - Right', 'magazine' ),
	'description' => __( 'This is the middle section of the homepage.', 'magazine' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-bottom',
	'name'        => __( 'Home - Bottom', 'magazine' ),
	'description' => __( 'This is the bottom section of the homepage.', 'magazine' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-bottom-right',
	'name'        => __( 'Home - Bottom Right', 'magazine' ),
	'description' => __( 'This is the bottom section of the homepage.', 'magazine' ),
) );
genesis_register_sidebar( array(
	'id'          => 'after-entry',
	'name'        => __( 'After Entry', 'magazine' ),
	'description' => __( 'This is the after entry section.', 'magazine' ),
) );




//* Add new image sizes
add_image_size( 'home-middle', 360, 200, true );
add_image_size( 'home-top', 750, 420, true );
add_image_size( 'sidebar-thumbnail', 100, 100, true );



/** Add support for custom header */
/**add_theme_support( 'genesis-custom-header', array(
	'flex-height'	=> true,
	'height'		=> 100,
	'width'			=> 320
) );
*/


// Replace header hook to include logo 
/**remove_action( 'genesis_header', 'genesis_do_header' ); 
add_action( 'genesis_header', 'genesis_do_new_header' ); 
function genesis_do_new_header() { 
    echo '<div class="title-area"><img src="wp-content/themes/young-voices-ri/images/young-voices-logo.png" alt="Young Voices Logo" />'; 
    do_action( 'genesis_site_title' ); 
    do_action( 'genesis_site_description' ); 
    echo '</div><!-- end .title-area -->'; 
    if ( is_active_sidebar( 'header-right' ) || has_action( 'genesis_header_right' ) ) { 
        echo '<aside class="widget-area header-widget-area">'; 
        do_action( 'genesis_header_right' ); 
        dynamic_sidebar( 'header-right' ); 
        echo '</div><!-- end .widget-area -->'; 
    } 
}
*/


//* Modify the size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'magazine_author_box_gravatar' );
function magazine_author_box_gravatar( $size ) {

	return 140;

}

//* Modify the size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'magazine_comments_gravatar' );
function magazine_comments_gravatar( $args ) {

	$args['avatar_size'] = 100;
	return $args;

}

//* Remove entry meta in entry footer
add_action( 'genesis_before_entry', 'magazine_remove_entry_meta' );
function magazine_remove_entry_meta() {
	
	//* Remove if not single post
	if ( ! is_single() ) {
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
	}

}



//* Hooks after-entry widget area to single posts
add_action( 'genesis_entry_footer', 'magazine_after_entry_widget'  ); 
function magazine_after_entry_widget() {

    if ( ! is_singular( 'post' ) )
    	return;

    genesis_widget_area( 'after-entry', array(
		'before' => '<div class="after-entry widget-area"><div class="wrap">',
		'after'  => '</div></div>',
    ) );

}

//* Remove comment form allowed tags
add_filter( 'comment_form_defaults', 'magazine_remove_comment_form_allowed_tags' );
function magazine_remove_comment_form_allowed_tags( $defaults ) {
	
	$defaults['comment_notes_after'] = '';
	return $defaults;

}



/**
 * Filter the genesis_seo_site_title function to use an image for the logo instead of a background image
 * 
 * The genesis_seo_site_title function is located in genesis/lib/structure/header.php
 * @link http://blackhillswebworks.com/?p=4144
 *
 */
 
	add_filter( 'genesis_seo_title', 'bhww_filter_genesis_seo_site_title', 10, 2 );
 
	function bhww_filter_genesis_seo_site_title( $title, $inside ){
	 
		$child_inside = sprintf( '<a href="%s" title="%s"><img src="'. get_stylesheet_directory_uri() .'/images/logo.png" title="%s" alt="%s"/></a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), esc_attr( get_bloginfo( 'name' ) ), esc_attr( get_bloginfo( 'name' ) ) );
	 
		$title = str_replace( $inside, $child_inside, $title );
	 
		return $title;
		
	}





// Add Hightlighter Shortcode
function highlight_text_shortcode( $atts , $content = null ) {

	// Code
return '<span class="highlight">' . $content . '</span>';

}
add_shortcode( 'highlight', 'highlight_text_shortcode' );


