</div>
 	</div><!-- /.large-5 -->
  	<div class="large-2 medium-3 columns right_side">
  	<div class="same_as">
  	<?php get_sidebar('side'); ?>
		</div>
  	</div>
</div>
	</div> <!-- /.row -->
	
<footer id="footer">
  		<div class="row">
          <div class="column medium-2">
            <p>
            	<?php 
_t('contact_title');
echo ('</br>');
_t('contact_sub1_title');
echo ('</br>');
_t('contact_sub1_mail');
echo ('</br>');
_t('contact_sub1_tel');
echo ('</br>');
_t('contact_sub1_day');
echo ('</br>');
_t('contact_sub1_time');
echo ('</br>');

_t('contact_sub2_title');
echo ('</br>');
_t('contact_sub2_mail');
echo ('</br>');
_t('contact_sub2_tel');
echo ('</br>');
_t('contact_sub2_day');
echo ('</br>');
_t('contact_sub2_time');
echo ('</br>');
				?>
            </p>
          </div>
           <div class="column medium-2">
            Hel
              <ul>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            </ul>
          </div>
           <div class="column medium-2">
           About
             <ul>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            </ul>
          </div>
           <div class="column medium-2">
            Marketplace
              <ul>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            </ul>
          </div>
           <div class="column medium-2">
            Social
              <ul>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            </ul>
          </div>
           <div class="column medium-2">
            Job
              <ul>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            	<li>Item</li>
            </ul>
          </div>
          
      </div>
  </footer>

<div class="hintbar">
	<div class="row">
		<div class="large-12">
			<p><?php _e('Lorem ipsum dolor sit amet...','casberry');?></p>
		</div>
	</div>
</div>
</div>


<?php wp_footer(); ?>

<script src="<?php bloginfo('template_directory'); ?>/bower_components/foundation/js/foundation.min.js"></script>
<!-- <script src="<?php bloginfo('template_directory'); ?>/js/jquery.mousewheel-3.0.6.pack.js"></script> -->
<!-- <script src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox.js"></script> -->
<!-- <script src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox-media.js"></script> -->


<!--<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/slick/slick.min.js"></script>

<script src="<?php bloginfo('template_directory'); ?>/js/app.js"></script>

<!-- <script src="<?php bloginfo('template_directory'); ?>/js/functions.js"></script> -->

<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
	 
<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
-->
	
</body>

</html>
