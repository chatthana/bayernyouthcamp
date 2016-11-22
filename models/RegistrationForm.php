<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class RegistrationForm extends Model {

  public $firstname;
  public $lastname;
  public $nickname;
  public $birthdate;
  public $age;
  public $weight;
  public $height;
  public $school;
  public $level;
  public $address;
  public $telephone;
  public $line_id;
  public $facebook_link;
  public $email;
  public $foot;
  public $preferred_position;
  public $preferred_position_alternative;
  public $guardian_name;
  public $guardian_telephone;
  public $arena;

  // Image Upload
  public $identity_card;

  // Accept the form
  public $accepted;


  public function rules() {
    return [
      [['firstname', 'lastname', 'nickname', 'birthdate', 'age', 'weight', 'height', 'school', 'level', 'address', 'telephone', 'line_id', 'facebook_link', 'email', 'foot', 'preferred_position', 'guardian_name', 'guardian_telephone', 'arena', 'accepted'], 'required', 'message' => '{attribute} ห้ามเป็นค่าว่าง'],
      ['email', 'email'],
      [['telephone', 'guardian_telephone'], 'integer', 'message' => '{attribute} ต้องเป็นตัวเลขเท่านั้น'],
      [['identity_card'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg'],
    ];
  }

  public function attributeLabels() {
    return [
      'firstname' => 'ชื่อ',
      'lastname' => 'นามสกุล',
      'nickname' => 'ชื่อเล่น',
      'birthdate' => 'วันเกิด',
      'age' => 'อายุ',
      'weight' => 'น้ำหนัก',
      'height' => 'ส่วนสูง',
      'school' => 'โรงเรียน',
      'level' => 'ชั้นปีที่',
      'address' => 'ที่อยู่ปัจจุบัน',
      'telephone' => 'เบอร์โทรศัพท์ที่ติดต่อได้',
      'line_id' => 'Line ID',
      'facebook_link' => 'Facebook Profile',
      'email' => 'อีเมล์',
      'foot' => 'เท้าที่ถนัด',
      'preferred_position' => 'ตำแหน่งที่ถนัด (1)',
      'preferred_position_alternative' => 'ตำแหน่งที่ถนัด (2)',
      'guardian_name' => 'ชื่อ - นามสกุลผู้ปกครอง',
      'guardian_telephone' => 'เบอร์โทรศัพท์ผู้ปกครอง'
    ];
  }

  public function upload() {
    if ($this->validate()) {
      $this->identity_card->saveAs(Yii::getAlias('@webroot') . '/uploads/' . $this->identity_card->basename . '.' . $this->identity_card->extension);
      return true;
    } else {
      return false;
    }
    // if ($this->validate()) {
    //   die('fuck');
    // }
    // die();
  }

}
?>
