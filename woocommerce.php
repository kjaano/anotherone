<?php get_header(); ?>
<?php    if (is_shop()) { // Wrapper for the shop page

        echo '<div class="shop-wrapper">';

     } elseif (is_product_category()) {  // Wrapper for a product category page

        echo '<div class="product-category-wrapper">';
	
$term_id = get_queried_object()->term_id;
$post_id = 'product_cat_'.$term_id;
	if (get_field('choose_page_type',$post_id) == 'Option 1') {
// Option Page 1
	
if( have_rows('option_1_special_offers',$post_id) ):
echo ('<ul class="firstcat_special_offers">');
    while ( have_rows('option_1_special_offers',$post_id) ) : the_row(); ?>

<li>
	<a href="<?php the_sub_field('url',$post_id); ?>">
		<div style="background-image: url(<?php  the_sub_field('image',$post_id); ?>);"><p><?php the_sub_field('title',$post_id); ?></p></div>
	</a>
</li>
      

    <?php endwhile;
echo ('</ul><hr>');

else :

    // no rows found

endif;
        
        
// END		
} else if (get_field('choose_page_type',$post_id) == 'Option 2') {
// Option Page 2
if( have_rows('option_2_special_offers',$post_id) ):
echo ('<ul class="secondcat_special_offers">');
    while ( have_rows('option_2_special_offers',$post_id) ) : the_row(); ?>

<li>
	<a href="<?php the_sub_field('url',$post_id); ?>">
		<div style="background-image: url(<?php  the_sub_field('image',$post_id); ?>);"><p><?php the_sub_field('title',$post_id); ?></p></div>
	</a>
</li>
      

    <?php endwhile;
echo ('</ul><hr>');

else :

    // no rows found

endif;
}
	else if (get_field('choose_page_type',$post_id) == 'Option 3') {
// Option Page 3
    if( have_rows('option_3_special_offers',$post_id) ):
echo ('<ul class="thirdcat_special_offers">');
    while ( have_rows('option_3_special_offers',$post_id) ) : the_row(); ?>

<li>
	<a href="<?php the_sub_field('url',$post_id); ?>">
		<div style="background-image: url(<?php  the_sub_field('image',$post_id); ?>);"><p><?php the_sub_field('title',$post_id); ?></p></div>
	</a>
</li>
      

    <?php endwhile;
echo ('</ul><hr>');

else :

    // no rows found

endif;
}
	else if (get_field('choose_page_type',$post_id) == 'Option 4') {
// Option Page 3
       // echo ('4');
}

     } elseif (is_product()) { // Wrapper for a single product page

        echo '<div class="product-wrapper">';

} ?>


<?php 
if (get_field('show_community_questions',$post_id) == 'Yes') {
    
    get_sidebar('community');
        
} else {
    // hide community
}
// add radiobuttion option
?>

	<?php woocommerce_content(); ?>
	<?php if (is_shop()) {

       echo '</div>';

    } elseif (is_product_category()) {  

       echo '</div>';

    } elseif (is_product()) {

       echo '</div>';

    } ?>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
