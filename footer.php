<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kbp
 */
$front_page_id = get_option( 'page_on_front' );
$credits_url = get_field( 'credits_page_url', $front_page_id );
?>
	<div id="mc_embed_signup" class="mc-area dark text-center xxl-padding">
		
		<form action="//kingbonepress.us4.list-manage.com/subscribe/post?u=cfe64f6c6cb046a96979df688&amp;id=edefb4f025" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate mc-form max-content-width" target="_blank" novalidate>
		    <div id="mc_embed_signup_scroll">
		    <h3 class="mce-title section-title heading-xlarge s-padding-bottom"><?php the_field( 'newsletter_title', $front_page_id ); ?></h3>
			<label for="mce-EMAIL" class="mce-label text-content text-normal"><?php the_field( 'newsletter_label', $front_page_id ); ?></label>
			<input type="email" value="" name="EMAIL" class="email mce-input xl-margin-top m-margin-bottom" id="mce-EMAIL" placeholder="Your Email Address" required>
		    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
		    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_cfe64f6c6cb046a96979df688_edefb4f025" tabindex="-1" value=""></div>
		    <div class="clear"><input type="submit" value="Sign Me Up" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
		    </div>
		</form>
	</div>
	<a id="back-to-top" href="#0" class="back-to-top"><i id="icon-to-top" class="back-to-top-icon icon-angle-up"></i><span class="screen-reader-text">Scroll to Top</span></a>
	<footer id="colophon" class="site-footer dark small-text xxl-padding-bottom" role="contentinfo">
		<?php echo do_shortcode('[instagram-feed]'); ?>
		<section class="footer-widget-areas footer-row max-width center clear xxl-padding-top">
			<div class="footer-menus-area clear">
				<?php dynamic_sidebar( 'footer-widgets-1' ); ?>
				<?php dynamic_sidebar( 'footer-widgets-2' ); ?>
				<?php dynamic_sidebar( 'footer-widgets-3' ); ?>
			</div>
			<div class="footer-widget-area"><?php dynamic_sidebar( 'footer-widgets-4' ); ?></div>
		</section>
		<div class="site-info clear max-width">
			<span class="footer-copy">&copy; <?php echo date("Y") ?> <?php bloginfo( 'name' ); ?>. <a href="<?php echo esc_url( $credits_url ); ?>" rel="bookmark"><?php _e( 'Credits &amp; Privacy Policy', 'kbp' ); ?></a>.</span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>