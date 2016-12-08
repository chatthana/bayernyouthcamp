<?php

namespace app\controllers;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class AdminController extends \yii\web\Controller
{

    public $layout = 'bootstrap';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
              'class' => AccessControl::className(),
              'rules' => [
                  [
                      'allow' => true,
                      'roles' => ['@'],
                  ],

                  // ...
              ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
