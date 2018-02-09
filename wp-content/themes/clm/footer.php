<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package clm
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<p>&copy; <?php echo date('Y'); ?> Craft Liquor Merchants</p> |
			<a href="<?php echo esc_url( __( 'https://bakery.co.za/', 'bakery' ) ); ?>">Website by Bakery</a>
			<div class="social-icons">
				<a target="_blank" href="https://www.facebook.com/CraftLiquorMerchants/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a target="_blank" href="https://twitter.com/CraftLiquor_CLM"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a target="_blank" href="https://www.instagram.com/craftliquor_clm/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			</div>
			<div class="wine">
				<h6><a href="https://coolwinestradezone.co.za/" target="_blank">CoolWines Tradezone<i style="font-size: 1rem;" class="fa fa-external-link" aria-hidden="true"></i></a></h6>
			</div>
			</div>
			<div class="footer-menu">
				<a href="<?php echo get_site_url(); ?>/legal/">Legal</a>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
