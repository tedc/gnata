<?php
/**
 * Template Name: Macchine Marcatrici
 */
?>

  <div class="inner-wrapper">
    <div class="briciole__container">
      <?php qt_custom_breadcrumbs(); ?>
    </div>
    <?php if ( get_field('title-area_title') ) : ?>
    <section class="page-title">
      <h1 class="page-title__title">
        <?php echo get_field('title-area_title'); ?>
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

    <?php if ( have_rows('marcatrici_list_marcatrice') ) : ?>

    <section class="lista-marcatrici">

      <?php while( have_rows('marcatrici_list_marcatrice') ) : the_row(); ?>

      <?php $bg = get_sub_field('marcatrice_bg'); ?>

      <div class="lista-marcatrici__marcatrice" style="background-image: url('<?php echo $bg;?>')">
        <div class="lista-marcatrici__paragrafo">
          <?php if ( get_sub_field('marcatrice_title') ) : ?>
          <h2>
            <?php echo get_sub_field('marcatrice_title'); ?>
          </h2>
          <?php endif; ?>
          <?php if ( get_sub_field('marcatrice_desc') ) : ?>
          <p>
            <?php echo get_sub_field('marcatrice_desc'); ?>
          </p>
          <?php endif; ?>
          <?php if ( get_sub_field('marcatrice_link') ) : ?>
          <a class="pulsante" href="<?php echo get_sub_field('marcatrice_link'); ?>">
            <span class="pulsante__testo"><?php echo get_sub_field('marcatrice_button-txt'); ?></span>
          </a>
          <?php endif; ?>
        </div>
      </div>

      <?php endwhile; ?>

    </section>

    <?php endif; ?>

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
  <!--Fine Wrapper interno-->
