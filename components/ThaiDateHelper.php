<?php
namespace app\components;

use Yii;
use yii\base\Component;

class ThaiDateHelper extends Component {

  private static $months = [
    "01" => "มกราคม",
    "02" => "กุมภาพันธ์",
    "03" => "มีนาคม"
  ];

  public static function getMonth($numeric_month) {

    if (isset(self::$months[$numeric_month])) {
      return self::$months[$numeric_month];
    }

    return false;
  }

  public static function getThaiDate($date) {
    $datas = explode('-', $date);
    return date('j', strtotime($date)) . ' ' . self::getMonth($datas[1]) . ' ' . ($datas[0] + 543);
  }

}
?>
