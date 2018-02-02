<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clm
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<a href="<?php the_permalink(); ?>">
		<div class="cocktail-item col-md-4">
			<?php if ( has_post_thumbnail() ) { ?>
					<div class="cocktail-image">
							<?php the_post_thumbnail(); ?>
					</div>
			<?php } ?>
			<div class="cocktail-title">
				<?php echo get_the_title(); ?>
			</div>
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php clm_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</a>
		</div><!-- .entry-header -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
