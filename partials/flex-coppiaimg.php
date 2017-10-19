<?php $imgSx = get_sub_field('coppiaimg_sx'); ?>
<?php $imgDx = get_sub_field('coppiaimg_dx'); ?>
<?php $slider = get_sub_field('coppiaslider_dx'); ?>
<?php $rightSlider = get_sub_field('is_right_slider'); ?>
<div class="coppiaimg">
    <div class="coppiaimg__img" style="background-image: url('<?php echo $imgSx; ?>');">
        <?php if(get_sub_field('testo_sx')) : ?>
        <div class="coppiaimg__testo"><?php the_sub_field('testo_sx'); ?></div>
        <?php endif; ?>
    </div>
    <?php if($imgDx && !$rightSlider) : ?>
    <div class="coppiaimg__img" style="background-image: url('<?php echo $imgDx; ?>');">
        <?php if(get_sub_field('testo_sx')) : ?>
        <div class="coppiaimg__testo"><?php the_sub_field('testo_sx'); ?></div>
        <?php endif; ?>
    </div>
	<?php endif; ?>
	
	<?php 
    		$images = $slider; 
    		if($images && $rightSlider) : ?>
    <div class="coppiaimg__slider">
    	<div class="shift__slider">
    		<?php foreach ($images as $image) : ?>
    		<figure class="shift__slide" style="background-image:url(<?php echo $image['url']; ?>)">
    			<?php echo wp_get_attachment_image( $image['ID'], 'large' ); ?>
    		</figure>
    		<?php endforeach; ?>
    	</div>
        <?php if(get_sub_field('testo_sx')) : ?>
        <div class="coppiaimg__testo"><?php the_sub_field('testo_sx'); ?></div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>