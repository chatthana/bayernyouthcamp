<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\GalleryAlbums;
use app\models\GalleryImageForm;
use yii\web\UploadedFile;

class GalleryController extends Controller {

  public $layout = 'bootstrap';

  public function actionIndex() {
    $galleries = GalleryAlbums::find()->all();
    return $this->render('index', ['galleries' => $galleries]);
  }

  public function actionCreate() {
    $album = new GalleryAlbums();

    if (Yii::$app->request->isPost) {
      if ($album->load(Yii::$app->request->post())) {
        $album->save();
        die('kuay');
      }
    }

    return $this->render('create', ['album'=>$album, ]);
  }

  public function actionAdd() {
    $baseModel = GalleryAlbums::findOne(Yii::$app->request->get('id'));
    $formModel = new GalleryImageForm();

    if (Yii::$app->request->isPost) {
      // Retrieve the uploaded files first
      $formModel->imageFiles = UploadedFile::getInstances($formModel, 'imageFiles');
      if ($formModel->upload(Yii::$app->request->get('id'))) {
        return $this->redirect(['display', 'id'=>Yii::$app->request->get('id')]);
      } else {
        die('HEE');
      }
    }

    return $this->render('add', ['baseModel' => $baseModel, 'formModel' => $formModel]);
  }

  public function actionDisplay() {
    $gallery_id = Yii::$app->request->get('id');
    $gallery = GalleryAlbums::findOne($gallery_id);
    return $this->render('display', ['gallery'=>$gallery]);
  }

  public function actionUpdate() {
    $model = GalleryAlbums::findOne(Yii::$app->request->get('id'));
    if (Yii::$app->request->isPost) {
      $model->load(Yii::$app->request->post());
      $model->save();
      return $this->redirect(['display', 'id'=>$model->id]);
    }
    return $this->render('update', ['model'=>$model]);
  }

  public function actionDelete() {
    GalleryAlbums::findOne(Yii::$app->request->get('id'))->delete();
    return $this->redirect(['index']);
  }
}

?>
