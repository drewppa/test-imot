<?php
use yii\helpers\Url;
?>
<?php foreach ($list as $item) { ?>
<div class="col-lg-12"><?php echo $item['name']; ?></div>
<?php } ?>
<?php if ($list || (isset($first) && $first)) { ?>
<p class="text-center"><a
    class="btn btn-default next-page-ajax"
    onclick="return getNextPage(this)"
    href="<?php echo Url::to(['books-randomize', 'page' => $page + 1]); ?>">Показать ещё &raquo;</a></p>
<?php } ?>