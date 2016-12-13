<?php
namespace app\components;

use Yii;
use yii\base\Component;
use app\models\Arenas;
use app\models\Regions;

class ArenaHelper extends Component {

  public static function getArenaName($arenaCode) {
    $arena = Arenas::findOne(['code'=>$arenaCode]);
    return $arena->text;
  }

  public static function getApplicationDate($arenaCode) {
    $arena = Arenas::findOne(['code'=>$arenaCode]);
    return $arena->reg_date;
  }

  public static function findDatesByText($text) {
    $arena = Arenas::findOne(['text'=>$text]);
    return [
      "regDate"=>$arena->reg_date,
      "lastRegDate"=>$arena->last_reg_date
    ];
  }

  public static function getRegionValue($region_id) {
    return Regions::findOne($region_id)->name;
  }

}

?>
