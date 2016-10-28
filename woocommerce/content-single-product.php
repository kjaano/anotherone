<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div class="product_header right">
	<a href=""><?php _e('Ratings', 'casberry');?></a>
	<a href=""><?php _e('Questions', 'casberry');?></a>
</div>

<p><?php _e('Product overview', 'casberry');?></p>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>


	<div class="summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
<div class="row">
<div class="large-12 columns">
	<div class="product-icon-container">
	<?php
if( have_rows('icons_and_text') ):
    while ( have_rows('icons_and_text') ) : the_row(); ?>
<div class="large-6 columns">
	<div class="icon" style="background-image:url( <?php the_sub_field('icon');?>);"></div>
	<span><?php the_sub_field('text');?></span>
</div>
     

  <?php  endwhile;
else :
    // no rows found
endif;
?>
</div>
</div>
</div><!-- row -->
<div class="row">
	<div class="large-12 columns">
<div class="right">
	<a href="" class="button rounded"><?php _e('Compare', 'casberry');?></a>
	<a href="" class="button rounded"><?php _e('Add to list', 'casberry');?></a>
	<a href="" class="button rounded"><?php _e('Cart', 'casberry');?></a>
</div>
	</div>
</div> <!-- row -->
	
	
	</div><!-- .summary -->
	<hr>
<!---->
<div class="row single-product-specs">
	<div class="large-12 columns">
		<h2>Info</h2>
	
	<?php
if( have_rows('specs') ):
    while ( have_rows('specs') ) : the_row(); ?>
    <div class="row single-product-specs-wrapper">
<div class="large-2 columns specs-first">
	<h3><?php the_sub_field('title');?></h3>
</div>
 <div class="large-5 columns specs-second">
	<?php the_sub_field('description');?>
	 
</div>
  <div class="large-5 columns specs-third">
	<?php the_sub_field('additional_info');?>
</div>

 <p class="read-more-specs">Read more</p>
<hr>

</div>
  <?php  endwhile;
else :
    // no rows found
endif;
?>
	</div>
	</div>
<!---->
<div class="row single-product-info-block">
	<div class="large-12 columns">
		<h2>Accessories</h2>
		
		<?php
if( have_rows('accessories') ):
    while ( have_rows('accessories') ) : the_row(); ?>
    <div class="row single-product-accessories">
<!------------- post object --------------->
							<?php

$post_object = get_sub_field('accessory');

if( $post_object ): 

	// override $post
	$post = $post_object;
	setup_postdata( $post ); 
	?>
			
					<div class="large-2 columns">
			
<?php global $product; 
echo $product->get_categories( ', ', ' ' . _n( ' ', '  ', $cat_count, 'woocommerce' ) . ' ', ' ' ); ?>
		</div>
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
?>
<div class="large-3 columns">
<?php
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
		</div>
<div class="large-7 columns">
	<?php /**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' ); ?>

	<?php /**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
?></div>

<?php
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
			<!---->
			<div class="large-12 columns">
				<div class="row single-product-accessories-sub">
	<div class="large-12 columns">
		
		
		<?php
if( have_rows('goes_well') ): ?>
  <h2>Goes well with</h2>
   <?php while ( have_rows('goes_well') ) : the_row(); ?>
    <div class="row">
<!------------- post object --------------->
							<?php

$post_object = get_sub_field('accessory2');

if( $post_object ): 

	// override $post
	$post = $post_object;
	setup_postdata( $post ); 
	?>
			
		<div class="large-2 columns">
			
<?php global $product; 
echo $product->get_categories( ', ', ' ' . _n( ' ', '  ', $cat_count, 'woocommerce' ) . ' ', ' ' ); ?>
		</div>
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
?>
<div class="large-3 columns">
<?php
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
		</div>
<div class="large-7 columns">
	<?php /**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' ); ?>

	<?php /**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
?></div>

<?php
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
		
						
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>
								<!------------- post object end --------------->
								</div><!-- row -->
								 <?php  endwhile;
else :
    // no rows found
endif;
?>
	</div>
</div><!-- row -->
				</div><!-- large-12-->
					<!---->
						
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>
								<!------------- post object end --------------->
								</div><!-- row -->
								<hr>
								 <?php  endwhile;
else :
    // no rows found
endif;
?>
	</div>
</div><!-- row -->

<!---->
------------------------------<br>
MORE stuff TO ADD<br>
Questions/Answers<br>
form for "Ask question"<br>
Ratings ( Overall rating  -    Rate this product button -    Show all ratings -    The thumbs up and thumbs down -    Their username -    The date            , avatar)<br>s
Sidebar things
	

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>



</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
