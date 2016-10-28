<?php
	//
	// Casberry
	//


	$functions_path = TEMPLATEPATH . '/functions/';	


	// Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links' );

	// Theme options page
	require_once ( TEMPLATEPATH . '/options/options.php' );

	//Post types
	include_once($functions_path . 'post_types.php');

	//Meta boxes
	//include_once($functions_path . 'menu_classes.php');
	
	//Shortcodes
	require_once $functions_path . 'theme_shortcodes/shortcodes.php';
	//include_once($functions_path . 'theme_shortcodes/alert.php');
	include_once($functions_path . 'theme_shortcodes/tabs.php');
	include_once($functions_path . 'theme_shortcodes/toggle.php');
	//include_once($functions_path . 'theme_shortcodes/html.php');

	if( is_admin() ){
		// Taxonomy custom fields
		//include_once($functions_path . 'category-meta.php');

		//tinyMCE includes
		include_once($functions_path . 'theme_shortcodes/tinymce_shortcodes.php');
		include_once($functions_path . '/add_thumbs_to_admin.php');
	}


	// Get language code from WPML if one of plugin is enabled
	if( function_exists('icl_get_languages')){
		$lang = ICL_LANGUAGE_CODE;
	}else{
		$default_lang = explode('-', get_bloginfo( 'language' ));
		$lang = $default_lang[0];
	}

	$txt = get_option( 're_opt_'.$lang ); 

	function _t($val){
		global $txt;
		echo $txt[$val];
	}

	function __t($val){
		global $txt;
		return $txt[$val];
	}

	//Category meta
	//include_once($functions_path . 'category_meta.php');


	add_action( 'after_setup_theme', 're_setup_template' );
	function re_setup_template(){
		add_theme_support( 'post-thumbnails' );
		
		//add_image_size( 'tiny', 78, 81, true );

		register_nav_menus( array( 'top-menu' => __( 'Top menu', 'casberry')  ) );
	}


	// Ajax cart update
	add_action('wp_ajax_re_update_guru', 're_update_guru');
	add_action('wp_ajax_nopriv_re_update_guru', 're_update_guru' );
	function re_update_guru() {
		unset( $_POST['action'] );

		if( isset($_POST['step-1']) and isset($_POST['step-6']) ){

			
			echo 'ok';
		}else{
			echo 'not ok';
		}
		die();
	}



    if (function_exists('register_sidebar')) {
		
		register_sidebar(array(
    		'name' => __('Left Sidebar', 'casberry'),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the left sidebar.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
			register_sidebar( array(
		'name' => __( 'Right Sidebar', 'casberry' ),
		'id' => 'sidebar-2',
    		'description'   => __( 'These are widgets for the homepage, right sidebar.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
	) );
		
				register_sidebar( array(
		'name' => __( 'Homepage', 'casberry' ),
		'id' => 'sidebar-3',
    		'description'   => __( 'These are widgets for the homepage.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
	) );
        				register_sidebar( array(
		'name' => __( 'Cart', 'casberry' ),
		'id' => 'sidebar-4',
    		'description'   => __( 'These are widgets for the homepage.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
	) );

    }

    add_action('admin_init', 'casberry_admin_JS_init_method');
	function casberry_admin_JS_init_method() {

		wp_enqueue_script('adminjs', get_template_directory_uri() . '/functions/admin_js.js', 'jquery', false);
		wp_enqueue_style('adminjs', get_template_directory_uri() . '/functions/admin_css.css', 'jquery', false);
		
	}

	function cc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

	function fix_svg_thumb_display() {
	  echo '
	    td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
	      width: 100% !important; 
	      height: auto !important; 
	    }
	  ';
	}
	//add_action('admin_head', 'fix_svg_thumb_display');
	
	
	function make_blog_name_from_name($name = '') {
		return get_bloginfo('name');
	}
	function make_blog_email_from_host( $email_address = null ){
		return 'noreply@' . $_SERVER['SERVER_NAME'];
	}
	add_filter('wp_mail_from_name', 'make_blog_name_from_name');
	add_filter( 'wp_mail_from', 'make_blog_email_from_host' );
	
	
	function make_safe($variable) {
	    $variable = strip_tags(trim($variable));
	    return $variable;
	}


	add_action( 'get_header', 'mighty_enqueue_head_scripts' );
	if ( !function_exists( 'mighty_enqueue_head_scripts' ) ) {
		function mighty_enqueue_head_scripts() {
			//wp_enqueue_style( 'fancybox', get_bloginfo('template_url')."/css/jquery.fancybox.css", FALSE, '1.0' ); 
			//wp_enqueue_style( 'slick', get_bloginfo('template_url')."/css/idangerous.swiper.css", FALSE, '1.0' ); 
		}
	}
	
	
	add_action('get_footer', 'casberry_JS_init_method');
	function casberry_JS_init_method() {
		// Load jQuery
		if ( !is_admin() ) {
			wp_enqueue_script('jquery');
				
			//wp_enqueue_script('easing', get_template_directory_uri() . '/js/easing.js', 'jquery', false);
			//wp_enqueue_script('theme-slides', get_bloginfo('template_url').'/js/idangerous.swiper.js', 'jquery');
			
			//if( current_user_can('manage_options') ) wp_enqueue_script('theme-slides', get_bloginfo('template_url').'/js/admin_func.js', 'slides');
		}
	}



	// Removes from admin bar
	function mytheme_admin_bar_render() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('comments');
	}
	//add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
	
	
	
	// Apply parent template to all subpages
	add_action('template_redirect','switch_page_template');
	function switch_page_template() {
		global $post;
		// Checks if current post type is a page, rather than a post
		if (is_page()){	
			$ancestors = $post->ancestors;

			if ($ancestors) {
				$current_page_template = get_post_meta($post->ID,'_wp_page_template',true);
				$parent_page_template = get_post_meta(end($ancestors),'_wp_page_template',true);
				$template = TEMPLATEPATH . "/{$parent_page_template}";
				
				//print_r($current_page_template);
				if (file_exists($template)) {
					if( $current_page_template == 'default' ){
						load_template($template);
						exit;
					} else {
						return true;
					}
				}
			} else {
				return true;
			}
		
		}
	}
	/////////////////

	

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

    
    //add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.
		
	
	
	
		
	// text trimmer
	function wpwr_trimmer($mytitle, $length){	
		if ( mb_strlen($mytitle) >$length ){
			$mytitle = mb_substr( $mytitle,0,$length);
			return $mytitle . '...';
		}else{
			return $mytitle;
		}
	}
	
	function wpwr_extrimmer($mytitle, $length){	
		if ( mb_strlen($mytitle) >$length ){
			$mytitle = mb_substr( $mytitle,0,$length);
			return $mytitle . '... <img src="'. get_bloginfo('template_directory') .'/i/arrow2.png" alt=""/>';
		}else{
			return $mytitle;
		}
	} 
	
	
	#
	# Function to return post featured image or first image in post
	#
	function get_that_image_url( $postid, $imagesize = 'large'){
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), $imagesize, false, '' );
		if( $img[0] == '' ){
			$img = catch_that_image();
		}else{
			$img = $img[0];
		}
		return $img;
	}
	
	
	function catch_that_image() {
	  global $post, $posts;
	  $first_img = '';
	  ob_start();
	  ob_end_clean();
	  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	  $first_img = $matches [1] [0];

	  if(empty($first_img)){ //Defines a default image
		$first_img = get_bloginfo('tmplate_url') . "/i/default.jpg";
	  }
	  return $first_img;
	}
	
	
	function RE_pagination($pages = '', $range = 999)
	{ 
	
		global $paged; if(empty($paged)) $paged = 1;
		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages){ $pages = 1; }
		}
		if(1 != $pages){
			echo "<div class='pagination'>";
				if($paged > 1 && $showitems < $pages) echo "<a  href='".get_pagenum_link($paged - 1)."' class='page-numbers'>&lsaquo;</a>";
				
				for ($i=1; $i <= $pages; $i++){
					
					if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					echo ($paged == $i)? "<span class='page-numbers'><span class='current'>".$i."</span></span>":"<a  href='".get_pagenum_link($i)."' class='page-numbers'>".$i."</a>";
					}
				}
				if ($paged < $pages && $showitems < $pages) echo "<a  href='".get_pagenum_link($paged + 1)."' class='page-numbers'>&rsaquo;</a>";
		   
			echo "</div>";
		}
	 }
	//add_filter('get_pagenum_link', 'qtranslate_next_previous_fix');


	function wp_corenavi() {
	  	global $wp_query;
	  	$pages = '';
	  	$max = $wp_query->max_num_pages;
	  	if (!$current = get_query_var('paged')) $current = 1;
	  	$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	  	$a['total'] = $max;
	  	$a['current'] = $current;

	  	$total = 1; 
	  	$a['mid_size'] = 3; 
	  	$a['end_size'] = 1;
	  	$a['prev_text'] = '&laquo;'; 
	  	$a['next_text'] = '&raquo;'; 

	  	if ($max > 1) echo '<div class="navigation column medium-12">';
	  	if ($total == 1 && $max > 1) $pages = '<span class="pages">' . __('Page', 'casberry') . $current . ' ' . __('of', 'casberry') . ' ' . $max . '</span>'."\r\n";
	  	echo $pages . paginate_links($a);
	 	if ($max > 1) echo '</div>';
	}

	

	//add_filter( 'gettext', 'theme_change_fields', 20, 3 );
	function theme_change_fields( $translated_text, $text, $domain ) {
		$lang = qtrans_getLanguage();
		switch ( $translated_text ) {
	
			case 'Some text' :
	
				$translated_text = __( 'First Name ', 'theme_text_domain' ) . $lang;
				break;
	
			case 'Email' :
	
				$translated_text = __( 'Email Address', 'theme_text_domain' );
				break;
		}
	
	
		return $translated_text;
	}

/// WOOCOMMERCE
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//add_action( 'woocommerce_single_product_summary', 'dev_designs_show_sku', 5 );
//function dev_designs_show_sku(){
//    global $product;
//    echo '<p>Only ' . $product->get_sku() . 'piece(s) in our warehouse:</p>';
//}
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


function woocommerce_template_product_description() {
woocommerce_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );

function woocommerce_template_product_reviews() {
woocommerce_get_template( 'single-product-reviews.php' );
}
add_action( 'woocommerce_after_single_product_summary', 'comments_template', 50 );
//add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_product_reviews', 50 );

?>