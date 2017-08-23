<?php if ( get_row_layout() == 'flex_paragraph' ) : ?>
<?php if( get_sub_field('flex_paragraph') ) : 
$padding = '';
if(get_sub_field('padding') == 1) {
	$padding = ' paragrafo--padding-top';
} elseif(get_sub_field('padding') == 2) {
	$padding = ' paragrafo--padding-bottom';
} elseif(get_sub_field('padding') == 3) {
	$padding = ' paragrafo--padding-no';
} else {
	$padding = '';
}
?>
<div class="paragrafo<?php echo $padding; ?>">
  <?php 
  $sm = 'data-scrollmagic=\'{"tween":[{"y":50,"opacity":0},{"y":0,"opacity":1}],"duration":0,"triggerHook":0.8,"offset":100}\'';
  $p = get_sub_field('flex_paragraph');
  $p = str_replace('<p', '<p '.$sm, $p);
  $p = str_replace('<h4', '<h4 '.$sm, $p); 
  echo $p; ?>
</div>
<?php endif; ?>
<?php endif; ?>
