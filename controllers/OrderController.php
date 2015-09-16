<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class OrderController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
                'list' => \app\models\Book::getReadWithSeveralAuthors(),
            ]);
    }


}
