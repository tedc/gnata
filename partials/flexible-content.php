<?php if ( have_rows( 'flex' ) ) : ?>
    <?php while ( have_rows('flex' ) ) : the_row(); ?>

            <?php get_template_part( 'partials/flex-focus' ); ?>

            <?php get_template_part( 'partials/flex-paragraph' ); ?>

            <?php get_template_part( 'partials/flex-shift' ); ?>

            <?php get_template_part( 'partials/flex-header' ); ?>

            <?php if ( get_row_layout() == 'flex_coppiaimg' ) : ?>
                <?php get_template_part( 'partials/flex-coppiaimg' ); ?>
            <?php endif; ?>
        
    <?php endwhile; ?>
<?php endif; ?>

<?php if ( have_rows( 'flex_news' ) ) : ?>
    <?php while ( have_rows('flex_news' ) ) : the_row(); ?>
        <?php if ( get_row_layout() == 'flex_news_text' ) : ?>
            <?php get_template_part( 'partials/flex-news-text' ); ?>
        <?php endif; ?>
        <?php if ( get_row_layout() == 'flex_news_gallery' ) : ?>
            <?php get_template_part( 'partials/flex-news-gallery' ); ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>