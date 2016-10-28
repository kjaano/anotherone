<?php
/**
 * The Sidebar on the right side, containing the widget areas.
 */
?>
    <div class="signup-block">
        <button class="signup-switch">X</button>
        
        <?php echo do_shortcode('[woocommerce_my_account]'); ?>
        <?php echo do_shortcode('[woocommerce_simple_registration]'); ?>
    </div>
    <!-- /.signup-block -->
    <div class="comparison-block">
        <button class="comparison-switch">X</button>
        Comparison HERE
    </div>
    <!-- /.comparison-block -->
    <div class="shopping-block">
        <button class="shopping-switch">X</button>
        Shopping list HERE
    </div>
    <!-- /.shopping-block -->
    <div class="cart-block">
        <button class="cart-switch">X</button>
        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-4')) : else : 
        endif; ?>
    </div>
    <!-- /.cart-block -->

    <div id="sidebar_right_home">
        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-2')) : else : 
        endif; ?>
    </div>