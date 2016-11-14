<?php
namespace app\models;

use Yii;
use yii\base\Model;

class RegistrationForm extends Model {

  public $firstname;
  public $lastname;
  public $email;
  public $telephone;

  public function rules() {
    return [
      [['firstname', 'lastname', 'email', 'telephone'], 'required'],
      ['email', 'email'],
    ];
  }

  public function attributeLabels() {
    return [
      'firstname' => 'ชื่อ',
      'lastname' => 'นามสกุล',
      'email' => 'อีเมล์',
      'telephone' => 'เบอร์โทรศัพท์ที่ติดต่อได้'
    ];
  }

}
?>
