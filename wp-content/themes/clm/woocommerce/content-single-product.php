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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
$themeURL = get_template_directory_uri();
$siteURL = get_site_url();
echo '<a href="' . $siteURL . '/the-brands' . '" ><img class="close-product" data-dismiss="modal" aria-label="Close" src="' . $themeURL . '/assets/img/close.png" alt="close"/></a>';
?>

<div class="container product-aux">

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

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="product-container">

		<?php
		$prev_dir = get_template_directory_uri() . '/assets/img/arrow-prev.png';
		$next_dir = get_template_directory_uri() . '/assets/img/arrow-next.png';
		// 'product_cat' will make sure to return next/prev from current category
		$previous = next_post_link('%link', '<div class="prev_button"><img src=" ' . $prev_dir . '" class="nav_image" /></div>', TRUE, ' ', 'product_cat');
		echo $previous;

		$next = previous_post_link('%link', '<div class="next_button"><img src="' . $next_dir . '" class="nav_image" /></div>', TRUE, ' ', 'product_cat');
		echo $next;
		?>

	<?php woocommerce_show_product_images() ?>

	<div class="summary entry-summary">
    <?php echo '<h3>' . get_the_title() . '</h3>' ?>
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
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
		<a target="_blank" class="btn-secondary btn-lg h-button-fix website-button" href="<?php the_field('website_url'); ?>">Visit Website</a>
		<?php
		$link = get_field('website_url');
		$searchAux = get_the_title();
    $siteRoot = get_site_url();
		if( get_field('cocktail') == 'Yes' ): ?>
      <?php echo '<a target="_blank" class="btn-secondary btn-lg h-button-fix" href="' . $siteRoot . '?s=' . $searchAux . '&post_type=cocktails">View Cocktails</a>'; ?>
    <?php endif; ?>

		<div class="social-icons-product">
		 <?php echo do_shortcode('[Sassy_Social_Share]') ?>
	</div>

	</div><!-- .summary -->
	<div class="clearfix mb-50">
	</div>
</div>


	<?php woocommerce_output_related_products() ?>
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
</div><!-- end container -->
