</div> <!-- Fine Wrapper -->

<footer class="footer">
  <div class="footer__content">

     
    <?php if ( get_field('footer_logo', 'option') ) : ?>
        <img class="footer__logo svg-inject" src="<?php the_field('footer_logo', 'option'); ?>" alt="Gnata Leave your mark">
    <?php endif; ?>

    <?php if ( get_field('footer_indirizzo', 'option') ) : ?>
      <p class="footer__indirizzo">
      <?php echo get_field('footer_indirizzo', 'option'); ?>
      </p>
    <?php endif; ?>

    <?php if ( get_field('footer_credits', 'option') ) : ?>
        <a href="http://www.bspkn.it/" class="footer__credits-link" target="_blank">
          <img class="footer__credits svg-inject" src="<?php the_field('footer_credits', 'option'); ?>" alt="BSPKN Studio">
        </a>
    <?php endif; ?>
      
      
            
      
  </div>
</footer>

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
    <?php echo do_shortcode( '[contact-form-7 id="298" title="natural-config"]' );?>
  </div>
</div>
