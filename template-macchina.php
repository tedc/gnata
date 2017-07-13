<?php
/**
 * Template Name: Macchina singola
 */
?>

  <div class="inner-wrapper">
    <?php if (function_exists('qt_custom_breadcrumbs')): ?> 
    <div class="briciole__container">
      <?php qt_custom_breadcrumbs(); ?>
    </div>
    <?php endif; ?>
    <div class="macchina">
      <div class="macchina__visual">
        <?php if ( get_field('macchina_img') ) : ?>
        <img class="macchina__img" src="<?php echo get_field('macchina_img'); ?>" alt="">
        <?php endif; ?>
      </div>
      <div class="macchina__desc">
        <div class="macchina__content">
          <span>
          <?php
          $ancs = get_ancestors($post->ID,'page');
          echo get_page($anc)->post_title;
          ?>
          </span>
          <?php if ( get_field('macchina_title') ) : ?>
          <h1>
            <?php echo get_field('macchina_title'); ?>
          </h1>
          <?php endif; ?>

          <?php if ( get_field('macchina_desc') ) : ?>
          <?php echo get_field('macchina_desc'); ?>
          <?php endif; ?>

        </div>
      </div>
      <div class="macchina__wrapper-riduttore">
        <div class="macchina__riduttore"><img src="<?php echo get_template_directory_uri();?>/dist/images/arrow.svg" alt="" class="macchina__arrow svg-inject"></div>
      </div>
      <div class="macchina__zoomwrapper">
        <button class="macchina__zoomplus">
          <img src="<?php echo get_template_directory_uri();?>/dist/images/plus.svg" alt="" class="svg-inject">
        </button>
        <button class="macchina__zoomminus">
          <img src="<?php echo get_template_directory_uri();?>/dist/images/minus.svg" alt="" class="svg-inject">
        </button>
      </div>
    </div>

    <?php if ( have_rows('macchina_table') ) : ?>

    <div class="tabella">
      <table>
        <tr>
          <th><?php _e('Modello', 'gnata'); ?></th>
          <th><?php _e('Ø Tubi in mm', 'gnata'); ?></th>
          <th><?php _e('Velocità di estrusione metri/minuto', 'gnata'); ?></th>
        </tr>

        <?php $t = 0; while( have_rows('macchina_table') ) : the_row(); ?>
        <tr>
          <td>
            <?php if(get_sub_field('macchina_table_immagine') != '') : ?>
            <a href="#table-modal-<?php echo $t; ?>"><?php the_sub_field('macchina_table_modello'); ?></a>
            <div class="remodal remodal--table" data-remodal-id="table-modal-<?php echo $t; ?>" style="background-image:url(<?php the_sub_field('macchina_table_immagine'); ?>)">
                <div class="remodal__close">
                  <span data-remodal-action="close"><?php pll_e( 'Close', 'gnata' ); ?></span>
                </div>
            </div>
          <?php else : ?>
            <?php the_sub_field('macchina_table_modello'); ?>
          <?php endif; ?>
          </td>

          <td>
            <?php the_sub_field('macchina_table_tubi'); ?>
          </td>

          <td>
            <?php the_sub_field('macchina_table_velocita'); ?>
          </td>
        </tr>
        <?php $t++; endwhile; ?>
      </table>
    </div>

    <?php endif; ?>

    <!--Bottoncioni-->
    <?php 
    $length = count(get_field('bottoncioni'));
    $bclass = '';
    switch ($length) {
        case 1:
            $bclass = '';
            break;
        case 2:
            $bclass = ' bottoncione--half';
            break;
        case 3:
            $bclass = ' bottoncione--third';
            break;
        case 4:
            $bclass = ' bottoncione--fourth';
            break;
        default:
            $bclass = '';
            break;
    }
    if ( have_rows('bottoncioni') ) : ?>
      <ul class="bottoncioni-container">
      <?php while( have_rows('bottoncioni') ) : the_row(); ?>
          <?php $bottoncione_testo = strip_tags(get_sub_field('bottoncione_name'), '<strong>'); ?>
          <?php $bottoncione_bg = get_sub_field('bottoncione_bg'); ?>
          <?php $bottoncione_link = get_sub_field('bottoncione_link'); ?>
          
        <li class="bottoncione<?php echo $bclass; ?>">
          <a href="<?php echo $bottoncione_link; ?>" style="background-image: url('<?php echo $bottoncione_bg; ?>');">
            <span><?php echo $bottoncione_testo; ?></span>
          </a>
        </li>
    
      <?php endwhile; ?>
      </ul>
    <?php endif; ?>

  </div>
  <!--Fine Wrapper interno-->
