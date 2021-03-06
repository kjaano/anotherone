<?php


function do_step($atts, $content = null){
	extract(shortcode_atts(
        array(
            'num' => '1',
    ), $atts));

    $output = '<div class="process clearfix process-step-'.$num.'">';
	    $output .= '<div class="wrap">';
	   		$output .= do_shortcode($content);
	    $output .= '</div>';
    $output .= '</div>';

    return $output;
}


add_shortcode('step', 'do_step');





function do_clearfix($atts, $content = null){
	extract(shortcode_atts(
        array(
            'class' => ''
    ), $atts));


    $output = '<div class="clearfix '.$class.'">';
	   	$output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
}
add_shortcode('clearfix', 'do_clearfix');


function do_row($atts, $content = null){

    $output = '<div class="row">';
	   	$output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
}
add_shortcode('row', 'do_row');


function do_box($atts, $content = null){

    $output = '<div class="box">';
	   	$output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
}
add_shortcode('box', 'do_box');


function do_grid($atts, $content = null){
	extract(shortcode_atts(
        array(
            'large' => '4',
            'medium' => '6',
            'class' => ''
    ), $atts));

    $output = '<div class="columns medium-'.$medium.' large-'.$large.' '.$class.'">';
	    $output .= '<div class="wrap">';
	   		$output .= do_shortcode($content);
	    $output .= '</div>';
    $output .= '</div>';

    return $output;
}


add_shortcode('grid', 'do_grid');


function do_name($atts, $content = null){
	extract(shortcode_atts(
        array(
            'title' => 'Илья Семёнов',
            'subtitle' => 'Руководитель компании «МузКафе»',
            'class' => 'green'
    ), $atts));

    $output = '<div class="thename '.$class.'">';
	    $output .= '<h3 class="name">';
	   		$output .= $title;
	    $output .= '</h3>';
	    $output .= '<h5 class="name">';
	   		$output .= $subtitle;
	    $output .= '</h5>';
    $output .= '</div>';

    return $output;
}


add_shortcode('name', 'do_name');


function do_hide_on_mobile($atts, $content = null){
	$output = '<div class="show-for-medium-up">';
	   	$output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
}
add_shortcode('hide_on_mobile', 'do_hide_on_mobile');



function do_button($atts, $content = null){
	extract(shortcode_atts(
        array(
            'title' => 'Кнопка',
            'url' => '#',
            'class' => 'red'
    ), $atts));
	$output = '';
	if($class == 'guru2') $output .= '<span class="preguru">';
    	$output .= '<a href="'.$url.'" class="content-btn '.$class.'">'.$title.'</a>';
    if($class == 'guru2') $output .= '</span>';
    return $output;
}


add_shortcode('button', 'do_button');


/**
 * Dropcap
 *
 */

function dropcap_shortcode($atts, $content = null) {

    extract(shortcode_atts(
        array(
            'num' => '1',
            'grid' => '6',
            'heading' => '',
            'text' => '',
            'class' => 'white'
    ), $atts));

    $svg = get_bloginfo('template_url') . '/i/dropcap.svg';
    $svg = file_get_contents($svg);

    $output = '<div class="dropcap columns medium-'.$grid.' color-'.$class.' fix_dropcap">';
	    $output .= '<div class="cap">';
	    	$output .= '<div class="num">'.$num.'</div>'; 	
	    	$output .= $svg;
	    $output .= '</div>';
	    $output .= '<div class="wr">';
	    	$output .= '<h3>'.$heading.'</h3>';
	    	$output .= '<p>'.$text.'</p>';
	    $output .= '</div>';
    $output .= '</div><!-- .dropcap (end) -->';

    return $output;

}

add_shortcode('dropcap', 'dropcap_shortcode');


/**
 * Ball
 *
 */

function dotted_ball_shortcode($atts, $content = null) {

    extract(shortcode_atts(
        array(
            'align' => 'center'
    ), $atts));

    $output = '<div class="dotted_ball '.$align.'">';
    $output .= '<div class="dotted_ball_wrap">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    $output .= '</div><!-- .dotted_ball (end) -->';

    return $output;

}

