<div class="wrapper">
  <!-- Inizio Wrapper -->
  <div class="mobile-header">
    
  </div>

  <?php if( is_front_page() || is_page( 'homepage-ita' )): ?>
    <div class="video-hero">
    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/payoff.svg" alt="" class="video-hero__payoff svg-inject">
    <a class="video-hero__button" href="#modal">
      <div class="video-hero__playcontainer">
        <div class="video-hero__play">
        </div>
      </div>
      <span class="video-hero__playtext"><?php pll_e( 'Play video', 'gnata' ); ?></span>
    </a>
    <video loop muted autoplay class="video-hero__video">
        <source src="<?php echo get_template_directory_uri(); ?>/dist/images/gnata-corporate-taglio.mp4" type="video/mp4">
        <source src="<?php echo get_template_directory_uri(); ?>/dist/images/gnata-corporate-taglio.ogg" type="video/ogg">
    </video>
    
    <header class="header header--home">
      <div class="header__container">
        <div class="header__logo-container">
          <div class="header__logo">
            <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/gnata-logo.svg" class="header__logo-home svg-inject" alt=""></a>
          </div>
        </div>
        <?php wp_nav_menu( $args = array(
        'menu' => 'Menu principale',
        'container' => 'nav',
        'container_class' => 'header__nav',
        'container_id' => 'header-navigation',
        'theme_location' => 'header_nav',
        'menu_class' => 'navigation__list'
        ) ); ?>
      </div>
    </header>
    
    </div>
    <!-- Chiusura video-hero -->

  <?php else: ?>
  <header class="header">
      <div class="header__container">
        <div class="header__logo-container">
          <div class="header__logo">
            <a href="<?php echo get_home_url(); ?>"><img src="<?php get_site_url();?>/wp-content/uploads/2017/04/gnata-logo.svg" class="svg-inject" alt=""></a>
          </div>
        </div>
        <?php wp_nav_menu( $args = array(
        'menu' => 'Menu principale',
        'container' => 'nav',
        'container_class' => 'header__nav',
        'container_id' => 'header-navigation',
        'theme_location' => 'header_nav',
        'menu_class' => 'navigation__list'
        ) ); ?>
      </div>
    </header>
    <?php endif;?>

    <div class="remodal video__container" id="video__modal" data-remodal-id="modal">
      <div class="video__close">
        <span data-remodal-action="close"><?php pll_e( 'Close', 'gnata' ); ?></span>
      </div>
      <video id="thevideo">
        <source src="<?php echo get_template_directory_uri();?>/dist/images/gnata-corporate.mp4" type="video/mp4">
      </video>
      <div class="video__controls">
        <div class="playbutton"></div>
        <div class="stopbutton"></div>
        <div class="thevolume">
          <span class="basso"></span>
          <span class="medio"></span>
          <span class="alto"></span>
        </div>
      </div>
      <div class="progressBar">
          <div class="timeBar"></div>
      </div>
    </div>