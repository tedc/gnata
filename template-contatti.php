<?php
/**
 * Template Name: Contatti
 */
?>

<div class="inner-wrapper">
    <div class="briciole__container">
      <?php qt_custom_breadcrumbs(); ?>
    </div>
    <div class="page-title">
        <div class="page-title__title">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <section class="mappa">
            
        <div class="mappa__overlay">
            <div class="mappa__contatti">

                <?php if ( get_field('contatti_company') ) : ?>
                    <h2><?php echo get_field('contatti_company'); ?></h2>
                <?php endif; ?>

                <?php if ( get_field('contatti_subtitle') ) : ?>
                    <span><?php echo get_field('contatti_subtitle'); ?></span>
                <?php endif; ?>

                <?php if ( get_field('contatti_indirizzo') ) : ?>
                    <p><?php echo get_field('contatti_indirizzo'); ?></p>
                <?php endif; ?>

                <?php if ( get_field('contatti_telefono') ) : ?>
                    <p>
                    <?php echo 'Tel. ' . get_field('contatti_telefono'); ?> <br>
                    <?php echo 'Fax ' . get_field('contatti_fax'); ?>
                    </p>
                <?php endif; ?>

                <?php if ( get_field('contatti_email') ) : ?>
                    <a href="<?php echo get_field('contatti_email'); ?>" class="mappa__mail"><?php echo get_field('contatti_email'); ?></a>
                <?php endif; ?>

                <?php if ( get_field('contatti_skype') ) : ?>
                    <p>Skype: <?php echo get_field('contatti_skype'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div id="mappa">
        
        </div>
    </section>

    <section class="contatti-mobile">
        <h2>Gnata Filippo S.r.l.</h2>
        <span>Marking Machines</span>

        <p>
            Largo delle Industrie, 14 <br>
            24020 Torre Boldone BG ITALY
        </p>

        <p>
            Tel. +39 035 343309 <br>
            Fax +39 035 346257
        </p>

        <a href="" class="mappa__mail">info@gnata.it</a>

        <p>
            Skype: gnata.marking.machines
        </p>
    </section>

    <?php if ( have_rows('personale_repeater') ) : ?>
        <ul class="personale">
        <?php while( have_rows('personale_repeater') ) : the_row(); ?>
    
            <li class="personale__utente" data-mh="utente">
                <h3 class="personale__name"><?php the_sub_field('personale_nome'); ?></h3>
                <span class="personale__role"><?php the_sub_field('personale_ruolo'); ?></span>
                <a href="mailto:<?php the_sub_field('sub_field_name'); ?>" class="personale__mail"><?php the_sub_field('personale_email'); ?></a>
            </li>
    
        <?php endwhile; ?>
        </ul>
    <?php endif; ?>

    <div class="main-form">
        <?php echo do_shortcode( '[contact-form-7 id="299" title="natural-contact" html_class="nl-form" html_id="nl-form"]' ); ?>
    </div>

    </div><!-- /container -->
        
</div>