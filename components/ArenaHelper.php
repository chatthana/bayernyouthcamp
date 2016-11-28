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

}

?>