add_shortcode('dotted_ball', 'dotted_ball_shortcode');



function remove_invalid_tags($str, $tags) 
{
    foreach($tags as $tag)
    {
    	$str = preg_replace('#^<\/'.$tag.'>|<'.$tag.'>$#', '', trim($str));
    }
	
    return $str;
}

// Grid Columns
function grid_column($atts, $content=null, $shortcodename ="")
{	
	$alpha = '';
	$omega = '';
	if (isset($atts[0]) && trim($atts[0]) == 'alpha') $alpha = ' alpha';
	if (isset($atts[0]) && trim($atts[0]) == 'omega') $omega = ' omega';
	if (isset($atts[0]) && trim($atts[0]) == 'alpha-omega') {
	$alpha = ' alpha';
	$omega = ' omega';
	} 
	
	//remove wrong nested <p>
	$content = remove_invalid_tags($content, array('p'));

	// add divs to the content
	$return .= '<div class="'.$shortcodename.' '.$alpha.$omega.'">';
	$return .= do_shortcode($content);
	$return .= '</div>';

	return $return;
}
add_shortcode('grid_1', 'grid_column');
add_shortcode('grid_2', 'grid_column');
add_shortcode('grid_3', 'grid_column');
add_shortcode('grid_4', 'grid_column');
add_shortcode('grid_5', 'grid_column');
add_shortcode('grid_6', 'grid_column');
add_shortcode('grid_7', 'grid_column');
add_shortcode('grid_8', 'grid_column');
add_shortcode('grid_9', 'grid_column');
add_shortcode('grid_10', 'grid_column');
add_shortcode('grid_11', 'grid_column');
add_shortcode('grid_12', 'grid_column');

// Fluid Columns
function fluid_column($atts, $content=null, $shortcodename ="")
{	
	$last = '';
	if (isset($atts[0]) && trim($atts[0]) == 'last')  $last = 'last';
	
	//remove wrong nested <p>
	$content = remove_invalid_tags($content, array('p'));


	// add divs to the content
	$return .= '<div class="'.$shortcodename.' '.$last.'">';
	$return .= do_shortcode($content);
	$return .= '</div>';
	
	if($last != '') $return .= '<div class="clear"></div>';

	return $return;
}
add_shortcode('one_half', 'fluid_column');
add_shortcode('one_third', 'fluid_column');
add_shortcode('two_third', 'fluid_column');
add_shortcode('one_fourth', 'fluid_column');
add_shortcode('three_fourth', 'fluid_column');
add_shortcode('one_fifth', 'fluid_column');
add_shortcode('two_fifth', 'fluid_column');
add_shortcode('three_fifth', 'fluid_column');
add_shortcode('four_fifth', 'fluid_column');
add_shortcode('one_sixth', 'fluid_column');
add_shortcode('five_sixth', 'fluid_column');

	
	
	
	
