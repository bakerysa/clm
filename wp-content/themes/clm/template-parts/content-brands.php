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

  <div class="col-md-6 col-md-offset-3 text-center mb-50">
    <h2><?php the_field('brands_header') ?></h2>
    <p><?php the_field('brands_description') ?></p>
  </div>
  <div class="clearfix">
  </div>
  <div class="row brand-filters">
    <?php

    $args = array(
      'taxonomy'   => "product_cat",
      'orderby'    => 'title',
      'order'      => 'ASC',
      'number'     => $number,
      'hide_empty' => $hide_empty,
      'include'    => $ids
    );


    $product_categories = get_terms($args);
    foreach( $product_categories as $cat ) {
      echo '<a class="btn" href="#'.$cat->name.'"> '.$cat->name.' </a>';
    }
    ?>

  </div>

  <div class="row">

    <?php

    $args = array(
    'number'     => $number,
    'orderby'    => 'title',
    'order'      => 'ASC',
    'hide_empty' => $hide_empty,
    'include'    => $ids
    );
    $product_categories = get_terms( 'product_cat', $args );
    $count = count($product_categories);
    if ( $count > 0 ){
      foreach ( $product_categories as $product_category ) {
        echo '
        <div class="row brand-single-container ptb-100" id="'. $product_category->name . '">
        <div class="col-md-3 brand-single-intro">
          <h2>
            <a href=" '.get_term_link( $product_category ).' "> '. $product_category->name . '</a>
          </h2>
          <p>'. $product_category->description . '</p>
        </div>
        ';
        $args = array(
            'posts_per_page' => -1,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $product_category->slug
                )
            ),
            'post_type' => 'product',
            'orderby' => 'modified'
        );
        $products = new WP_Query( $args );
        echo "
        <div class='col-md-9'>
        <div class='owl-carousel hideme'>";
        while ( $products->have_posts() ) {
            $products->the_post();
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
            ?>
                <div class="product-single-container">
                  <?php echo '<a href=" '.get_permalink().' ">
                    <div class="single-item" style="background-image: url('. $image[0] .');">

                    </div>

                    <h5>'.get_the_title().'</h5>
                    </a>';?>
                </div>
            <?php
        }
        echo "</div></div></div>";
    }
}

    ?>


  </div>

  <div class="row mtb-100 text-center">
    <img src="<?php the_field('contact_image') ?>" />
    <div class="clearifx">
    </div>
    <!-- <div class="h-mobile-fix mt-50 mw-500 col-md-7 col-md-offset-4" style="text-align:right;">
      <h2><?php the_field('contact_header') ?></h2>
      <p><?php the_field('contact_description') ?></p>
      <input type="button" value="Contact Us">
    </div> -->
    <div class="clearifx">
    </div>
  </div>
</div>
