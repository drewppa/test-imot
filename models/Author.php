<?php

namespace app\models;

use yii\db\ActiveRecord;

class Author extends ActiveRecord
{

    const SEVERAL_READERS = 3;
    const ITEMS_PER_PAGE = 10;

    /**
     * @return string.
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * Получение списка авторов, чьи книги в данный момент читает более {SEVERAL_REASDERS} читателей.
     * @param integer $page Номер страницы для выборки
     * @return array
     */
    public static function getReadMoreSeveralReaders($page = 1)
    {
        $list = (new \yii\db\Query())->select(['author.name', 'reader_count' => 'COUNT(book.reader_id)'])
            ->from('author')
            ->innerJoin('book_author', 'book_author.author_id = author.id')
            ->innerJoin('book', 'book.id = book_author.book_id AND book.reader_id > 0')
            ->orderBy(['author.name' => SORT_ASC])
            ->groupBy('name')
            ->having(['>', 'reader_count', self::SEVERAL_READERS])
            ->offset(((int) $page - 1) * self::ITEMS_PER_PAGE)
            ->limit(self::ITEMS_PER_PAGE + 1)
            ->all();
        return $list;
    }


}