//Recent Posts
function shortcode_recent_posts($atts, $content = null) {
		
		extract(shortcode_atts(array(
				'type' => 'post',											 
				'category' => '',
				'custom_category' => '',
				'post_format' => 'standard',
				'num' => '5',
				'meta' => 'true',
				'thumb' => 'true',
				'thumb_width' => '120',
				'thumb_height' => '120',
				'more_text_single' => '',
				'excerpt_count' => '0',
				'custom_class' => ''
		), $atts));

		$output = '<ul class="recent-posts '.$custom_class.'">';

		global $post;
		global $my_string_limit_words;
		
		if($post_format == 'standard') { 
						
			$args = array(
						'post_type' => $type,
						'category_name' => $category,
						$type . '_category' => $custom_category,
						'numberposts' => $num,
						'orderby' => 'post_date',
						'order' => 'DESC',
						'tax_query' => array(
						 'relation' => 'AND',
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-audio', 'post-format-video'),
								'operator' => 'NOT IN'
							)
						)
						);
		
		} else { 
		
			$args = array(
				'post_type' => $type,
				'category_name' => $category,
				$type . '_category' => $custom_category,
				'numberposts' => $num,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'tax_query' => array(
				 'relation' => 'AND',
					array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array('post-format-' . $post_format)
					)
				)
				);
		
		}

		$latest = get_posts($args);
		
		foreach($latest as $post) {
				setup_postdata($post);
				$excerpt = get_the_excerpt($post->ID);
				$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url = $attachment_url['0'];
				$image = aq_resize($url, $thumb_width, $thumb_height, true);
				
				
				$post_classes = get_post_class();
				foreach ($post_classes as $key => $value) {
					$pos = strripos($value, 'tag-');
					if ($pos !== false) {
						unset($post_classes[$i]);
					}
				}
				$post_classes= implode(' ', $post_classes);
				

				$output .= '<li class="' . $post_classes . '">';
				
				
				//Aside
				if($post_format == "aside") {
					
					$output .= the_content($post->ID);
				
				} elseif ($post_format == "link") {
				
					$url =  get_post_meta(get_the_ID(), 'tz_link_url', true);
				
					$output .= '<a target="_blank" href="'. $url . '">';
					$output .= get_the_title($post->ID);
					$output .= '</a>';
				
				
				//Quote
				} elseif ($post_format == "quote") {
				
					$quote =  get_post_meta(get_the_ID(), 'tz_quote', true);
					
					$output .= '<div class="quote-wrap clearfix">';
							
							$output .= '<blockquote>';
								$output .= $quote;
							$output .= '</blockquote>';
							
					$output .= '</div>';
					
				
				//Image
				} elseif ($post_format == "image") {
				
				if (has_post_thumbnail() ):
				
				$lightbox = get_post_meta(get_the_ID(), 'tz_image_lightbox', TRUE);
				
				$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array( '9999','9999' ), false, '' );
				
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
				$image = aq_resize( $img_url, 200, 120, true ); //resize & crop img
				
				
				$output .= '<figure class="featured-thumbnail large">';
					$output .= '<a class="image-wrap" rel="prettyPhoto[gallery]" title="' . get_the_title($post->ID) . '" href="' . $src[0] . '">';
					$output .= '<img src="' . $image . '" alt="' . get_the_title($post->ID) .'" />';
					$output .= '<span class="zoom-icon"></span></a>';
				$output .= '</figure>';
				
				endif;
				
				
				//Audio
				} elseif ($post_format == "audio") {
				
				$audio =  get_post_meta(get_the_ID(), 'tz_audio_mp3', true);
				
				$output .= '<div class="audio-wrapper">';
					$output .= '<audio src="' . stripslashes(htmlspecialchars_decode($audio)) .'" preload="none"></audio>';
				$output .= '</div>';
				$output .= '<div class="entry-content">';
					$output .= get_the_content($post->ID);
				$output .= '</div>';
				
				//Video
				} elseif ($post_format == "video") {
				
				$embed = get_post_meta(get_the_ID(), 'tz_video_embed', TRUE);
				
				
				$output .= '<figure class="video-holder">';
					$output .= stripslashes(htmlspecialchars_decode($embed));
				$output .= '</figure>';
				if($excerpt_count >= 1){
					$output .= '<div class="excerpt">';
						$output .= my_string_limit_words($excerpt,$excerpt_count);
					$output .= '</div>';
				}
				
				//Standard
				} else {
				
				if ($thumb == 'true') {
						if ( has_post_thumbnail($post->ID) ){
								$output .= '<figure class="featured-thumbnail"><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
								$output .= '<img  src="'.$image.'"/>';
								$output .= '</a></figure>';
						}
					}
							$output .= '<h4><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
									$output .= get_the_title($post->ID);
							$output .= '</a></h4>';
							if($meta == 'true'){
									$output .= '<span class="meta">';
											$output .= '<span class="post-date">';
												$output .= get_the_time( get_option( 'date_format' ) );
											$output .= '</span>';
											$output .= '<span class="post-comments">';
												$output .= '<a href="'.get_comments_link($post->ID).'">';
													$output .= get_comments_number($post->ID);
												$output .= '</a>';
											$output .= '</span>';
									$output .= '</span>';
							}
					if($excerpt_count >= 1){
						$output .= '<div class="excerpt">';
							$output .= my_string_limit_words($excerpt,$excerpt_count);
						$output .= '</div>';
					}
					if($more_text_single!=""){
						$output .= '<a href="'.get_permalink($post->ID).'" class="button" title="'.get_the_title($post->ID).'">';
						$output .= $more_text_single;
						$output .= '</a>';
					}
				
				}
				
				
				
				$output .= '<div class="clear"></div>';
				$output .= '</li><!-- .entry (end) -->';

		}
		$output .= '</ul><!-- .recent-posts (end) -->';
		return $output;
		
}

