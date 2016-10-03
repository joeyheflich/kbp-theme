<?php
/**
 * The template for displaying the shortcodes and icons info.
 *
 * @package kbp
 */


get_header(); ?>
<div id="content" class="site-content max-width center xl-margins">
	<div id="primary" class="content-area content-area--has-no-sidebar">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'components/content/content', 'page' );

			endwhile; // End of the loop.
			?>
			    <div id="icons" class="container">
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-mail"></i> <span class="i-name">icon-mail</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-mail-alt"></i> <span class="i-name">icon-mail-alt</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-search"></i> <span class="i-name">icon-search</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-mail-squared"></i> <span class="i-name">icon-mail-squared</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-camera-alt"></i> <span class="i-name">icon-camera-alt</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-heart"></i> <span class="i-name">icon-heart</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-heart-empty"></i> <span class="i-name">icon-heart-empty</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-star"></i> <span class="i-name">icon-star</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-star-empty"></i> <span class="i-name">icon-star-empty</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-user"></i> <span class="i-name">icon-user</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-users"></i> <span class="i-name">icon-users</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-tags"></i> <span class="i-name">icon-tags</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-lock"></i> <span class="i-name">icon-lock</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-cancel-circled"></i> <span class="i-name">icon-cancel-circled</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-cancel"></i> <span class="i-name">icon-cancel</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-tag"></i> <span class="i-name">icon-tag</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-chat"></i> <span class="i-name">icon-chat</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-comment"></i> <span class="i-name">icon-comment</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-share"></i> <span class="i-name">icon-share</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-vimeo"></i> <span class="i-name">icon-vimeo</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-rss"></i> <span class="i-name">icon-rss</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-rss-squared"></i> <span class="i-name">icon-rss-squared</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-cog"></i> <span class="i-name">icon-cog</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-cog-alt"></i> <span class="i-name">icon-cog-alt</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-down-dir"></i> <span class="i-name">icon-down-dir</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-up-dir"></i> <span class="i-name">icon-up-dir</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-left-dir"></i> <span class="i-name">icon-left-dir</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-right-dir"></i> <span class="i-name">icon-right-dir</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-left-open"></i> <span class="i-name">icon-left-open</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-right-open"></i> <span class="i-name">icon-right-open</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-down-open"></i> <span class="i-name">icon-down-open</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-angle-circled-left"></i> <span class="i-name">icon-angle-circled-left</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-angle-circled-right"></i> <span class="i-name">icon-angle-circled-right</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-angle-circled-up"></i> <span class="i-name">icon-angle-circled-up</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-angle-circled-down"></i> <span class="i-name">icon-angle-circled-down</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-angle-left"></i> <span class="i-name">icon-angle-left</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-up-open"></i> <span class="i-name">icon-up-open</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-angle-right"></i> <span class="i-name">icon-angle-right</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-angle-up"></i> <span class="i-name">icon-angle-up</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-angle-down"></i> <span class="i-name">icon-angle-down</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-angle-double-right"></i> <span class="i-name">icon-angle-double-right</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-angle-double-left"></i> <span class="i-name">icon-angle-double-left</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-angle-double-up"></i> <span class="i-name">icon-angle-double-up</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-angle-double-down"></i> <span class="i-name">icon-angle-double-down</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-globe"></i> <span class="i-name">icon-globe</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-inbox"></i> <span class="i-name">icon-inbox</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-pinterest-circled"></i> <span class="i-name">icon-pinterest-circled</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-pinterest"></i> <span class="i-name">icon-pinterest</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-pinterest-squared"></i> <span class="i-name">icon-pinterest-squared</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-reddit"></i> <span class="i-name">icon-reddit</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-reddit-squared"></i> <span class="i-name">icon-reddit-squared</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-gplus-squared"></i> <span class="i-name">icon-gplus-squared</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-gplus"></i> <span class="i-name">icon-gplus</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-google"></i> <span class="i-name">icon-google</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-github-squared"></i> <span class="i-name">icon-github-squared</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-github-circled"></i> <span class="i-name">icon-github-circled</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-github"></i> <span class="i-name">icon-github</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-git"></i> <span class="i-name">icon-git</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-vimeo-squared"></i> <span class="i-name">icon-vimeo-squared</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-vine"></i> <span class="i-name">icon-vine</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-youtube"></i> <span class="i-name">icon-youtube</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-youtube-squared"></i> <span class="i-name">icon-youtube-squared</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-youtube-play"></i> <span class="i-name">icon-youtube-play</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-tumblr-squared"></i> <span class="i-name">icon-tumblr-squared</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-tumblr"></i> <span class="i-name">icon-tumblr</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-twitch"></i> <span class="i-name">icon-twitch</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-twitter-squared"></i> <span class="i-name">icon-twitter-squared</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-twitter"></i> <span class="i-name">icon-twitter</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-linkedin-squared"></i> <span class="i-name">icon-linkedin-squared</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-linkedin"></i> <span class="i-name">icon-linkedin</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-cc-stripe"></i> <span class="i-name">icon-cc-stripe</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-cc-paypal"></i> <span class="i-name">icon-cc-paypal</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-dropbox"></i> <span class="i-name">icon-dropbox</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-facebook-squared"></i> <span class="i-name">icon-facebook-squared</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-facebook-official"></i> <span class="i-name">icon-facebook-official</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-instagram"></i> <span class="i-name">icon-instagram</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-skype"></i> <span class="i-name">icon-skype</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-spotify"></i> <span class="i-name">icon-spotify</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-soundcloud"></i> <span class="i-name">icon-soundcloud</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-trello"></i> <span class="i-name">icon-trello</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-blank"></i> <span class="i-name">icon-blank</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-gplus-circled"></i> <span class="i-name">icon-gplus-circled</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-pinterest-circled-1"></i> <span class="i-name">icon-pinterest-circled-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-tumblr-circled"></i> <span class="i-name">icon-tumblr-circled</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-linkedin-circled"></i> <span class="i-name">icon-linkedin-circled</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-facebook-circled"></i> <span class="i-name">icon-facebook-circled</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-twitter-circled"></i> <span class="i-name">icon-twitter-circled</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-vimeo-circled"></i> <span class="i-name">icon-vimeo-circled</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-flickr-circled"></i> <span class="i-name">icon-flickr-circled</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-flickr"></i> <span class="i-name">icon-flickr</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-flickr-1"></i> <span class="i-name">icon-flickr-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-paypal"></i> <span class="i-name">icon-paypal</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-instagram-1"></i> <span class="i-name">icon-instagram-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-user-1"></i> <span class="i-name">icon-user-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-help-circled"></i> <span class="i-name">icon-help-circled</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-info-circled"></i> <span class="i-name">icon-info-circled</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-chat-1"></i> <span class="i-name">icon-chat-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-mail-1"></i> <span class="i-name">icon-mail-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-facebook"></i> <span class="i-name">icon-facebook</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-calendar"></i> <span class="i-name">icon-calendar</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-location"></i> <span class="i-name">icon-location</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-video"></i> <span class="i-name">icon-video</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-phone"></i> <span class="i-name">icon-phone</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-desktop"></i> <span class="i-name">icon-desktop</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-laptop"></i> <span class="i-name">icon-laptop</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-tablet"></i> <span class="i-name">icon-tablet</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-mobile"></i> <span class="i-name">icon-mobile</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-whatsapp"></i> <span class="i-name">icon-whatsapp</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-share-1"></i> <span class="i-name">icon-share-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-globe-1"></i> <span class="i-name">icon-globe-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-twitter-1"></i> <span class="i-name">icon-twitter-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-facebook-1"></i> <span class="i-name">icon-facebook-1</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-gplus-1"></i> <span class="i-name">icon-gplus-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-pinterest-1"></i> <span class="i-name">icon-pinterest-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-tumblr-1"></i> <span class="i-name">icon-tumblr-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-linkedin-1"></i> <span class="i-name">icon-linkedin-1</span></div>
      </div>
      <div class="row">
        <div class="the-icons col col--fourth"><i class="demo-icon icon-facebook-squared-1"></i> <span class="i-name">icon-facebook-squared-1</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-evernote"></i> <span class="i-name">icon-evernote</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-lego"></i> <span class="i-name">icon-lego</span></div>
        <div class="the-icons col col--fourth"><i class="demo-icon icon-rebel"></i> <span class="i-name">icon-rebel</span></div>
      </div>
    </div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->
<?php get_footer();
