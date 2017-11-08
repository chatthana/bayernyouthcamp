<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class ApiController extends Controller {

  public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
  }

  public function actionSavesingleform() {
    // Not implemented yet
  }

  public function actionCheckarenaidrequirement() {
    $arenaCode = Yii::$app->request->get('code');
    $arenaObject = \app\models\Arenas::findOne(['code' => $arenaCode]);
    echo $arenaObject->requires_id_photocopy;
  }

  public function actionSaveteam() {
    // Not implemented yet
  }
}
?>
