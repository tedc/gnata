<?php if(get_sub_field('flex_video')) : ?>
<div class="flex__video">
	<?php 
	$iframe = get_sub_field('flex_video');
	//$iframe = str_replace('?oembed', replace, subject)('/(src=\")(.*)(\")/g', '$1$2&rel=0&showinfo=0$3', $iframe);
	echo $iframe;?>
</div>
<?php endif; ?>