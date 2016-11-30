<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegistrationForm;
use app\models\CoachRegistrationForm;
use app\models\TeamRegistrationForm;
use app\models\Teams;
use app\models\Players;
use app\models\Coaches;
use app\models\Arenas;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
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

    public function actionSendmail() {
      Yii::$app->mailer->compose('@app/mail/layouts/test')
        ->setFrom('chattana.j@gmail.com')
        ->setTo('chatthana@mol.com')
        ->setSubject('Test SwiftMailer in Yii2')
        ->attach(Yii::getAlias('@webroot') . '/pdf/hello.pdf')
        ->send();
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

      $model = Yii::$app->session->get('data');
      $filename = Yii::$app->request->get('filename');

      // Create a user
      $player = new Players();
      $player->name = $model->name;
      $player->name_en = $model->name_en;
      $player->nickname = $model->nickname;
      $player->birthdate = $model->birthdate;
      $player->age = $model->age;
      $player->identity_card_no = $model->identity_card_no;
      $player->identity_card_path = '/uploads/identity_cards/' . $filename . '.' . $model->identity_card_file->extension;
      $player->school = $model->school;
      $player->year = $model->year;
      $player->address = $model->address;
      $player->telephone = $model->telephone;
      $player->line_id = $model->line_id;
      $player->facebook_link = $model->facebook_link;
      $player->email = $model->email;
      $player->foot = $model->foot;
      $player->pp = $model->pp;
      $player->ppa = $model->ppa;
      $player->weight = $model->weight;
      $player->height = $model->height;
      $player->team = $model->team;
      $player->guardian_name = $model->guardian_name;
      $player->guardian_telephone = $model->guardian_telephone;
      $player->arena = $model->arena;
      $player->created = date('Y-m-d H:i:s');
      $player->save();

      $content = $this->renderPartial('_pdf', ['model'=>$player]);

      $_pdfName = \app\components\KeyGenerator::getUniqueName();
      $pdf = new Pdf([
        'mode' => 'utf-8',
        'format' => Pdf::FORMAT_A4,
        'orientation' => Pdf::ORIENT_PORTRAIT,
        'filename'=>Yii::getAlias('@webroot') . '/pdf/' . $_pdfName .'.pdf',
        'destination' => Pdf::DEST_FILE,
        'content' => $content,
        'cssFile' => '@webroot/css/pdf.css'
      ]);

      $pdf->render();

      Yii::$app->mailer->compose('@app/mail/layouts/test')
        ->setFrom('info@sporttb.com')
        ->setTo($player->email)
        ->setSubject('ยืนยันการสมัคร FC Bayern Youth Cup 2017')
        ->attach(Yii::getAlias('@webroot') . '/pdf/'. $_pdfName .'.pdf')
        ->send();

    }

    public function actionRegister() {

      $model = new RegistrationForm();
      $arenas = Arenas::find()->all();

      if (Yii::$app->request->post()) {
        $model->load(Yii::$app->request->post());
        $model->identity_card_file = UploadedFile::getInstance($model, 'identity_card_file');
        $_pfilename = \app\components\KeyGenerator::getUniqueName();
        $model->upload($_pfilename);
        Yii::$app->session->set('data', $model);
        return $this->render('individual_render', ['model'=>$model, 'filename'=>$_pfilename]);
      }

      if (Yii::$app->request->get('requesttype') == 'edit') {
        $model = Yii::$app->session->get('data');
        return $this->render('register', ['model'=>$model, 'arenas'=>$arenas]);
      }

      // If there is a GET parameter specifying the registration type, parse it to the variable
      if (Yii::$app->request->get('regtype')!==null) {
        if (Yii::$app->request->get('regtype') == 'gk') {
          $model->pp = 'gk';
          $model->ppa = 'gk';
        }
      }

      return $this->render('register', ['model'=>$model, 'arenas'=>ArrayHelper::map($arenas, 'code', 'text')]);
    }

    /**
      * Register as a team
      * Two types of participant (Players and coach)
      * Note : These participants share the same competing arena and must be the same ONLY!!!
      */

    public function actionRegisterteam() {

      $arenas = Arenas::find()->all();

      // Instantiate the coach model. We need only one coach per team
      $coachModel = new CoachRegistrationForm();

      // We need 7 members per team, so iterate and create array of models here
      for ($i=0; $i < 2; $i++) {
        $models[] = new TeamRegistrationForm();
      }

      // If this is a POST request (means forms are summitted)
      if (Yii::$app->request->post()) {

        //Assign the post values for coach model
        $coachModel->load(Yii::$app->request->post());

        // Get instance of the uploaded identity card file
        $coachModel->identity_card_file = UploadedFile::getInstance($coachModel, 'identity_card_file');
        // Finally call upload method to save the image with unique file name
        $_cfilename = \app\components\KeyGenerator::getUniqueName();
        $coachModel->upload($_cfilename);

        // Assign multiple players to the form model
        \yii\base\Model::loadMultiple($models, Yii::$app->request->post());

        // Create new activity-based team first
        $team = new Teams();
        $team->pretty_unique_id = $coachModel->arena . date('YmdHis');
        $team->selected_arena = $coachModel->arena;
        $team->created = date('Y-m-d H:i:s');
        $team->save();

        // Create the coach record for this team
        $coach = new Coaches();
        $coach->name = $coachModel->name;
        $coach->name_en = $coachModel->name_en;
        $coach->identity_card_no = $coachModel->identity_card_no;
        $coach->age = $coachModel->age;
        $coach->telephone = $coachModel->telephone;
        $coach->school = $coachModel->school;
        $coach->address = $coachModel->address;
        $coach->identity_card_path = '/uploads/identity_cards/' . $_cfilename . $coachModel->identity_card_file->extension;
        $coach->virtual_team = $team->id;
        $coach->created = date('Y-m-d H:i:s');
        $coach->save();

        // Iterate to create players for the team
        foreach ($models as $model) {
          // Retrieve uploaded file
          $model->identity_card_file = UploadedFile::getInstance($model, 'identity_card_file');
          $_pfilename = \app\components\KeyGenerator::getUniqueName();
          $model->identity_card_file->saveAs(Yii::getAlias('@webroot' . '/uploads/identity_cards/' . $index . $_pfilename . '.' . $model->identity_card_file->extension));

          $player = new Players();
          $player->name = $model->name;
          $player->name_en = $model->name_en;
          $player->birthdate = $model->birthdate;
          $player->age = $model->age;
          $player->identity_card_no = $model->identity_card_no;
          $player->identity_card_path = '/uploads/identity_cards/' . $_pfilename . '.' . $model->identity_card_file->extension;
          $player->school = $model->school;
          $player->year = $model->year;
          $player->address = $model->address;
          $player->telephone = $model->telephone;
          $player->line_id = $model->line_id;
          $player->facebook_link = $model->facebook_link;
          $player->email = $model->email;
          $player->foot = $model->foot;
          $player->pp = $model->pp;
          $player->ppa = $model->ppa;
          $player->weight = $model->weight;
          $player->height = $model->height;
          $player->team = $model->team;
          $player->virtual_team = $team->id;
          $player->guardian_name = $model->guardian_name;
          $player->guardian_telephone = $model->guardian_telephone;
          $player->arena = $coachModel->arena;
          $player->created = date('Y-m-d H:i:s');
          $player->save();

        }
      }

      return $this->render('teamregister', ['coachModel'=>$coachModel, 'models' => $models, 'arenas'=>$arenas]);
    }

    public function actionPreregister() {
      $regtype = Yii::$app->request->get('type') !== false ? Yii::$app->request->get('type') : NULL;
      return $this->render('preregister', ['regtype'=>$regtype]);
    }

    public function actionTest() {
      die(\app\components\ArenaHelper::getArenaName('tu1'));
    }

    public function actionSuccess() {
      return $this->render('success');
    }

}