add_shortcode('recent_posts', 'shortcode_recent_posts');
	
	
	

// Recent Comments

function shortcode_recent_comments($atts, $content = null) {

    extract(shortcode_atts(array(
        'num' => '5'
    ), $atts));

    global $wpdb;
    $sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
    comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved,
    comment_type,comment_author_url,
    SUBSTRING(comment_content,1,50) AS com_excerpt
    FROM $wpdb->comments
    LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
    $wpdb->posts.ID)
    WHERE comment_approved = '1' AND comment_type = '' AND
    post_password = ''
    ORDER BY comment_date_gmt DESC LIMIT ".$num;

    $comments = $wpdb->get_results($sql);

    $output = '<ul class="recent-comments">';

    foreach ($comments as $comment) {

        $output .= '<li>';
            $output .= '<a href="'.get_permalink($comment->ID).'#comment-'.$comment->comment_ID.'" title="on '.$comment->post_title.'">';
                 $output .= strip_tags($comment->comment_author).' : '.strip_tags($comment->com_excerpt).'...';
            $output .= '</a>';
        $output .= '</li>';

    }

    $output .= '</ul>';

    return $output;

}

add_shortcode('recent_comments', 'shortcode_recent_comments');
	
	
	
	
	
//Popular Posts

function shortcode_popular_posts($atts, $content = null) {

		extract(shortcode_atts(array(
				'num' => '5'
		), $atts));
		
		$args = array(
			'numberposts' => $num,
			'orderby' => 'comment_count',
			'order' => 'DESC',
			'tax_query' => array(
			 'relation' => 'AND',
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-audio', 'post-format-video'),
					'operator' => 'NOT IN'
				)
			)
		);
		
		$popular = get_posts($args);

		$output = '<ul class="popular_posts">';

		foreach($popular as $post){
			
			$excerpt = get_the_excerpt($post->ID);
			$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
			$url = $attachment_url['0'];
			$image = aq_resize($url, 120, 120, true);
				
				setup_postdata($post);

				$output .= '<li>';
						$output .= '<a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
								$output .= get_the_title($post->ID);
						$output .= '</a>';
						
						if ( has_post_thumbnail($post->ID) ){
							$output .= '<figure class="featured-thumbnail"><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
							$output .= '<img  src="'.$image.'"/>';
							$output .= '</a></figure>';
						}
						$output .= '<div class="excerpt">';
							$output .= my_string_limit_words($excerpt,20);
						$output .= '</div>';
				$output .= '</li>';

		}

		$output .= '</ul>';

		return $output;

}

add_shortcode('popular_posts', 'shortcode_popular_posts');



//Recent Testimonials

