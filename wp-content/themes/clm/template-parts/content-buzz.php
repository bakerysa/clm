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

  <div class="col-md-12">
    <h2><?php the_field('social_header') ?></h2>
    <p><?php the_field('social_description') ?></p>
    <!-- <div class="social-icons">
      <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
      <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
      <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
    </div> -->
  </div>

  <?php the_content(); ?>

  <div class="col-md-12 news">
    <h2 style="text-align: center; padding-bottom: 2rem;">News and Events</h2>
    <?php
      $loop = new WP_Query( array( 'category' => 'news', 'paged' => $paged ) );
      if ( $loop->have_posts() ) :
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
              <div class="col-md-4 news-item">
                <a href="<?php the_permalink(); ?>">
                  <?php if ( has_post_thumbnail() ) { ?>

                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <div class="news-image-container">
                      <div class="news-image img-responsive" style="background-image: url( <?php echo $image[0]; ?> );"></div>
                    </div>

                  <?php } ?>
                  <div class="news-title">
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
  ?>
  </div>

</div>
