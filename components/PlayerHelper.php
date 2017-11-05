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

  private static $sources = [
    "poster"=>"โปสเตอร์",
    "facebook_or_online"=>"Facebook หรือสื่อออนไลน์",
    "coach"=>"โค้ชหรืออาจารย์",
    "newspaper"=>"หนังสือพิมพ์",
    "radio"=>"วิทยุ",
    "television"=>"โทรทัศน์",
    "billboard"=>"ป้ายประกาศ"
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

  public static function getSources() {
    return self::$sources;
  }

  public static function getHeights($min, $max, $unit) {
    $heights = [];

    for($i=$min; $i < $max; $i++) {
      $heights[$i] = $i . " " . $unit;  
    }

    return $heights;
  }

  public static function getWeights($min, $max, $unit) {
    $weights = [];
    for($i=$min; $i <= $max; $i++) {
      $weights[$i] = $i . " " . $unit;
    }
    return $weights;
  }

}
?>
