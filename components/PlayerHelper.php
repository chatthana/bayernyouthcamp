<?php
namespace app\components;

use Yii;
use yii\base\Component;

class PlayerHelper extends Component {

  private static $positions = [
    "bk" => "กองหลัง",
    "ct" => "กองกลาง",
    "fw" => "กองหน้า",
    "gk" => "ผู้รักษาประตู"
  ];

  public static function getPosition($positionCode) {
    return isset(self::$positions[$positionCode]) ? self::$positions[$positionCode] : false;
  }

}
?>
