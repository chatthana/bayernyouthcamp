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
    if (Yii::$app->request->isPost) {
      echo "Fuck";
    } else {
      echo "Not Fucked";
    }
  }

  public function actionSaveteam() {

  }
}
?>
