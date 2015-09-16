<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Соавторы</h2>

                <p>Вывод списка книг, находящихся на руках у читателей, и имеющих не менее трех соавторов.</p>

                <?php echo $this->render('read-books-more-several-authors', [
                    'list'  => $readBooksMoreSeveralAuthors,
                    'page'  => $readBooksMoreSeveralAuthorsPage,
                    'first' => true,
                ]);?>

            </div>
            <div class="col-lg-4">
                <h2>Читаемые авторы</h2>

                <p>Вывод списка авторов, чьи книги в данный момент читает более трех читателей.</p>

                <?php echo $this->render('read-authors-more-several-readers', [
                    'list'  => $readAuthorsMoreSeveralReaders,
                    'page'  => $readAuthorsMoreSeveralReadersPage,
                    'first' => true,
                ]);?>
            </div>
            <div class="col-lg-4">
                <h2>Случайные</h2>

                <p>Вывод пяти случайных книг.</p>
                <br />

                <?php echo $this->render('books-randomize', [
                    'list'  => $booksRandomize,
                    'page'  => $booksRandomizePage,
                    'first' => true,
                ]);?>
            </div>
        </div>

    </div>
</div>
