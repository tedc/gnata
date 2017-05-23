<?php if ( get_row_layout() == 'flex_focus' ) : ?>
<section class="focus">
  <?php if ( get_sub_field('flex_focus_text') ) : ?>
  <div class="focus__content">
    <?php echo get_sub_field('flex_focus_text'); ?>
  </div>
  <?php endif; ?>
  <?php if ( get_sub_field('flex_focus_img') ) : ?>
    <?php $focus_bg = get_sub_field('flex_focus_img'); ?>
    <div class="focus__visual" style="background-image: url('<?php echo $focus_bg; ?>');">

    </div>
  <?php endif; ?>

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
