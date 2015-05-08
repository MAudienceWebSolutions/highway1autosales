<?php
require_once ( get_template_directory() . '/functions/styles.php' );
function wpe_excerptlength_news($length) {
    return 15;
}
function wpe_excerptlength_teaser($length) {
    return 35;
}
function wpe_excerptlength_index($length) {
    return 160;
}
function wpe_excerptmore($more) {
    return '...';
}
function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
	array(
		'header-menu' => __( 'Header Menu','language' )
	));
}
function gorilla_t() {}	
	add_action('admin_head', 'admin_register_head');	
function admin_register_head() {
	   $url = get_bloginfo('template_directory') . '/includes/options.css';
	   echo "<link rel='stylesheet' href='$url' />\n";
	}
	if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
}	
	add_theme_support( 'custom-background', array(
	// Background color default

) );
	add_theme_support( 'nav-menus' );
	add_theme_support( 'automatic-feed-links' );	
	load_theme_textdomain( 'language', TEMPLATEPATH.'/languages/' );
	$args_header = array(
	'flex-width'    => true,
	'width'         => 328,
	'flex-width'    => true,
	'height'        => 80,
	'default-image' => get_template_directory_uri() . '/images/logo.png',
);
add_theme_support( 'custom-header', $args_header );


function excerpt_featured($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
		  array_pop($excerpt);
		  $excerpt = implode(" ",$excerpt).'...';
		} else {
		  $excerpt = implode(" ",$excerpt);
		} 
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	    }		
	remove_shortcode('gallery');
	add_shortcode('gallery', 'theme_gallery_shortcode');

function theme_gallery_shortcode( ) {
	    global $post, $wp_locale;
	    return null;
	}
	add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
function my_post_image_html( $html, $post_id, $post_image_id ) {
	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
	  return $html;
	}
function my_init_method() {
	add_action('admin_print_styles-edit.php','nonqed');
}
function nonqed()
{
	?>
	<style type="text/css">
	span.inline {display:none!important}
	</style>
	<?php
}	
function my_style(){
		$options = get_option('gorilla_layout');
		if(empty($options['style']))
		{
		    echo 'style';
		}
		echo $options['style'];
	}   
function ShortenText($text) { 
        $chars = 535; 
        $text = $text." "; 
        $text = substr($text,0,$chars); 
        $text = substr($text,0,strrpos($text,' ')); 
        $text = $text."…"; 
        return $text; 
    } 
function ShortenBio($text) { 
        $chars = 185; 
        $text = $text." "; 
        $text = substr($text,0,$chars); 
        $text = substr($text,0,strrpos($text,' ')); 
        $text = $text."…"; 
        return $text; 
    } 
function ShortenExpt($text) { 
        $chars = 335; 
        $text = $text." "; 
        $text = substr($text,0,$chars); 
        $text = substr($text,0,strrpos($text,' ')); 
        $text = $text."…"; 
        return $text; 
    }     
	add_filter( 'request', 'my_request_filter' );
	
function my_request_filter( $query_vars ) {
	    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
		  $query_vars['s'] = " ";
	    }
	    return $query_vars;
	}
function gallery($post_id,$size) { 


	$saved = get_post_custom_values('CarsGallery', $post_id);
	$saved = explode(',',$saved[0]);
	if ( count($saved)>0){
		foreach( $saved as $image ) {
			$attachmenturl=wp_get_attachment_url($image);
			$attachmentimage= wp_get_attachment_image($image, $size );
			$bigp = wp_get_attachment_image($image, 'full' );
				?><a class="gallery" href="<?php echo $attachmenturl ?>"><span class="lupa" ></span><?php echo $attachmentimage; ?></a><?php
		}
	} else {
		echo "";
	}
	
	$video_source = get_post_meta($post_id, 'video_meta_box_source', true);
	$video_id = get_post_meta($post_id, 'video_meta_box_videoid', true);	
	if ($video_source && $video_id) {
		if(($video_source == "vimeo") && !empty($video_id)){ ?>
			<iframe id="gallery-video" class="gallery-video" src="http://player.vimeo.com/video/<?php echo $video_id; ?>?title=0&amp;portrait=0&amp;color=e275c7" width="739" height="330" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>
			<?php 
		} elseif(( $video_source == "youtube") && !empty($video_id)){ 
			?>
			<iframe id="gallery-video" class="gallery-video" src="http://www.youtube.com/embed/<?php echo $video_id ?>?showinfo=0"  width="739" height="330" frameborder="0" allowfullscreen></iframe>
			<?php  	
		}
	} 
}

