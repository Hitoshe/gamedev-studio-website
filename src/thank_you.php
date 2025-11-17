<?php
require_once 'init.php';
include 'templates/header.php';
?>
<div class="content-with-columns">
<div class="page-container" style="text-align: center;">
    <h1><?php echo t('MERCH_ORDER_SUCCESS'); ?></h1>
    <p><?php echo t('MERCH_ORDER_SUCCESS_TEXT'); ?></p>
    <a href="/merch.php" class="btn-buy"><?php echo t('MERCH_CONTINUE_SHOPPING'); ?></a>
</div>
</div>
<?php include 'templates/footer.php'; ?>