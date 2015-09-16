<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $page = (int) \Yii::$app->getRequest()->get('page', 1);
        return $this->render('index', [
                'readBooksMoreSeveralAuthors'     => [],
                'readBooksMoreSeveralAuthorsPage' => 0,

                'readAuthorsMoreSeveralReaders'     => [],
                'readAuthorsMoreSeveralReadersPage' => 0,

                'booksRandomize'     => [],
                'booksRandomizePage' => 0,
            ]);
//         $page = (int) \Yii::$app->getRequest()->get('page', 1);
//         return $this->render('index', [
//                 'readBooksMoreSeveralAuthors'     => \app\models\Book::getReadWithSeveralAuthors($page),
//                 'readBooksMoreSeveralAuthorsPage' => $page,

//                 'readAuthorsMoreSeveralReaders'     => \app\models\Author::getReadMoreSeveralReaders($page),
//                 'readAuthorsMoreSeveralReadersPage' => $page,

//                 'booksRandomize'     => \app\models\Book::getRandomize($page),
//                 'booksRandomizePage' => $page,
//             ]);
    }

    public function actionReadBooksMoreSeveralAuthors()
    {
        $page = (int) \Yii::$app->getRequest()->get('page', 1);
        return $this->renderPartial('read-books-more-several-authors', [
                'list'     => \app\models\Book::getReadWithSeveralAuthors($page),
                'page' => $page,
            ]);
    }

    public function actionReadAuthorsMoreSeveralReaders()
    {
        $page = (int) \Yii::$app->getRequest()->get('page', 1);
        return $this->renderPartial('read-authors-more-several-readers', [
                'list'     => \app\models\Author::getReadMoreSeveralReaders($page),
                'page' => $page,
            ]);
    }

    public function actionBooksRandomize()
    {
        $page = (int) \Yii::$app->getRequest()->get('page', 1);
        return $this->renderPartial('books-randomize', [
                'list'     => \app\models\Book::getRandomize(),
                'page' => $page,
            ]);
    }


}
