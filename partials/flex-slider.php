<?php 
    		$images = get_sub_field('flex_images'); 
    		$dida = get_sub_field('flex_dida');
    		if($images) : ?>
<div class="flex__slider">
    <div class="shift__slider">
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
</div>
<?php endif; ?>