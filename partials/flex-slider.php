<?php 
    if(get_row_layout() == 'flex_slider') {
    		$images = get_sub_field('flex_images'); 
    		$dida = get_sub_field('flex_dida');
    		if($images) : ?>
<div class="flex__slider<?php echo (get_sub_field('columns')) ? ' flex__slider--split' : ''; ?>">
    <div class="shift__slider">
    	<?php foreach ($images as $image) :
            if(!get_sub_field('columns')) : ?>
    	<figure class="shift__slide" style="background-image:url(<?php echo $image['url']; ?>)">
    		<?php echo wp_get_attachment_image( $image['ID'], 'large' ); ?>
    		<?php if($dida) : ?>
    		<figcaption class="shift__dida">
    		<?php echo $image['alt']; ?>
    		</figcaption>
    		<?php endif; ?>
    	</figure>
        <?php else : ?>
        <div class="shift__slide shift__slide--columns">
            <div class="slide__image"  style="background-image:url(<?php echo $image['url']; ?>)">
                <?php echo wp_get_attachment_image( $image['ID'], 'large' ); ?>
            </div>
            <div class="slide__dida">
                <?php echo $image['description']; ?>
            </div>
        </div>
    <?php endif; endforeach; ?>
    </div>
</div>
<?php endif; } ?>