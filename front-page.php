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

<div class="homepage-intro">
<?php if ( get_field('homepage_titolo') ) : ?>
    <h1 class="homepage-intro__title">
    <?php echo get_field('homepage_titolo'); ?>
    </h1>
<?php endif; ?>

<div class="homepage-intro__subtitle">
<?php if ( get_field('homepage_subtitle') ) : ?>
    <h2>
    <?php echo get_field('homepage_subtitle'); ?>
    </h2>
<?php endif; ?>
<?php if ( get_field('homepage_payoff') ) : ?>
    <h3>
    <?php echo get_field('homepage_payoff'); ?>
    </h3>
<?php endif; ?>
    </div>    
</div>

<?php
$bg = get_field('homepage_cta_bg');
?>

<div class="homepage-cta" style="background-image: url('<?php echo $bg ?>');">
     <div class="homepage-cta__paragrafo">
    <?php if ( get_field('homepage_cta_title') ) : ?>
        <h4>
        <?php echo get_field('homepage_cta_title'); ?>
        </h4>
    <?php endif; ?>
 
    <?php if ( get_field('homepage_cta_paragraph') ) : ?>
        <p>
        <?php echo get_field('homepage_cta_paragraph'); ?>
        </p>
    <?php endif; ?>
    <a href="#modal-config" class="pulsante">
        <span class="pulsante__testo"><?php pll_e( 'Configure', 'gnata' ); ?></span>
    </a>
    </div>
        
        
</div>
    