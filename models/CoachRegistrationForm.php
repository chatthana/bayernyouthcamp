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
  public $school;
  public $address;
  public $identity_card_file;

  public function rules() {
    return [
      [['coach_name', 'coach_name_en', 'coach_identity_card_no', 'coache_age', 'coach_telephone', 'coach_school', 'coach_address',], 'required', 'message' => '{attribute}ห้ามเป็นค่าว่าง'],
      [['identity_card_no', 'age', 'telephone'], 'integer', 'message' => '{attribute}ต้องเป็นตัวเลขเท่านั้น'],
      [['identity_card_file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg']
    ];
  }

}
?>
