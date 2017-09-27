<?php if ( get_row_layout() == 'flex_page_header' ) : ?>
    <?php $pageHeader = get_sub_field('page_header'); ?>
    <div class="page-header masked-row" data-scrollmagic='{"class":"unmasked-row","reverse":false,"triggerHook":0.45,"duration":0}' style="background-image: url('<?php echo $pageHeader; ?>');">

    </div>
<?php endif; ?>