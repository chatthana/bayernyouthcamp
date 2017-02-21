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
        if ($album->save()) {
          Yii::$app->session->setFlash('success', 'Successfully saved the new album');
        } else {
          Yii::$app->session->setFlash('danger', 'Failed to save the new album, please try again');
        }
        return $this->redirect(['index']);
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
        Yii::$app->session->setFlash('success', 'Successfully saved ' . count($formModel->imageFiles) . ' files to the server');
      } else {
        Yii::$app->session->setFlash('danger', 'Failed to save images, please try again');
      }
      return $this->redirect(['display', 'id'=>Yii::$app->request->get('id')]);
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
