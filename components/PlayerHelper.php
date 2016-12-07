<?php
namespace app\components;

use Yii;
use yii\base\Component;

class PlayerHelper extends Component {

  private static $positions = [
    "df" => "กองหลัง",
    "mf" => "กองกลาง",
    "st" => "กองหน้า",
    "gk" => "ผู้รักษาประตู"
  ];

  public static function getPosition($positionCode) {
    return isset(self::$positions[$positionCode]) ? self::$positions[$positionCode] : false;
  }

  public static function getAllPositions($exceptions = []) {
    if (count($exceptions) > 0) {
      foreach ($exceptions as $exception) {
        unset(self::$positions[$exception]);
      }
    }
    return self::$positions;
  }

}
?>
