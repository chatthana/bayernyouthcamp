<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\GalleryImages;
use yii\web\UploadedFile;
use app\components\KeyGenerator;

class GalleryImageForm extends Model {

  public $imageFiles = [];

  public function rules() {
    return [
      [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png', 'maxFiles' => 300]
    ];
  }

  public function upload($album_id, $process = true) {
    if ($this->validate()) {
      foreach ($this->imageFiles as $file) {
        $filename = KeyGenerator::generateUniqueFilename($file->name);
        $file->saveAs(Yii::getAlias('@webroot') . '/uploads/gallery/' . $filename . '.' . $file->extension);
        if ($process) {
          $this->process($album_id, $filename . '.' . $file->extension);
        }
      }
      return true;
    } else {
      return false;
    }
  }

  private function process($album_id, $filename) {
    $model = new GalleryImages();
    $model->album_id = $album_id;
    $model->path = '/uploads/gallery/' . $filename;
    $model->save();
  }

}
?>
