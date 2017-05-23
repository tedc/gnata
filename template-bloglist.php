<?php
/**
 * Template Name: Bloglist
 */
?>

<div class="inner-wrapper">
    <div class="briciole__container">
      <?php qt_custom_breadcrumbs(); ?>
    </div>
    <?php
        // WP_Query arguments
    $currentID = get_the_ID();
    $args = array(
        'post_type'              => array( 'post' ),
        'post__not_in'           => array( $currentID ),
        'order'                  => 'ASC',
    );
    $loop = new WP_Query( $args );
    if( $loop->have_posts()) : ?>
    <div class="bloglist">
        <div class="bloglist__sidebar">
          <h1><?php the_title(); ?></h1>  
        </div>
        <div class="bloglist__list">
    <?php while ( $loop->have_posts() ) : ?>
    <?php $loop->the_post(); ?>
    <?php $otherNewsImg = get_field('news_img'); ?>
        <article class="bloglist__article">
                <div class="bloglist__img" style="background-image: url('<?php echo $otherNewsImg['url']; ?>');">
                </div>
                <div class="bloglist__content">
                    <span><?php echo get_the_date( 'j F Y', '', '', true );?></span>
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <?php 
                    // If the page has Flexible Content:
                    if(get_field('flex_news')) :
                      $rows = get_field('flex_news'); 
                      // Get the first instance of the Body Copy field
                      foreach( array_slice($rows, 0, 1) as $row ) {
                        $excerpt = $row['news_text'];
                        echo '<p>' . wp_trim_words($excerpt, 20) . '</p>';
                      }
                    // Otherwise get the content
                    else: ?>
                      <?php the_content(); ?>
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>"><?php pll_e( 'Read all', 'gnata' ); ?></a>
                </div>
            </article>    
    <?php endwhile; ?>
        </div>
    </div>
    <? endif; ?>
    <?php wp_reset_postdata(); ?>
</div>