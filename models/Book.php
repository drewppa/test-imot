<?php

namespace app\models;

use yii\db\ActiveRecord;

class Book extends ActiveRecord
{

    const SEVERAL_AUTHORS = 3;
    const RANDOM_COUNT = 5;
    const ITEMS_PER_PAGE = 10;

    /**
     * @return string.
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * Получение списка книг, находящихся на руках у читателей, и имеющих не менее {SEVERAL_AUTHORS} соавторов.
     * @param integer $page Номер страницы для выборки
     * @return array
     */
    public static function getReadWithSeveralAuthors($page = 1)
    {
        $list = self::find()
            ->where([
                    '>=', 'author_count', self::SEVERAL_AUTHORS,
                ])
            ->andWhere([
                    '>', 'reader_id', 0,
                ])
            ->orderBy(['name' => SORT_ASC])
            ->offset(((int) $page - 1) * self::ITEMS_PER_PAGE)
            ->limit(self::ITEMS_PER_PAGE + 1)
            ->all();
        return $list;
    }

    /**
     * Получение {RANDOM_COUNT} случайных книг.
     * @return array
     */
    public static function getRandomize()
    {
        $count = self::find()->count();
        $max = ($count > self::RANDOM_COUNT) ? self::RANDOM_COUNT : $count;
        $list = [];
        while (count($list) < $max) {
            $item = self::find()->limit(1)->offset(rand(0, $count))->one();
            if ($item) {
                $list[] = $item;
            }
        }
        return $list;
    }

}
