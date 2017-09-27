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
    <section class="page-title masked-row" data-scrollmagic='{"class":"unmasked-row","reverse":false,"triggerHook":0.45}'>
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

      <?php $marcatrice = 0; while( have_rows('marcatrici_list_marcatrice') ) : the_row(); 
      ?>

      <?php $bg = get_sub_field('marcatrice_bg'); ?>

      <div class="lista-marcatrici__marcatrice<?php echo ($marcatrice%2==0) ? ' lista-marcatrici__marcatrice--inverted' : ''; ?> masked-row" data-scrollmagic='{"class":"unmasked-row","reverse":false,"triggerHook":0.45}' style="background-image: url('<?php echo $bg;?>')" id="marcatrice_<?php echo $marcatrice; ?>">
        <div class="lista-marcatrici__paragrafo" data-scrollmagic='{"tween":[{"y":400},{"y":-200}],"duration":"250vh","triggerHook":1,"triggerElement":"#marcatrice_<?php echo $marcatrice; ?>"}'>
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

      <?php $marcatrice++; endwhile; ?>

    </section>

    <?php endif; ?>

    <!--Bottoncioni-->
    <?php $length = count(get_field('bottoncioni'));
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
