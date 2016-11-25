<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class TeamRegistrationForm extends Model {

  // Coach
  public $coach_name;
  public $coach_name_en;
  public $coach_identity_card_no;
  public $coach_age;
  public $coach_telephone;
  public $coach_school;
  public $coach_address;
  public $coach_identity_card_file;

  [[
    'coach_name', 'coach_name_en', 'coach_identity_card_no', 'coache_age', 'coach_telephone', 'coach_school', 'coach_address',
    'member1_name', 'member1_name_en', 'member1_nickname', 'member1_birthdate', 'member1_age', 'member1_identity_card_no', 'member1_school', 'member1_year', 'member1_address', 'member1_telephone', 'member1_line_id', 'member1_facebook_link', 'member1_email', 'member1_foot', 'member1_pp', 'member1_ppa', 'member1_weight', 'member1_height', 'member1_team', 'member1_guardian_name', 'member1_guardian_telephone',
    'member2_name', 'member2_name_en', 'member2_nickname', 'member2_birthdate', 'member2_age', 'member2_identity_card_no', 'member2_school', 'member2_year', 'member2_address', 'member2_telephone', 'member2_line_id', 'member2_facebook_link', 'member2_email', 'member2_foot', 'member2_pp', 'member2_ppa', 'member2_weight', 'member2_height', 'member2_team', 'member2_guardian_name', 'member2_guardian_telephone',
    'member3_name', 'member3_name_en', 'member3_nickname', 'member3_birthdate', 'member3_age', 'member3_identity_card_no', 'member3_school', 'member3_year', 'member3_address', 'member3_telephone', 'member3_line_id', 'member3_facebook_link', 'member3_email', 'member3_foot', 'member3_pp', 'member3_ppa', 'member3_weight', 'member3_height', 'member3_team', 'member3_guardian_name', 'member3_guardian_telephone',
    'member4_name', 'member4_name_en', 'member4_nickname', 'member4_birthdate', 'member4_age', 'member4_identity_card_no', 'member4_school', 'member4_year', 'member4_address', 'member4_telephone', 'member4_line_id', 'member4_facebook_link', 'member4_email', 'member4_foot', 'member4_pp', 'member4_ppa', 'member4_weight', 'member4_height', 'member4_team', 'member4_guardian_name', 'member4_guardian_telephone',
    'member5_name', 'member5_name_en', 'member5_nickname', 'member5_birthdate', 'member5_age', 'member5_identity_card_no', 'member5_school', 'member5_year', 'member5_address', 'member5_telephone', 'member5_line_id', 'member5_facebook_link', 'member5_email', 'member5_foot', 'member5_pp', 'member5_ppa', 'member5_weight', 'member5_height', 'member5_team', 'member5_guardian_name', 'member5_guardian_telephone',
    'member6_name', 'member6_name_en', 'member6_nickname', 'member6_birthdate', 'member6_age', 'member6_identity_card_no', 'member6_school', 'member6_year', 'member6_address', 'member6_telephone', 'member6_line_id', 'member6_facebook_link', 'member6_email', 'member6_foot', 'member6_pp', 'member6_ppa', 'member6_weight', 'member6_height', 'member6_team', 'member6_guardian_name', 'member6_guardian_telephone',
    'member7_name', 'member7_name_en', 'member7_nickname', 'member7_birthdate', 'member7_age', 'member7_identity_card_no', 'member7_school', 'member7_year', 'member7_address', 'member7_telephone', 'member7_line_id', 'member7_facebook_link', 'member7_email', 'member7_foot', 'member7_pp', 'member7_ppa', 'member7_weight', 'member7_height', 'member7_team', 'member7_guardian_name', 'member7_guardian_telephone',
  ], 'required', 'message' => 'กรุณากรอก{attribute}']

  // Member 1
  public $member1_name;
  public $member1_name_en
  public $member1_nickname;
  public $member1_birthdate;
  public $member1_age;
  public $member1_identity_card_no;
  public $member1_school;
  public $member1_year;
  public $member1_address;
  public $member1_telephone;
  public $member1_line_id;
  public $member1_facebook_link;
  public $member1_email;
  public $member1_foot;
  public $member1_pp;
  public $member1_ppa;
  public $member1_weight;
  public $member1_height;
  public $member1_team;
  public $member1_guardian_name;
  public $member1_guardian_telephone;
  public $member1_identity_card_file;

  // Member 2
  public $member2_name;
  public $member2_name_en
  public $member2_nickname;
  public $member2_birthdate;
  public $member2_age;
  public $member2_identity_card_no;
  public $member2_school;
  public $member2_year;
  public $member2_address;
  public $member2_telephone;
  public $member2_line_id;
  public $member2_facebook_link;
  public $member2_email;
  public $member2_foot;
  public $member2_pp;
  public $member2_ppa;
  public $member2_weight;
  public $member2_height;
  public $member2_team;
  public $member2_guardian_name;
  public $member2_guardian_telephone;
  public $member2_identity_card_file;

  // Member 3
  public $member3_name;
  public $member3_name_en
  public $member3_nickname;
  public $member3_birthdate;
  public $member3_age;
  public $member3_identity_card_no;
  public $member3_school;
  public $member3_year;
  public $member3_address;
  public $member3_telephone;
  public $member3_line_id;
  public $member3_facebook_link;
  public $member3_email;
  public $member3_foot;
  public $member3_pp;
  public $member3_ppa;
  public $member3_weight;
  public $member3_height;
  public $member3_team;
  public $member3_guardian_name;
  public $member3_guardian_telephone;
  public $member3_identity_card_file;

  // Member 4
  public $member4_name;
  public $member4_name_en
  public $member4_nickname;
  public $member4_birthdate;
  public $member4_age;
  public $member4_identity_card_no;
  public $member4_school;
  public $member4_year;
  public $member4_address;
  public $member4_telephone;
  public $member4_line_id;
  public $member4_facebook_link;
  public $member4_email;
  public $member4_foot;
  public $member4_pp;
  public $member4_ppa;
  public $member4_weight;
  public $member4_height;
  public $member4_team;
  public $member4_guardian_name;
  public $member4_guardian_telephone;
  public $member4_identity_card_file;

  // Member 5
  public $member5_name;
  public $member5_name_en
  public $member5_nickname;
  public $member5_birthdate;
  public $member5_age;
  public $member5_identity_card_no;
  public $member5_school;
  public $member5_year;
  public $member5_address;
  public $member5_telephone;
  public $member5_line_id;
  public $member5_facebook_link;
  public $member5_email;
  public $member5_foot;
  public $member5_pp;
  public $member5_ppa;
  public $member5_weight;
  public $member5_height;
  public $member5_team;
  public $member5_guardian_name;
  public $member5_guardian_telephone;
  public $member5_identity_card_file;

  // Member 6
  public $member6_name;
  public $member6_name_en
  public $member6_nickname;
  public $member6_birthdate;
  public $member6_age;
  public $member6_identity_card_no;
  public $member6_school;
  public $member6_year;
  public $member6_address;
  public $member6_telephone;
  public $member6_line_id;
  public $member6_facebook_link;
  public $member6_email;
  public $member6_foot;
  public $member6_pp;
  public $member6_ppa;
  public $member6_weight;
  public $member6_height;
  public $member6_team;
  public $member6_guardian_name;
  public $member6_guardian_telephone;
  public $member6_identity_card_file;

  // Member 7
  public $member7_name;
  public $member7_name_en
  public $member7_nickname;
  public $member7_birthdate;
  public $member7_age;
  public $member7_identity_card_no;
  public $member7_school;
  public $member7_year;
  public $member7_address;
  public $member7_telephone;
  public $member7_line_id;
  public $member7_facebook_link;
  public $member7_email;
  public $member7_foot;
  public $member7_pp;
  public $member7_ppa;
  public $member7_weight;
  public $member7_height;
  public $member7_team;
  public $member7_guardian_name;
  public $member7_guardian_telephone;
  public $member7_identity_card_file;

  public $arena;

  public $accepted;


  public function rules() {
    return [
      [[
        'coach_name', 'coach_name_en', 'coach_identity_card_no', 'coache_age', 'coach_telephone', 'coach_school', 'coach_address',
        'member1_name', 'member1_name_en', 'member1_nickname', 'member1_birthdate', 'member1_age', 'member1_identity_card_no', 'member1_school', 'member1_year', 'member1_address', 'member1_telephone', 'member1_line_id', 'member1_facebook_link', 'member1_email', 'member1_foot', 'member1_pp', 'member1_ppa', 'member1_weight', 'member1_height', 'member1_team', 'member1_guardian_name', 'member1_guardian_telephone',
        'member2_name', 'member2_name_en', 'member2_nickname', 'member2_birthdate', 'member2_age', 'member2_identity_card_no', 'member2_school', 'member2_year', 'member2_address', 'member2_telephone', 'member2_line_id', 'member2_facebook_link', 'member2_email', 'member2_foot', 'member2_pp', 'member2_ppa', 'member2_weight', 'member2_height', 'member2_team', 'member2_guardian_name', 'member2_guardian_telephone',
        'member3_name', 'member3_name_en', 'member3_nickname', 'member3_birthdate', 'member3_age', 'member3_identity_card_no', 'member3_school', 'member3_year', 'member3_address', 'member3_telephone', 'member3_line_id', 'member3_facebook_link', 'member3_email', 'member3_foot', 'member3_pp', 'member3_ppa', 'member3_weight', 'member3_height', 'member3_team', 'member3_guardian_name', 'member3_guardian_telephone',
        'member4_name', 'member4_name_en', 'member4_nickname', 'member4_birthdate', 'member4_age', 'member4_identity_card_no', 'member4_school', 'member4_year', 'member4_address', 'member4_telephone', 'member4_line_id', 'member4_facebook_link', 'member4_email', 'member4_foot', 'member4_pp', 'member4_ppa', 'member4_weight', 'member4_height', 'member4_team', 'member4_guardian_name', 'member4_guardian_telephone',
        'member5_name', 'member5_name_en', 'member5_nickname', 'member5_birthdate', 'member5_age', 'member5_identity_card_no', 'member5_school', 'member5_year', 'member5_address', 'member5_telephone', 'member5_line_id', 'member5_facebook_link', 'member5_email', 'member5_foot', 'member5_pp', 'member5_ppa', 'member5_weight', 'member5_height', 'member5_team', 'member5_guardian_name', 'member5_guardian_telephone',
        'member6_name', 'member6_name_en', 'member6_nickname', 'member6_birthdate', 'member6_age', 'member6_identity_card_no', 'member6_school', 'member6_year', 'member6_address', 'member6_telephone', 'member6_line_id', 'member6_facebook_link', 'member6_email', 'member6_foot', 'member6_pp', 'member6_ppa', 'member6_weight', 'member6_height', 'member6_team', 'member6_guardian_name', 'member6_guardian_telephone',
        'member7_name', 'member7_name_en', 'member7_nickname', 'member7_birthdate', 'member7_age', 'member7_identity_card_no', 'member7_school', 'member7_year', 'member7_address', 'member7_telephone', 'member7_line_id', 'member7_facebook_link', 'member7_email', 'member7_foot', 'member7_pp', 'member7_ppa', 'member7_weight', 'member7_height', 'member7_team', 'member7_guardian_name', 'member7_guardian_telephone',
        'arena', 'accepted'
      ], 'required', 'message' => 'กรุณากรอก{attribute}'],
      ['email']
    ];
  }

}
?>
