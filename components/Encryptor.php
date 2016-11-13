<?php
namespace app\components;

use Yii;
use yii\base\component;

class Encryptor extends Component {

  public static function encrypt($content) {

    $_md5 = substr(md5($content),0, 5);
    $_sha1 = substr(sha1($content), 0, 5);
    $raw = $_md5 . $_sha1;
    $hashed = md5($raw);
    return $hashed;
  }

}
?>
