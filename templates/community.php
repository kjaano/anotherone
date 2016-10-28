<?php 
/*
Template name: Community
*/
?>
	<?php get_header(); ?>
	
		<?php the_content();?>
			<div class="row">

				<div class="large-12 columns">
					
					

					<?php $args = array( 'post_type' => 'community', 'posts_per_page' => -1 );
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); 
    $current_id = $post->ID;
     ?>
     
     <div class="row">
							<a class="showpost" href="<?php the_permalink(); ?>">
								<div class="large-2 columns">
							
							<!--user-->
							 <?php 
       // userphoto_the_author_thumbnail()
        echo get_avatar( get_the_author_meta( 'ID' ) , 64 ); 
                                                                
$dname = get_the_author_meta('display_name');

echo '<p class="username">'. $dname .'</p>'; 
//echo '<p class="description">'. $desc .'</p>';
?>
							<?php echo 'Questions asked: ' . count_user_posts( 1 , "community"  ); ?>
							<!-- -->
							
							<?php
echo do_shortcode('[likebtn theme="youtube" icon_l="hrt1" icon_d="hrt1" lang="auto" show_like_label="0" white_label="1" popup_hide_on_outside_click="0" voting_cancelable="0" counter_clickable="1" counter_zero_show="1" share_enabled="0" lazy_load="1" loader_show="1"]');
?>
								</div>
								<div class="large-10 columns">
									<div class="show_title_wrp">
										<p class="show_date">
											<?php the_date('d.m.Y'); ?>
										</p>
										<h3>
											<?php the_title();?>
										</h3>
										<?php the_excerpt();?>
									</div>
								</div>
								<!-- /.large-10 -->
							</a>
					</div><!-- /row -->
					<hr>
					<!------------- post object --------------->
							<?php

$post_object = get_field('toode', $current_id);

if( $post_object ): 

	// override $post
	$post = $post_object;
	setup_postdata( $post ); 
	?>
			<a href="<?php the_permalink(); ?>"><?php the_title();?></a>					
						
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>
								<!------------- post object end --------------->
     <hr>
     <?php wp_reset_postdata();?>
     <?php endwhile; endif; ?>


				</div>
				</div>
			
			<?php get_footer(); ?>