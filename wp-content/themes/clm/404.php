<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package clm
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php the_field('404_description', 'option'); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">

					<div class="four-content">
						<img src="<?php the_field('404_image', 'option'); ?>" />
					</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
