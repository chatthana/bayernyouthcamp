<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\wweb\UploadedFile;

class CoachRegistrationForm extends Model {

  public $name;
  public $name_en;
  public $identity_card_no;
  public $age;
  public $telephone;
  public $email;
  public $school;
  public $address;
  public $identity_card_file;
  public $source;
  public $arena;

  public function rules() {
    return [
      [['name', 'name_en', 'identity_card_no', 'age', 'telephone', 'email', 'school', 'address', 'source', 'arena'], 'required', 'message' => '{attribute}ห้ามเป็นค่าว่าง'],
      // ['name', 'required'],
      [['identity_card_no', 'age', 'telephone'], 'integer', 'message' => '{attribute}ต้องเป็นตัวเลขเท่านั้น'],
      [['identity_card_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg']
    ];
  }

  public function attributeLabels() {
    return [
      "name" => "ชื่อ - นามสกุล",
      "name_en" => "ชื่อ - นามสกุล (อังกฤษ)",
      "identity_card_no" => "รหัสบัตรประชาชน",
      "age" => "อายุ",
      "telephone" => "เบอร์โทรศัพท์",
      "email" => "อีเมล์",
      "school" => "โรงเรียน / สังกัด",
      "address" => "ที่อยู่",
      "identity_card_file" => "ไฟล์ภาพบัตรประชาชน",
      "source" => "ได้รับข่าวสารจาก",
      "arena" => "สนาม"
    ];
  }

  public function upload($name) {
    if ($this->validate()) {
      $this->identity_card_file->saveAs(Yii::getAlias('@webroot') . '/uploads/identity_cards/' . $name . '.' . $this->identity_card_file->extension);
      return true;
    } else {
      return false;
    }
  }

}
?>
