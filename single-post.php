<div class="inner-wrapper">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article class="lanews">
    <aside class="lanews__sidebar">
      <?php if ( get_field('news_img') ) : ?>
      <?php $newsImg = get_field('news_img'); ?>
      <img src="<?php echo $newsImg['url'];?>" alt="<?php echo $newsImg['alt'];?>">
      <?php endif; ?>
    </aside>
    <div class="lanews__article">
      <span class="lanews__date"><?php the_date( 'j F Y', '', '', true );?></span>
      <h1>
        <?php the_title();?>
      </h1>
      <?php get_template_part( 'partials/flexible-content' ); ?>
    </div>
  </article>
  <?php endwhile; else : ?>
  <p>
    <?php pll_e( 'Sorry, no results were found.', 'gnata' ); ?>
  </p>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>

  
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
    <div class="othernews">
        <div class="othernews__sidebar">
          <span><?php pll_e('Other news', 'gnata');?></span>  
        </div>
        <div class="othernews__list">
    <?php while ( $loop->have_posts() ) : ?>
    <?php $loop->the_post(); ?>
    <?php $otherNewsImg = get_field('news_img'); ?>
        <article class="othernews__article">
                <div class="othernews__img" style="background-image: url('<?php echo $otherNewsImg['url']; ?>');">

                </div>
                <div class="othernews__content">
                    <span><?php echo get_the_date( 'j F Y', '', '', true );?></span>
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                </div>
            </article>    
    <?php endwhile; ?>
        </div>
    </div>
    <? endif; ?>
    <?php wp_reset_postdata(); ?>
</div>
