<?php
namespace app\assets;

use yii\web\AssetBundle;

class BayernAsset extends AssetBundle {

  public $basePath = "@webroot";
  public $baseUrl = "@web";
  public $css = [
    "css/base.css",
    "css/bayern.css"
  ];
  public $js = [
    "js/bayern.js"
  ];
  public $jsOptions = ["position" => \yii\web\View::POS_HEAD];
  public $depends = [
    "app\assets\RequiredAsset",
  ];

}

class RequiredAsset extends AssetBundle {

  public $sourcePath = "@bower";
  public $css = [
    "css-reset/reset.min.css",
  ];
  public $js = [
    "jquery/dist/jquery.min.js",
    "scrollreveal/dist/scrollreveal.min.js"
  ];
  public $jsOptions = ["position" => \yii\web\View::POS_HEAD];
}
?>
