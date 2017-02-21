<?php
namespace app\components;

use Yii;
use Yii\base\Component;

class KeyGenerator extends Component {

  private function randomME($length) {
    $random = '';
    for ($i=0; $i < $length; $i++) {
      $random .= rand(0,9);
    }
    return $random;
  }

  public static function getUniqueName() {

    $prefix = substr(md5(date('YmdHis')), 0, 8);
    $random = '';
    for ($i = 0; $i < 8; $i++) {
      $random .= rand(0,9);
    }

    return $prefix . $random;

  }

  public static function generateUniqueFilename($initialName) {

    $head = substr(sha1($initialName), 0, 10);
    $body = date('YmdHis');
    $meta = self::randomMe(10);
    return $head . $body . $meta;

  }

}
?>
