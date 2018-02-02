<?php
/**
 * Template part for displaying the contact section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clm
 */

?>

<div class="container">

  <header class="entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </header><!-- .entry-header -->
  <div class="row">
  <div class="col-md-5 contact-cta">
    <h2><?php the_field('contactus_header') ?></h2>
    <p><?php the_field('contactus_description') ?></p>
    <p><strong>Call us: </strong><a href="tel:+27115314700"><?php the_field('contactus_number') ?></a></p>
    <p><strong>Email us: </strong><a href="mailto:info@craftliquormerchants.co.za"><?php the_field('contactus_email') ?></a></p>
    <p><strong>Meet with us: </strong><?php the_field('contactus_address') ?></p>
    <p><strong>Work for us: </strong><a href="<?php the_field('careers_link') ?>"><?php the_field('careers_title') ?></a></p>
    <div class="redline left"></div>
    <h4><?php the_field('helpdesk') ?></h4>
    <p><?php the_field('helpdesk_info') ?></p>
    <p><strong>Email: </strong><a href="mailto:<?php the_field('helpdesk_email') ?>"><?php the_field('helpdesk_email') ?></a></p>
    <h4><?php the_field('order_online') ?></h4>
    <p><a href="mailto:<?php the_field('online_address') ?>"><?php the_field('online_address') ?></a></p>
    <div class="redline left"></div>
  </div>
  <div class="col-md-6 col-md-offset-1 contact-regions">
    <img class="img-responsive h-max-height" src="<?php the_field('contactus_image') ?>" />
    <!-- <div class="social-icons">
      <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
      <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
      <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
    </div> -->
  </div>
  </div>
  <div class="row contact-regions">
    <div class="col-md-6">
      <img src="<?php the_field('stock_image') ?>" />
    </div>
    <div class="col-md-6 contact-cta" style="text-align: right;">
      <h2><?php the_field('stock_header') ?></h2>
      <p><?php the_field('stock_description') ?></p>
      <h5><?php the_field('order_cta') ?></h5>
      <div class="redline right"></div>
    </div>
  </div>
  <div class="contact-regions">
    <div class="col-md-3 contact-item">
      <p><strong><?php the_field('national_header') ?></strong></p>
      <p><?php the_field('national_number') ?></p>
      <br />
      <p><strong><?php the_field('gauteng_header') ?></strong></p>
      <p>T: <?php the_field('gauteng_number') ?></p>
      <p>F: <?php the_field('gauteng_fax') ?></p>
      <br />
      <p><strong>Gauteng Orders: </strong><a href="mailto:<?php the_field('gauteng_email') ?>"><?php the_field('gauteng_email') ?></a></p>
      <br />
    </div>
    <div class="col-md-3 contact-item">
      <p><strong><?php the_field('durban_header') ?></strong></p>
      <p>T: <?php the_field('durban_number') ?></p>
      <p>F: <?php the_field('durban_fax') ?></p>
      <br />
      <p><strong>Coastal KwaZulu-Natal Orders: </strong><a href="mailto:<?php the_field('durban_email') ?>"><?php the_field('durban_email') ?></a></p>
      <br />
    </div>
    <div class="col-md-3 contact-item">
      <p><strong><?php the_field('garden_header') ?></strong></p>
      <p>T: <?php the_field('garden_number') ?></p>
      <p>F: <?php the_field('garden_fax') ?></p>
      <br />
      <p><strong>Garden Route Orders: </strong><a href="mailto:<?php the_field('garden_email') ?>"><?php the_field('garden_email') ?></a></p>
      <br />
    </div>
    <div class="col-md-3 contact-item">
      <p><strong><?php the_field('ct_header') ?></strong></p>
      <p><?php the_field('ct_number') ?></p>
      <br />
      <p><strong>Cape Town Orders: </strong><a href="mailto:<?php the_field('ct_email') ?>"><?php the_field('ct_email') ?></a></p>
    </div>
  </div>
</div>
