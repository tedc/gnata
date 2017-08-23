<?php $imgSx = get_sub_field('coppiaimg_sx'); ?>
<?php $imgDx = get_sub_field('coppiaimg_dx'); ?>
<?php $slider = get_sub_field('coppiaslider_dx'); ?>
<div class="coppiaimg">
    <div class="coppiaimg__img" style="background-image: url('<?php echo $imgSx; ?>');">

    </div>
    <?php if($imgDx) : ?>
    <div class="coppiaimg__img" style="background-image: url('<?php echo $imgDx; ?>');">

    </div>
	<?php endif; ?>
	
	<?php 
    		$images = $slider; 
    		if($images) : ?>
    <div class="coppiaimg__slider">
    	<div class="shift__slider">
    		<?php foreach ($images as $image) : ?>
    		<figure class="shift__slide" style="background-image:url(<?php echo $image['url']; ?>)">
    			<?php echo wp_get_attachment_image( $image['ID'], 'large' ); ?>
    		</figure>
    		<?php endforeach; ?>
    	</div>
    </div>
    <?php endif; ?>
</div>