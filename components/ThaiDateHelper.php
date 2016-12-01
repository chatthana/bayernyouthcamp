<?php
namespace app\components;

use Yii;
use yii\base\Component;

class ThaiDateHelper extends Component {

  private static $months = [
    "01" => "มกราคม",
    "02" => "กุมภาพันธ์",
    "03" => "มีนาคม",
    "04" => "เมษายน",
    "05" => "พฤษภาคม",
    "06" => "มิถุนายน",
    "07" => "กรกฎาคม",
    "08" => "สิงหาคม",
    "09" => "กันยายน",
    "10" => "ตุลาคม",
    "11" => "พฤศจิกายน",
    "12" => "ธันวาคม"
  ];

  public static function getMonth($numeric_month) {

    if (isset(self::$months[$numeric_month])) {
      return self::$months[$numeric_month];
    }

    return false;
  }

  public static function getMonths() {
    return self::$months;
  }

  public static function getDates() {
    $dateNo = [];
    for ($i=1; $i <= 31; $i++) {
      $dateNo[$i] = $i;
    }

    return $dateNo;
  }

  public static function getYears() {
    $years = [];
    for ($i=2001; $i <= 2002; $i++) {
      $years[$i] = $i;
    }
    return $years;
  }

  public static function getThaiDate($date) {
    $datas = explode('-', $date);
    return date('j', strtotime($date)) . ' ' . self::getMonth($datas[1]) . ' ' . ($datas[0] + 543);
  }

}
?>
