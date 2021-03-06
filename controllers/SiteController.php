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
use app\models\GalleryAlbums;
use app\models\GalleryImages;
use app\models\GalleryCategories;
use app\models\GalleryCategoryMapping;
use app\models\Regions;
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

    public function actionNews() {
      $regions = Regions::find()->all();
      return $this->render('news', ['regions'=>$regions]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'bootstrap';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['admin/index']);
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

        return $this->redirect(['admin/index']);
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

    public function actionYouthcup() {
      // If the gallery id is requested, check for the information parsed in the query string
      $selected = Yii::$app->request->get('gid');

      $albums = GalleryAlbums::find()->where(['active'=>1])->orderBy(['pos' => SORT_ASC])->all();

      // If the selected album (gallery) is not null, find it and store the object in the variable
      // If not, use the first object in the album array (latest one) as the active album
      if ($selected !== null) {
        $active_album = GalleryAlbums::findOne(['id'=>$selected, 'active'=>1]);
        $active_album = $active_album !== null ? $active_album : $albums[0];
      } else {
        $active_album = $albums[0];
      }

      // Then we are now ready to render the page
      return $this->render('youthcup', ['albums'=>$albums, 'active_album'=>$active_album]);
    }

    public function actionConfirm() {

      if (Yii::$app->request->get('confirmtype') == 'team') {

        $teamData = Yii::$app->session->get('teamdata');
        $coachModel = $teamData['coach']['models'];
        $models = $teamData['players']['models'];

        $arena = Arenas::findOne(['code' => $coachModel->arena]);

        // Pre-compose the email with existing information
        $sendMail = Yii::$app->mailer->compose('@app/mail/layouts/test')
        ->setFrom('info@sporttb.com')
        ->setSubject('ยืนยันการสมัคร FC Bayern Youth Cup 2017');

        // Declare empty array of filenames
        $files_to_be_attached = [];

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
        $coach->email = $coachModel->email;
        $coach->school = $coachModel->school;
        $coach->address = $coachModel->address;
        if ($arena->requires_id_photocopy)
          $coach->identity_card_path = '/uploads/identity_cards/' . $teamData['coach']['filenames'] . '.' . $coachModel->identity_card_file->extension;
        $coach->virtual_team = $team->id;
        $coach->source = $coachModel->source;
        $coach->created = date('Y-m-d H:i:s');
        $coach->save();

        // Render coach template
        $coachContent = $this->renderPartial('_cpdf', ['model'=>$coach, 'arena'=>$coachModel->arena]);

        $_cpdfName = \app\components\KeyGenerator::getUniqueName();
        $cpdf = new Pdf([
          'mode' => 'utf-8',
          'format' => Pdf::FORMAT_A4,
          'orientation' => Pdf::ORIENT_PORTRAIT,
          'filename'=>Yii::getAlias('@webroot') . '/pdf/' . $_cpdfName .'.pdf',
          'destination' => Pdf::DEST_FILE,
          'content' => $coachContent,
          'cssFile' => '@webroot/css/pdf.css'
        ]);

        $cpdf->render();

        $files_to_be_attached[] = $_cpdfName;

        // We got the coach's email. Let's mark the destination
        $sendMail->setTo($coach->email);

        // Iterate through models of players
        foreach ($models as $index => $model) {
          $player = new Players();
          $player->name = $model->name;
          $player->name_en = $model->name_en;
          $player->nickname = $model->nickname;
          $player->birthdate = $model->birthdate;
          $player->age = $model->age;
          $player->identity_card_no = $model->identity_card_no;
          if ($arena->requires_id_photocopy)
            $player->identity_card_path = '/uploads/identity_cards/' . $teamData['players']['filenames'][$index] . '.' . $model->identity_card_file->extension;
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
          $player->source = $coachModel->source;
          $player->arena = $coachModel->arena;
          $player->created = date('Y-m-d H:i:s');
          $player->save();

          $player->unique_id = $player->arena . str_pad($player->getPrimaryKey(), 4, "0", STR_PAD_LEFT);
          $player->save();

          // Render each memeber template and store in the array
          $content = $this->renderPartial('_pdf', ['model'=>$player]);

          // Create the PDF file
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

          // Render PDF
          $pdf->render();

          // List the file in the array
          $files_to_be_attached[] = $_pdfName;

        }

        foreach ($files_to_be_attached as $file) {
          $sendMail->attach(Yii::getAlias('@webroot') . '/pdf/' . $file . '.pdf');
        }

        $sendMail->send();

        return $this->render('success');

      }


      // $checkExistence = Players::findOne(['identity_card_no'=>$model->identity_card_no, 'arena'=>$model->arena]);

      $model = Yii::$app->session->get('data');
      $arena = Arenas::findOne(['code' => $model->arena]);
      $filename = Yii::$app->request->get('filename');

      // Recheck the user's existence to assure the valid information stored in the database
      $checkExistence = Players::findOne(['identity_card_no'=>$model->identity_card_no, 'arena'=>$model->arena]);
      if ($checkExistence !== null) {
        Yii::$app->session->setFlash('error', 'คุณ ' . $checkExistence->name . ' ได้ถูกบันทึกเป็นที่เรียบร้อยแล้ว แต่เกิดข้อผิดพลาดเนื่องจากเกิดการ Refresh เกินจำนวนครั้ง');
        return $this->redirect(['site/error']);
      }

      // Create a user
      $player = new Players();
      $player->name = $model->name;
      $player->name_en = $model->name_en;
      $player->nickname = $model->nickname;
      $player->birthdate = $model->birthdate;
      $player->age = $model->age;
      $player->identity_card_no = $model->identity_card_no;
      // If the identity card is requires for this arena, let's record its path
      if ($arena->requires_id_photocopy)
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
      $player->source = $model->source;
      $player->arena = $model->arena;
      $player->created = date('Y-m-d H:i:s');
      if (!$player->save()) {
        Yii::$app->session->setFlash('error', 'ข้อมูลไม่ตรงตามเงื่อนไข กรุณากรอกข้อมูลให้ครบถ้วนและถูกต้อง');
        return $this->redirect(['site/error']);
      }

      // Create player's unique ID
      $player->unique_id = $model->arena . str_pad($player->getPrimaryKey(), 4, "0", STR_PAD_LEFT);
      $player->update();

      // Render content for PDF
      $content = $this->renderPartial('_pdf', ['model'=>$player]);

      // Generate PDF name
      $_pdfName = \app\components\KeyGenerator::getUniqueName();

      // Initialize the PDF file
      $pdf = new Pdf([
        'mode' => 'utf-8',
        'format' => Pdf::FORMAT_A4,
        'orientation' => Pdf::ORIENT_PORTRAIT,
        'filename'=>Yii::getAlias('@webroot') . '/pdf/' . $_pdfName .'.pdf',
        'destination' => Pdf::DEST_FILE,
        'content' => $content,
        'cssFile' => '@webroot/css/pdf.css'
      ]);

      $_b_pdf = new Pdf([
        'mode' => 'utf-8',
        'format' => Pdf::FORMAT_A4,
        'orientation' => Pdf::ORIENT_PORTRAIT,
        'filename'=>'application_form.pdf',
        'destination' => Pdf::DEST_BROWSER,
        'content' => $content,
        'cssFile' => '@webroot/css/pdf.css'
      ]);

      // Create the PDF file and store it in the directory
      $pdf->render();

      // Send the PDF to the applicant's email address
      $sendMail = Yii::$app->mailer->compose('@app/mail/layouts/test')
        ->setFrom('info@sporttb.com')
        ->setTo($player->email)
        ->setSubject('ยืนยันการสมัคร FC Bayern Youth Cup 2017')
        ->attach(Yii::getAlias('@webroot') . '/pdf/'. $_pdfName .'.pdf')
        ->send();

      $_b_pdf->render();

      // Notify the user with the success message (In this scenario)
      return $this->render('success');

    }

    public function actionRegister() {

      $model = new RegistrationForm();
      $arenas = Arenas::find()->where(['>=', 'last_reg_date', date('Y-m-d')])->andWhere(['active'=>1])->all();

      if (Yii::$app->request->post()) {
        $model->load(Yii::$app->request->post());

        // Get requested arena data
        $arena = Arenas::findOne(['code' => $model->arena]);

        // Check whether the user already exists in the database or not
        // If yes, redirect and notify the user
        $checkExistence = Players::findOne(['identity_card_no'=>$model->identity_card_no, 'arena'=>$model->arena]);
        if ($checkExistence !== null) {
          Yii::$app->session->setFlash('error', 'คุณ ' . $checkExistence->name . ' ได้ทำการสมัคร ณ สนามดังกล่าวไปแล้ว กรุณาทำการสมัครที่สนามอื่น หรือ ท่านกด Refresh เกินจำนวนครั้งที่กำหนด');
          return $this->redirect(['site/error']);
        }

        if($arena->requires_id_photocopy) {
          $model->identity_card_file = UploadedFile::getInstance($model, 'identity_card_file');
          $_pfilename = \app\components\KeyGenerator::getUniqueName();
          $model->upload($_pfilename);
        }
        Yii::$app->session->set('data', $model);

        // Conditional render for some stadiums that require the existence of identity card file
        if($arena->requires_id_photocopy)
          return $this->render('individual_render', ['model'=>$model, 'filename'=>$_pfilename, 'arena' => $arena]);

        return $this->render('individual_render', ['model' => $model, 'arena' => $arena]);
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

      $arenas = Arenas::find()->where(['>=', 'last_reg_date', date('Y-m-d')])->andWhere(['active'=>1])->all();

      // Instantiate the coach model. We need only one coach per team
      $coachModel = new CoachRegistrationForm();

      // We need 7 members per team, so iterate and create array of models here
      for ($i=0; $i < 7; $i++) {
        $models[] = new RegistrationForm();
      }

      // If this is a POST request (means forms are summitted)
      if (Yii::$app->request->post()) {

        // Pre-declare the filename objects
        Yii::$app->session['teamdata'] = new \ArrayObject;

        //Assign the post values for coach model
        $coachModel->load(Yii::$app->request->post());
        // Assign multiple players to the form model
        \yii\base\Model::loadMultiple($models, Yii::$app->request->post());

        $selectedArena = Arenas::findOne(['code' => $coachModel->arena]);

        // Get instance of the uploaded identity card file
        if ($selectedArena->requires_id_photocopy) {

          $coachModel->identity_card_file = UploadedFile::getInstance($coachModel, 'identity_card_file');

          // Finally call upload method to save the image with unique file name
          $_cfilename = \app\components\KeyGenerator::getUniqueName();
          $coachModel->upload($_cfilename);
          Yii::$app->session['teamdata']['coach']['filenames'] = $_cfilename;

          // Upload files first
          foreach ($models as $index => $model) {
            $model->identity_card_file = UploadedFile::getInstance($model, '[' . $index . ']identity_card_file');
            $_pfilename = \app\components\KeyGenerator::getUniqueName();
            $model->upload($_pfilename);
            Yii::$app->session['teamdata']['players']['filenames'][] = $_pfilename;
          }

        }

        foreach ($models as $model) {
          $checkDuplicate = Players::findOne(['identity_card_no' => $model->identity_card_no, 'arena' => $coachModel->arena]);
          if ($checkDuplicate !== null) {
            Yii::$app->session->setFlash('error', 'คุณ ' . $checkDuplicate->name . ' ได้ทำการสมัคร ณ สนามนี้ไปแล้ว จึงไม่สามารถสมัครได้อีก');
            return $this->redirect(['site/error']);
          }
        }

        // Store models in the session
        Yii::$app->session['teamdata']['coach']['models'] = $coachModel;
        Yii::$app->session['teamdata']['players']['models'] = $models;

        return $this->render('team_render', ['coachModel'=>$coachModel, 'models'=>$models]);
      }

      return $this->render('teamregister', ['coachModel'=>$coachModel, 'models' => $models, 'arenas'=>ArrayHelper::map($arenas, 'code', 'text')]);

    }

    public function actionPreregister() {
      $regtype = Yii::$app->request->get('type') !== false ? Yii::$app->request->get('type') : NULL;
      return $this->render('preregister', ['regtype'=>$regtype]);
    }

    public function actionTest() {
      $players = Players::find()->all();

      $sendMail = Yii::$app->mailer->compose('@app/mail/layouts/test')
        ->setFrom('info@sporttb.com')
        ->setTo('chattana.j@gmail.com')
        ->setSubject('ยืนยันการสมัคร FC Bayern Youth Cup 2017');

      foreach ($players as $index => $player) {

        $content = $this->renderPartial('_pdf', ['model'=>$player]);


        $pdf = new Pdf([
          'mode' => 'utf-8',
          'format' => Pdf::FORMAT_A4,
          'orientation' => Pdf::ORIENT_PORTRAIT,
          'filename'=>Yii::getAlias('@webroot') . '/pdf/' . $index .'.pdf',
          'destination' => Pdf::DEST_FILE,
          'content' => $content,
          'cssFile' => '@webroot/css/pdf.css'
        ]);

        $pdf->render();

        $sendMail->attach(Yii::getAlias('@webroot') . '/pdf/'. $index.'.pdf');

      }

      $sendMail->send();


    }

    public function actionSuccess() {
      return $this->render('success');
    }

    public function actionError() {
      return $this->render('error');
    }

    public function actionOffline() {
      echo "Maintenance Mode. Sorry for the inconvenience.";
    }

}
