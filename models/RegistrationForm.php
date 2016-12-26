<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class RegistrationForm extends Model {

  public $name;
  public $name_en;
  public $nickname;
  public $birthdate;
  public $age;
  public $identity_card_no;
  public $school;
  public $year;
  public $address;
  public $telephone;
  public $line_id;
  public $facebook_link;
  public $email;
  public $foot;
  public $pp;
  public $ppa;
  public $weight;
  public $height;
  public $team;
  public $guardian_name;
  public $guardian_telephone;
  public $source;
  public $arena;
  public $identity_card_file;

  public function rules() {
    return [
      [['name', 'name_en', 'nickname', 'birthdate', 'age', 'identity_card_no', 'school', 'year', 'address', 'telephone', 'line_id', 'facebook_link', 'email', 'foot', 'pp', 'ppa', 'weight', 'height', 'guardian_name', 'guardian_telephone', 'source', 'arena'], 'required', 'message' => '{attribute}ห้ามเป็นค่าว่าง'],
      ['email', 'email', 'message' => 'รูปแบบอีเมล์ไม่ถูกต้อง'],
      [['pp', 'ppa', 'team'], 'safe'],
      [['identity_card_no', 'age', 'year', 'telephone', 'guardian_telephone'], 'integer', 'message' => '{attribute}ต้องเป็นตัวเลขเท่านั้น'],
      [['identity_card_file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg', 'message'=>'กรุณาอัปโหลดไฟล์']
    ];
  }

  public function attributeLabels() {
    return [
      "name" => "ชื่อ - นามสกุล",
      "name_en" => "ชื่อ - นามสกุล (ภาษาอังกฤษ)",
      "nickname" => "ชื่อเล่น",
      "birthdate" => "วันเกิด",
      "age" => "อายุ",
      "identity_card_no" => "เลขที่บัตรประชาชน",
      "school" => "โรงเรียน / สังกัด",
      "year" => "ชั้นปีที่",
      "address" => "ที่อยู่",
      "telephone" => "เบอร์โทรศัพท์",
      "line_id" => "Line ID",
      "facebook_link" => "Facebook",
      "email" => "อีเมล์",
      "foot" => "เท้าที่ถนัด",
      "pp" => "ตำแหน่งที่ถนัด (1)",
      "ppa" => "ตำแหน่งที่ถนัด (2)",
      "weight" => "น้ำหนัก (kg)",
      "height" => "ส่วนสูง (cm)",
      "team" => "สังกัด / ทีม",
      "guardian_name" => "ชื่อผู้ปกครอง",
      "guardian_telephone" => "เบอร์โทรศัพท์ผู้ปกครอง",
      "identity_card_file" => "ไฟล์ภาพบัตรประชาชน",
      "source" => "ได้รับข่าวสารจาก",
      "arena" => "สนาม"
    ];
  }

  public function upload($name) {
      $this->identity_card_file->saveAs(Yii::getAlias('@webroot') . '/uploads/identity_cards/' . $name . '.' . $this->identity_card_file->extension);
      return true;
  }

}
?>
