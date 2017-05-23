<?php if ( get_row_layout() == 'flex_shift' ) : ?>
<section class="shift">
    <div class="shift__visual" style="background-image: url('<?php echo get_sub_field('shift_img'); ?>');"> 
    
    </div>
    <?php if( get_sub_field('shift_testo') ) : ?>
    <div class="shift__struttura">
    <div class="shift__content">
        <?php echo get_sub_field('shift_testo'); ?>
    </div>
    </div>
    <?php endif; ?>
</section>
<?php endif; ?>