function gallery_thumbs($post_id,$size) {
	$saved = get_post_custom_values('CarsGallery', $post_id);
	$saved = explode(',',$saved[0]);
	if ( count($saved)>0){
		foreach( $saved as $image ) {
			$attachmenturl=wp_get_attachment_url($image);
			$attachmentlink=wp_get_attachment_url($image);
			$attachmentimage= wp_get_attachment_image($image, $size );
			?><li><a href="#"><?php echo $attachmentimage; ?></a></li><?php
		}
	} else {
		echo "";
	}

	?>


	<!-- Get Video thumbnail  -->
	<?php
		$video_source = get_post_meta($post_id, 'video_meta_box_source', true);
		$video_id = get_post_meta($post_id, 'video_meta_box_videoid', true);	
		if ($video_source && $video_id) {

			if(($video_source == "vimeo") && !empty($video_id)){
				$video_link = "http://player.vimeo.com/video/$video_id";
			} elseif (( $video_source == "youtube") && !empty($video_id)) {
				$video_link = "http://www.youtube.com/embed/$video_id";
			}
			$video = Carbon_Video::create($video_link);

			?>

			<li id="video-thumb">
				<a href="#gallery-video" class='video-holder'>
					<?php 
						if ($video_source === "vimeo") {
							$video_image_link = $video->get_thumbnail();
						} else {
							$video_image_link = 'http:' . $video->get_thumbnail();
						}

						$image =  wpthumb( $video_image_link, 'width=72&height=64&crop=1' );
					?>
					<span class="play-btn"></span>
					<img src="<?php echo $image ?>" alt="" />
				</a>
			</li>

			
			<?php

		} 

}
function gallery_user($post_id,$size) {
	if ( $images = get_children(array(
		'post_parent' => get_the_ID(),
		'post_type' => 'attachment',
		'order' => 'ASC',
		'orderby' => 'menu_order',
		'post_mime_type' => 'image',
		)))
	{			foreach( $images as $image ) {
			$attachmenturl=wp_get_attachment_url($image->ID);
			$attachmentlink=wp_get_attachment_url($image->ID);
			$attachmentimage= wp_get_attachment_image($image->ID, $size );
			$bigp = wp_get_attachment_image($image->ID, 'full' );
			$img_title = $image->post_title;
			$img_desc = $image->post_excerpt;
			?><a class="gallery" href="<?php echo $attachmenturl ?>"><span class="lupa" ></span><?php echo $attachmentimage; ?></a><?php						
		}
	} else {
		echo "";
	}
}
function arrivals_user($post_id,$size) {

	if ( $images = get_children(array(
		'post_parent' => get_the_ID(),
		'post_type' => 'attachment',
		'order' => 'ASC',
		'orderby' => 'menu_order',
		'post_mime_type' => 'image',
		)))
	{			foreach( $images as $image ) {
			$attachmentimage= wp_get_attachment_image($image->ID, $size );
			$img_title = $image->post_title;
			$img_desc = $image->post_excerpt;
			
		 echo $attachmentimage; 									
		}
	} else {
		echo "";
	}
}

function gallery_thumbs_user($post_id,$size) {
	if ( $images = get_children(array(
		'post_parent' => get_the_ID(),
		'post_type' => 'attachment',
		'order' => 'ASC',
		'orderby' => 'menu_order',
		'post_mime_type' => 'image',
		)))
	{			foreach( $images as $image ) {
			$attachmenturl=wp_get_attachment_url($image->ID);
			$attachmentlink=wp_get_attachment_url($image->ID);
			$attachmentimage= wp_get_attachment_image($image->ID, $size );
			$img_title = $image->post_title;
			$img_desc = $image->post_excerpt;
			
				?><li><a href="#"><?php echo $attachmentimage; ?></a></li><?php							
		}
	} else {
		echo "";
	}
}
?>