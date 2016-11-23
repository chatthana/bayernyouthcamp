<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegistrationForm;
use yii\web\UploadedFile;
use kartik\mpdf\Pdf;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * @inheritdoc
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionConfirm() {
      $content = $this->renderPartial('_sponsored');
      // die($content);
      $pdf = new Pdf([
        'mode' => 'utf-8',
        'format' => Pdf::FORMAT_A4,
        'orientation' => Pdf::ORIENT_PORTRAIT,
        'destination' => Pdf::DEST_BROWSER,
        'content' => $content,
        'cssFile' => '@webroot/css/pdf.css'
        // 'methods' => [
        //     'SetHeader'=>['Bayern Youth Cup 2017'],
        //     'SetFooter'=>['{PAGENO}'],
        // ]
      ]);
      return $pdf->render();
      // return $this->renderPartial('_sponsored');
    }

    public function actionRegister() {
      $model = new RegistrationForm();
      if (Yii::$app->request->post()) {
        $model->load(Yii::$app->request->post());
        $model->identity_card = UploadedFile::getInstance($model, 'identity_card');
        $model->upload();
        return $this->render('individual_render', ['model'=>$model]);
      }
      return $this->render('register', ['model'=>$model]);
    }

    public function actionRegistergk() {
      $model = new RegistrationForm();
      return $this->render('registergk', ['model' => $model]);
    }

    public function actionRegisterteam() {
        $this->enableCsrfValidation = false;
        echo json_encode([
          "token"=> "3e587udjt9545dfdg0eeedfd",
          "username"=> "admin",
          "password_verfied"=> true
        ]);
    }
}
