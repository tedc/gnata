<?php if ( get_row_layout() == 'flex_focus' ) : ?>
<section class="focus masked-row" data-scrollmagic='{"class":"unmasked-row","reverse":false,"triggerHook":0.45}'>
  <?php if ( get_sub_field('flex_focus_text') ) : ?>
  <div class="focus__content">
    <?php echo get_sub_field('flex_focus_text'); ?>
  </div>
  <?php endif; ?>
  <?php if ( get_sub_field('flex_focus_img') ) : ?>
    <?php 
    $kind = get_sub_field('flex_image_kind');
    if($kind == 0) {
    $focus_bg = get_sub_field('flex_focus_img'); ?>
    <div class="focus__visual" style="background-image: url('<?php echo $focus_bg; ?>');">

    </div>
    <?php } else { ?>
    <div class="focus__visual focus__visual--slider">
    <div class="focus__slider">
      <?php foreach ($images as $image) : ?>
      <figure class="focus__slide" style="background-image:url(<?php echo $image['url']; ?>)">
        <?php echo wp_get_attachment_image( $image['ID'], 'large' ); ?>
      </figure>
      <?php endforeach; ?>
    </div>
    </div>
    
  <?php } endif; ?>

  <?php if ( get_sub_field('flex_focus_vid') ) : ?>
    <div class="focus__visual">
      <video preload="auto">
        <source src="<?php the_sub_field('flex_focus_vid'); ?>" type="video/mp4">
      </video>
      <div class="focus__playcontainer">
        <div class="focus__play">
        </div>
      </div>
    </div>
  <?php endif; ?>

</section>
<?php endif; ?>
