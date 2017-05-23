<?php
/**
 * Template Name: Pagina interna
 */
?>

  <div class="inner-wrapper">
    <div class="briciole__container">
      <?php qt_custom_breadcrumbs(); ?>
    </div>
    <?php if ( get_field('title-area_title') ) : ?>
    <section class="page-title">
      <h1 class="page-title__title">
        <?php if ( get_field('page-area_title') ) : ?>
          <?php the_field('page-area_title'); ?>
        <?php else: ?>
          <?php the_title(); ?>
        <?php endif; ?>
      </h1>
      <?php endif; ?>

      <?php if ( get_field('title-area_intro') ) : ?>
      <div class="page-title__intro">
        <p>
          <?php echo get_field('title-area_intro'); ?>
        </p>
      </div>
      <?php endif; ?>
    </section>

    <?php get_template_part( 'partials/flexible-content' ); ?>

    <!--Bottoncioni-->
    <?php if ( have_rows('bottoncioni') ) : ?>
      <ul class="bottoncioni-container">
      <?php while( have_rows('bottoncioni') ) : the_row(); ?>
          <?php $bottoncione_testo = get_sub_field('bottoncione_name'); ?>
          <?php $bottoncione_bg = get_sub_field('bottoncione_bg'); ?>
          <?php $bottoncione_link = get_sub_field('bottoncione_link'); ?>
          
        <li class="bottoncione">
          <a href="<?php echo $bottoncione_link; ?>" style="background-image: url('<?php echo $bottoncione_bg; ?>');">
            <span><?php echo $bottoncione_testo; ?></span>
          </a>
        </li>
    
      <?php endwhile; ?>
      </ul>
    <?php endif; ?>
      
  </div>
  <!--Fine wrapper-->