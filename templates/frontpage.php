<?php 
/*
Template name: Frontpage
*/
?>
<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row">
	<div class="large-12">
		<?php

if( have_rows('special_offers') ):
echo ('<ul class="home_special_offers">');
    while ( have_rows('special_offers') ) : the_row(); ?>

<li>
	<a href="<?php the_sub_field('url'); ?>">
		<div style="background-image: url(<?php  the_sub_field('image'); ?>);"><p><?php the_sub_field('title'); ?></p></div>
	</a>
</li>

    <?php endwhile;
echo ('</ul>');

else :

    // no rows found

endif;

?>
	</div>
	</div>

<?php endwhile; endif; ?>
<hr>

<?php get_sidebar('community'); ?>

<div class="row">
	<div class="large-12 columns">
		<div id="sidebar_right_home">
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-3')) : else : ?>
		<?php endif; ?>
	</div>
	</div>
</div>

<?php get_footer(); ?>