<?php
/**
 * Template part for displaying the story section.
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

<div class="container">

  <header class="entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </header><!-- .entry-header -->

  <h2 class="cocktail-header"><?php the_title() ?></h2>

  <?php
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
?>

</div>
