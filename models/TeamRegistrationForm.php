<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class TeamRegistrationForm extends Model {

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
  public $identity_card_file;

  public function rules() {
    return [
      [['name', 'name_en', 'nickname', 'birthdate', 'age', 'identity_card_no', 'school', 'year', 'address', 'telephone', 'line_id', 'facebook_link', 'email', 'foot', 'pp', 'ppa', 'weight', 'height', 'team', 'guardian_name', 'guardian_telephone'], 'required', 'message' => '{attribute}ห้ามเป็นค่าว่าง'],
      ['email', 'email', 'message' => 'รูปแบบอีเมล์ไม่ถูกต้อง'],
      [['identity_card_no', 'age', 'telephone', 'guardian_telephone'], 'integer', 'message' => '{attribute}ต้องเป็นตัวเลขเท่านั้น'],
      [['identity_card_file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg']
    ];
  }

}
?>
