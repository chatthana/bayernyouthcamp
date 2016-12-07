<?php
namespace app\components;

use Yii;
use yii\base\Component;
use app\models\Arenas;

class ArenaHelper extends Component {

  public static function getArenaName($arenaCode) {
    $arena = Arenas::findOne(['code'=>$arenaCode]);
    return $arena->text;
  }

  public static function getApplicationDate($arenaCode) {
    $arena = Arenas::findOne(['code'=>$arenaCode]);
    return $arena->reg_date;
  }

  public static function findDateByText($text) {
    return Arenas::findOne(['text'=>$text])->reg_date;
  }

}

?>
