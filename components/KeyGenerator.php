<?php
namespace app\components;

use Yii;
use Yii\base\Component;

class KeyGenerator extends Component {

  public static function getUniqueName() {

    $prefix = substr(md5(date('YmdHis')), 0, 8);
    $random = '';
    for ($i = 0; $i < 8; $i++) {
      $random .= rand(0,9);
    }

    return $prefix . $random;

  }

}
?>
