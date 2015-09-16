<?php
use yii\helpers\Url;

$i = 0;
$nextPage = false;
?>
<?php
foreach ($list as $item) {
    $i++;
    if ($i > \app\models\Book::ITEMS_PER_PAGE) {
        $nextPage = true;
        continue;
    } ?>
<div class="col-lg-8"><?php echo $item['name']; ?></div>
<div class="col-lg-4">читателей: <?php echo $item['reader_count']; ?></div>
<?php } ?>
<?php
if ($nextPage || (isset($first) && $first)) { ?>
<p class="text-center"><a
    class="btn btn-default next-page-ajax"
    onclick="return getNextPage(this)"
    href="<?php echo Url::to(['read-authors-more-several-readers', 'page' => $page + 1]); ?>">Показать ещё &raquo;</a></p>
<?php } ?>