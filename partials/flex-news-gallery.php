<?php if ( have_rows('news_gallery_repeater') ) : ?>
    <div class="lanews__gallery">
    <?php while( have_rows('news_gallery_repeater') ) : the_row(); ?>

        <?php $item = get_sub_field('news_gallery_item'); ?>
        <img src="<?php echo $item['url'];?>" alt="<?php echo $item['alt'];?>">

    <?php endwhile; ?>
    </div>
<?php endif; ?>