<?php
/**
 * Template part for displaying the story section.
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

  <?php if( have_rows('story_item') ): ?>

  <!-- START Story Items -->
  <?php while ( have_rows('story_item') ) : the_row();
    $icon = get_sub_field('story_image');
    $video = get_sub_field('story_video');
    $header = get_sub_field('story_header');
    $description = get_sub_field('story_description');
    $float = get_sub_field('story_float');
    $column1 = get_sub_field('column1');
    $column2 = get_sub_field('column2');
    $column1_padding = get_sub_field('column1_padding');
    $column2_padding = get_sub_field('column2_padding');
    $max_width = get_sub_field('max_width');
    $text_align = get_sub_field('text_align');
    $siteRoot = get_site_url();
  ?>

  <?php
  $value = get_field('event_video');
         if( $value ) {

        echo $value;

       } else {

       $image = get_field('event_image');

        if( !empty($image) ): ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo    $image['alt']; ?>" />
                    <?php endif;

           }
         ?>

    <div class="row story">
      <div class="hideme h-mobile-fix <?php echo $column1 ?> <?php echo $float ?>" style="padding:<?php echo $column1_padding ?>">
        <?php if( $icon ): ?>
          <img class="img-responsive" src="<?php echo $icon ?>"/>
        <?php elseif( $video ): ?>
          <div class="embed-responsive embed-responsive-16by9">
            <video id='video-player' autoplay="autoplay" loop preload="metadata">
              <source src="<?php echo $video ?>" type="video/mp4">
            </video>
          </div>
        <?php endif; ?>
      </div>
      <div class="h-mobile-fix <?php echo $column2 ?> <?php echo $text_align ?>" style="max-width: <?php echo $max_width ?>; padding:<?php echo $column2_padding ?>;">
        <?php if( $header ): ?>
          <h2><?php echo $header ?></h2>
        <?php endif; ?>
        <?php if( $description ): ?>
          <p><?php echo $description ?></p>
        <?php endif; ?>
      </div>
    </div>
    <div class="clearifx">
    </div>

   <?php  endwhile; ?>
   <!-- END Story Items -->

  <?php endif; ?>

  <div class="row mtb-100 text-center">
    <img src="<?php the_field('work_image') ?>" class="hideme" style="position: relative;"/>
    <div class="clearifx">
    </div>
    <div class="h-mobile-fix mt-50 mw-500 col-md-7 col-md-offset-4" style="text-align:right;">
      <h2><?php the_field('work_header') ?></h2>
      <p><?php the_field('work_description') ?></p>
      <a href="<?php echo esc_url( home_url( 'contact-us' ) ); ?>"><input type="button" value="Contact Us"></a>
    </div>
    <div class="clearifx">
    </div>
  </div>
</div>
