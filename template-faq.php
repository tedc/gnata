<?php
/**
 * Template Name: Faq
 */
?>

  <div class="inner-wrapper">
    <div class="briciole__container">
      <?php qt_custom_breadcrumbs(); ?>
    </div>

    <section class="lefaq">
      <div class="lefaq__sidebar">
        <h1><?php the_title(); ?></h1>
      </div>
      <?php if ( have_rows('faq_repeater') ) : ?>
      <div class="lefaq__list">
        <div data-accordion-group>
          <?php while( have_rows('faq_repeater') ) : the_row(); ?>

          <div class="accordion" data-accordion>
            <div class="accordion__header" data-control>
              <div class="accordion__button">
                <span class="ll"></span>
                <span class="rl"></span>
              </div>
              <h2>
                <?php the_sub_field('faq_question'); ?>
              </h2>
            </div>
            <div data-content>
              <p>
                <?php the_sub_field('faq_answer'); ?>
              </p>
            </div>
          </div>

          <?php endwhile; ?>
        </div>
      </div>
      <?php endif; ?>
    </section>


  </div>
  <!--Fine wrapper-->
  </div>
