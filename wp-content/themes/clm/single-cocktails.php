<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package clm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

<header class="entry-header">
  <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header><!-- .entry-header -->
<?php
$siteURL = get_site_url();
$themeURL = get_template_directory_uri();
echo '<a href="' . $siteURL . '/cocktails' . '" ><img class="close-cocktail" data-dismiss="modal" aria-label="Close" src="' . $themeURL . '/assets/img/close.png" alt="close"/></a>';
?>
<div class="container cocktail">
	  <div class="col-md-6">
	    <?php if (has_post_thumbnail( $post->ID ) ): ?>
	      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<div class="cocktail-image">
					 <img src='<?php echo $image[0]; ?>' />
				</div>
				<?php next_posts_link(); ?>
	    <?php endif; ?>
		</div>
		<div class="col-md-6">
	    <h2><?php the_title() ?></h2>
			<p><?php the_field('description') ?></p>
	    <p>
			<span>Skill Level:</span> <?php the_field('skill_level') ?><br />
			<span>Base Spirit: </span><?php the_field('base_spirit') ?><br />
			</p>
	    <p><span>Ingredients</span><br /><?php
				if( have_rows('ingredients') ):
				    while ( have_rows('ingredients') ) : the_row();
				        the_sub_field('ingredient');
								echo '<br />';
				    endwhile;
				else :
				endif;
				?>
		</p>
			<p><span>Method</span><br /><?php the_field('method') ?></p>
	    <div class="social-icons">
	     <?php echo do_shortcode('[Sassy_Social_Share]') ?>
	  </div>
	</div>

	<div class="col-md-12">
		<div class="embed-responsive embed-responsive-16by9" style="margin-top: 2rem;">
		  <video id='video-player' class="product-video" autoplay="autoplay" loop preload="metadata">
		    <source src="<?php the_field('cocktail_video') ?>" type="video/mp4">
		  </video>
		</div>
	</div>
</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