function shortcode_recenttesti($atts, $content = null) {

		extract(shortcode_atts(array(
				'num' => '5',
				'thumb' => 'true',
				'excerpt_count' => '30'
		), $atts));

		$testi = get_posts('post_type=testi&orderby=post_date&numberposts='.$num);

		$output = '<div class="testimonials">';
		
		global $post;
		global $my_string_limit_words;

		foreach($testi as $post){
				setup_postdata($post);
				$excerpt = get_the_excerpt($post->ID);
				$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
				$url = $attachment_url['0'];
				$image = aq_resize($url, 60, 60, true);
				$post_meta = of_get_option('post_meta');

				$output .= '<div class="testi_item">';
						if ($thumb == 'true') {
							if ( has_post_thumbnail($post->ID) ){
								$output .= '<figure class="featured-thumbnail">';
								$output .= '<img  src="'.$image.'"/>';
								$output .= '</figure>';
							}
						}
						$output .= '<div class="extra-wrap">';
						
							$output .= '<time datetime="'.get_the_time('Y-m-d\TH:i').'">';
								$output .= get_the_time('d-m-Y');
							$output .= '</time>';
							
							$output .= '<h4>';
								$output .= '<a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
									$output .= get_the_title($post->ID);
								$output .= '</a>';
							$output .= '</h4>';
							
							$output .= '<blockquote>';
								$output .= my_string_limit_words($excerpt,$excerpt_count);
							$output .= '</blockquote>';
						
						$output .= '</div>';
						
				$output .= '</div>';

		}

		$output .= '</div>';

		return $output;

}

add_shortcode('recenttesti', 'shortcode_recenttesti');
	
	
	
	
//Tag Cloud

function shortcode_tags($atts, $content = null) {

		$output = '<div class="tags-cloud clearfix">';

		$tags = wp_tag_cloud('smallest=8&largest=8&format=array');

		foreach($tags as $tag){
				$output .= $tag.' ';
		}

		$output .= '</div><!-- .tags-cloud (end) -->';

		return $output;

}

add_shortcode('tags', 'shortcode_tags');




// Audio Player

function shortcode_audio($atts, $content = null) {
		
    extract(shortcode_atts(array(
        'file' => '',
				'desc' => ''
    ), $atts));
    
    $template_url = get_template_directory_uri();
    $id = mt_rand();
    $mp3 = strpos($file, ".mp3");

    $output  = '<div class="audio-wrapper"><audio src="';

    if($mp3 !== false){
        
        $output .= $file;

    } else {

        _e("The URL you entered is not a .mp3 file.", "theme1669");

    }

    $output  .= '"preload="auto"></audio>';
		$output  .= '<div class="audio-desc">';
			$output  .= $desc;
		$output  .= '</div></div>';

    return $output;

}

add_shortcode('audio', 'shortcode_audio');




// Video Player

function shortcode_video($atts, $content = null) {

    extract(shortcode_atts(array(
        'file' => '',
        'image' => '',
        'width' => '560',
        'height' => '349',
        'color' => 'black'
    ), $atts));

    $template_url = get_bloginfo('template_url');

    $video_url = $file;

    //Check for video format
    $vimeo = strpos($video_url, "vimeo");
    $youtube = strpos($video_url, "youtube");
    $flv = strpos($video_url, ".flv");

    $output = '<div class="video-wrap">';

    //Display video
    if($vimeo !== false){

        //Get ID from video url
        $video_id = str_replace( 'http://vimeo.com/', '', $video_url );
        $video_id = str_replace( 'http://www.vimeo.com/', '', $video_id );

        //Display Vimeo video
        $output .= '<iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>';

    } elseif($youtube !== false){

        //Get ID from video url
        $video_id = str_replace( 'http://youtube.com/watch?v=', '', $video_url );
        $video_id = str_replace( 'http://www.youtube.com/watch?v=', '', $video_id );
        $video_id = str_replace( '&feature=channel', '', $video_id );
        $video_id = str_replace( '&feature=channel', '', $video_id );

        $output .= '<iframe title="YouTube video player" class="youtube-player" type="text/html" width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video_id.'" frameborder="0"></iframe>';

    } elseif($flv !== false){

        $output .= mytheme_video($video_url, $image, $width, $height, $color);

    } else {

        _e("You entered a video URL that isn't compatible with this shortcode.", "theme1669");

    }

    $output .= '</div><!-- .video-wrap (end) -->';

    return $output;

}

add_shortcode('video', 'shortcode_video');




//add_action( 'after_setup_theme', 'my_setup' );
?>