<?php
function defer_parsing_of_js ( $url ) {
if ( FALSE === strpos( $url, '.js' ) ) return $url;
if ( strpos( $url, 'jquery.js' ) ) return $url;
return "$url' defer ";
}
add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
/* 
 * Stop Foundation from stripping out standard core WordPress menu item classes that 
 * no theme should be removing
 */

// Custom widget area.
 register_sidebar( array(
    'name' => __( 'Custom Widget Area'),
    'id' => 'custom-widget-area',
    'description' => __( 'An optional custom widget area for your site', 'wp-foundation-child' ),
    'before_widget' => '<li style="list-style-type:none;" id="%1$s" class="widget-container %2$s">',
    'after_widget' => "</li>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );

// Halo custom widget area.
 register_sidebar(array(
    	'id' => 'halosidebar',
    	'name' => 'Halo Sidebar',
    	'description' => 'Used for halo banners and info','wp-foundation-child',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widget-title">',
    	'after_title' => '</h4>',
    ));

function doctype_opengraph($output) {
    return $output . '
    xmlns:og="https://opengraphprotocol.org/schema/"
    xmlns:fb="https://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');
function fb_opengraph() {
    global $post;
 
    if(is_single()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium');
        } else {
            $img_src = get_stylesheet_directory_uri() . '/images/opengraph_image.png';
        }
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        ?>
 
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src; ?>"/>
 
<?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);

    
/**  TESTING CONTENT WIDTH - REMOVE IS THIS MESSES UP TEMPLATES           */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}


/** Remove Query strings from Static Resources. */
function _remove_script_version( $src ){
    $parts = explode( '?', $src );
    return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

?>
<?php remove_action('wp_print_styles', 'cc_tabby_css', 30); 

?>