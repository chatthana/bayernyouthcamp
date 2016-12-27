<?php

namespace app\controllers;

use Yii;
use app\models\Players;
use app\models\SearchPlayers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
// Custom libraries (3rd party)
use app\components\KeyGenerator;
use kartik\mpdf\Pdf;

/**
 * PlayerController implements the CRUD actions for Players model.
 */
class PlayerController extends Controller
{

    public $layout = 'bootstrap';

    /**
     * @inheritdoc
     */
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

    /**
     * Lists all Players models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchPlayers();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Players model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Players model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'bootstrap';

        $model = new Players();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Players model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Players model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionResendpdf($id) {
      $player = Players::findOne($id);
      $content = $this->renderPartial('/site/_pdf', ['model'=>$player]);

      $sendMail = Yii::$app->mailer->compose('@app/mail/layouts/resend')
        ->setFrom('info@sporttb.com')
        ->setTo($player->email)
        ->setSubject('คำร้องขอใบสมัคร FC Bayern Youth Cup Thailand 2017');

      $_pdfName = \app\components\KeyGenerator::getUniqueName();

      $pdf = new Pdf([
        'mode' => 'utf-8',
        'format' => Pdf::FORMAT_A4,
        'orientation' => Pdf::ORIENT_PORTRAIT,
        'filename'=>Yii::getAlias('@webroot') . '/pdf/recreated/' . $_pdfName .'.pdf',
        'destination' => Pdf::DEST_FILE,
        'content' => $content,
        'cssFile' => '@webroot/css/pdf.css'
      ]);

      $pdf->render();

      $sendMail->attach(Yii::getAlias('@webroot') . '/pdf/recreated/' . $_pdfName . '.pdf');
      $sendMail->send();

      unlink(Yii::getAlias('@webroot') . '/pdf/recreated/' . $_pdfName . '.pdf');

      Yii::$app->session->setFlash('success', 'ส่งอีเมล์พร้อมไฟล์ PDF ให้กับคุณ ' . $player->name . ' เรียบร้อยแล้ว');
      return $this->redirect(['view', 'id'=>$player->id]);
    }

    /**
     * Finds the Players model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Players the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Players::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
