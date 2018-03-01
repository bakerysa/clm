<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clm
 */

get_header('alt'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="container">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
					 $loop = new WP_Query( array( 'post_type' => 'cocktails', 'ignore_sticky_posts' => 1, 'paged' => $paged ) );
					 if ( $loop->have_posts() ) :
							 while ( $loop->have_posts() ) : $loop->the_post(); ?>
									 <div class="cocktail-item col-md-4">
										 <a href="<?php the_permalink(); ?>">
											 <?php if ( has_post_thumbnail() ) { ?>
													 <div class="cocktail-image-container">
															 <div class="cocktail-image img-responsive" style="background-image: url( <?php echo get_the_post_thumbnail_url(); ?> );"></div>
													 </div>
											 <?php } ?>
											 <div class="cocktail-title">
												 <?php echo get_the_title(); ?>
											 </div>
											 </a>
									 </div>
							 <?php endwhile;
							 if (  $loop->max_num_pages > 1 ) : ?>
									 <div id="nav-below" class="navigation">
											 <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous', 'domain' ) ); ?></div>
											 <div class="nav-next"><?php previous_posts_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'domain' ) ); ?></div>
									 </div>
							 <?php endif;
					 endif;
					 wp_reset_postdata();

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
