<?php if ( get_row_layout() == 'flex_shift' ) : 

$kind = (get_sub_field('shift_kind'));
?>
<section class="shift">
	<?php if($kind == 0) : ?>
    <div class="shift__visual" style="background-image: url('<?php echo get_sub_field('shift_img'); ?>');"> 
    
    </div>
	<?php else : ?>
	<div class="shift__visual shift__visual--slider"> 
    	<?php 
    		$images = get_sub_field('shift_slider'); 
    		$dida = get_sub_field('shift_dida');
    		if($images) : ?>
    	<div class="shift__slider" data-slick='{"fade":true,"slidesToShow":1,"autoplay":true,"autoplaySpeed":3000,"dots":false,"infinite":true}'>
    		<?php foreach ($images as $image) : ?>
    		<figure class="shift__slide" style="background-image:url(<?php echo $image['url']; ?>)">
    			<?php echo wp_get_attachment_image( $image['ID'], 'large' ); ?>
    			<?php if($dida) : ?>
    			<figcaption class="shift__dida">
    			<?php echo $image['alt']; ?>
    			</figcaption>
    			<?php endif; ?>
    		</figure>
    		<?php endforeach; ?>
    	</div>
    	<?php endif; ?>
    </div>
	<?php else; ?>
    <?php if( get_sub_field('shift_testo') ) : ?>
    <div class="shift__struttura">
    <div class="shift__content">
        <?php echo get_sub_field('shift_testo'); ?>
    </div>
    </div>
    <?php endif; ?>
</section>
<?php endif; ?>