<?php if(get_sub_field('flex_video')) : ?>
<div class="flex__video">
	<?php 
	$iframe = get_sub_field('flex_video');
	$iframe = str_replace('oembed', 'oembed&rel=0&showinfo=0', $iframe);
	echo $iframe;?>
</div>
<?php endif; ?>