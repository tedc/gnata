<?php use Roots\Sage\Extras; ?>
</div> <!-- Fine Wrapper -->

<footer class="footer">
  <div class="footer__content">

     
    <!-- <?php if ( get_field('footer_logo', 'option') ) : ?>
        <img class="footer__logo svg-inject" src="<?php the_field('footer_logo', 'option'); ?>" alt="Gnata Leave your mark">
    <?php endif; ?> -->

    <?php if ( get_field('footer_indirizzo', 'option') ) : ?>
      <p class="footer__indirizzo">
      <?php echo get_field('footer_indirizzo', 'option'); ?>
      </p>
    <?php endif; ?>
    <?php if(get_field('privacy', 'option')) :
      $privacy = pll_get_post(get_field('privacy', 'option'), pll_current_language());
      var_dump($privacy);
       ?>
      <a href="<?php echo get_permalink($privacy->ID); ?>"><?php pll_e('Privacy'); ?></a>
    <?php endif; ?>
    <?php if ( get_field('footer_credits', 'option') ) : ?>
        <a href="http://www.bspkn.it/" class="footer__credits-link" target="_blank">
          <img class="footer__credits svg-inject" src="<?php the_field('footer_credits', 'option'); ?>" alt="BSPKN Studio">
        </a>
    <?php endif; ?>
      
      
            
      
  </div>
</footer>
<?php if(is_front_page() || is_page_template( 'template-marcatrici.php' ) || is_page_template( 'template-macchina.php' )) : ?>
<div class="calltoaction">
  <div class="calltoaction__header">
    <a href="#modal-config"><?php pll_e( 'Configure your machine', 'gnata' ); ?></a>
  </div>
</div>

<div class="remodal configuratore" data-remodal-id="modal-config">
  <div class="configuratore__header">
    <div class="configuratore__logo">
      
    </div>
    <div class="configuratore__step">
      <span class="steptxt">Step 1</span>
      <span class="stepone stepped"></span>
      <span class="steptwo"></span>
    </div>
    <div class="configuratore__close">
      <span data-remodal-action="close"><?php pll_e( 'Close', 'gnata' ); ?></span>
    </div>
  </div>
  <div class="configuratore__form">
    <?php Extras\acf_set_language_to_default(); echo do_shortcode(get_field('configuratore_'.pll_current_language(), 'options')); Extras\acf_unset_language_to_default(); ?>
  </div>
</div>
<?php endif; ?>