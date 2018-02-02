<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clm
 */

?>

<script>
  function openPopup() {
      document.getElementById('filterBoxPopup').className += ' showPopup';
  }
  function closePopup() {
      document.getElementById('filterBoxPopup').classList.remove("showPopup");
  }
</script>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'No Cocktails Found', 'clm' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'clm' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
			?></p>

		<?php elseif ( is_search() ) : ?>

			<p class="no-results"><?php esc_html_e( 'Sorry, but there are no cocktails containing that product at this stage. Please search below for something else.', 'clm' ); ?></p>
			<div class="cocktail-filter">
			  <div class="popup" onclick="openPopup()">
			    <i class="fa fa-filter"><p>   Filter</p> </i>
			  </div>
			</div>
			<div class="popUpContainer" id="filterBoxPopup">
			  <div class="popupOverlay" onclick="closePopup()">
			  </div>
			  <span class="popuptext">
			    <?php echo do_shortcode( '[searchandfilter taxonomies="category" post_types="Cocktails" types="radio" headings="Base Spirits" all_items_labels="All" submit_label="Filter"]' ); ?>
			  </span>
			</div>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Try filter again.', 'clm' ); ?></p>
			<div class="cocktail-filter">
				<div class="popup" onclick="openPopup()">
					<i class="fa fa-filter"><p>   Filter</p> </i>
				</div>
			</div>
			<div class="popUpContainer" id="filterBoxPopup">
				<div class="popupOverlay" onclick="closePopup()">
				</div>
				<span class="popuptext">
					<?php echo do_shortcode( '[searchandfilter taxonomies="category" post_types="Cocktails" types="radio" headings="Base Spirits" all_items_labels="All" submit_label="Filter"]' ); ?>
				</span>
			</div>
			<?php

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
