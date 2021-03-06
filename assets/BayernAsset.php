<?php
namespace app\assets;

use yii\web\AssetBundle;

class BayernAsset extends AssetBundle {

  public $basePath = "@webroot";
  public $baseUrl = "@web";
  public $css = [
    "css/base.css",
    "css/bayern.css",
    "css/responsive.css"
  ];
  public $js = [
    "js/bayern.js"
  ];
  // public $jsOptions = ["position" => \yii\web\View::POS_HEAD];
  public $depends = [
    "app\assets\RequiredAsset",
  ];

}

class RequiredAsset extends AssetBundle {

  public $sourcePath = "@bower";
  public $css = [
    "css-reset/reset.min.css",
    "jquery-ui/themes/smoothness/jquery-ui.min.css",
    "font-awesome/css/font-awesome.min.css",
    "flexslider/flexslider.css"
  ];
  public $js = [
    "jquery/dist/jquery.min.js",
    "jquery-ui/jquery-ui.min.js",
    "jquery-ui/ui/widgets/datepicker.js",
    "flexslider/jquery.flexslider-min.js"
    // "scrollreveal/dist/scrollreveal.min.js"
  ];
  public $jsOptions = ["position" => \yii\web\View::POS_HEAD];
}
?>
