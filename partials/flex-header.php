<?php if ( get_row_layout() == 'flex_page_header' ) : ?>
    <?php $pageHeader = get_sub_field('page_header'); ?>
    <div class="page-header" style="background-image: url('<?php echo $pageHeader; ?>');" data-scrollmagic='{"tween":{"backgroundPosition":"<?php echo ($marcatrice%2==0) ? 100 : 0; ?>% 15%"},"duration":1200,"triggerHook":1}'>

    </div>
<?php endif; ?>