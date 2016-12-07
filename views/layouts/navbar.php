    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
             <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand" href="<?php echo Yii::$app->urlManager->createUrl(['site/index']);?>">
                    <img src="<?php echo Yii::getAlias('@web'); ?>/imgs/menu/ico_header_shop_now_th.png">
                    </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                        <li><a class="menu" href=""><img src="<?php echo Yii::getAlias('@web'); ?>/imgs/menu/btn_easytopup.png"></a></li>
                        <li><a class="menu" href=""><img src="<?php echo Yii::getAlias('@web'); ?>/imgs/menu/btn_easysteam.png"></a></li>
                        <li><a class="menu" href=""><img src="<?php echo Yii::getAlias('@web'); ?>/imgs/menu/btn_easyblizzard.png"></a></li>
                        <li><a class="menu" href=""><img src="<?php echo Yii::getAlias('@web'); ?>/imgs/menu/btn_easyPSN.png"></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                        <li><a class="menuLanguage" href=""><img src="<?php echo Yii::getAlias('@web'); ?>/imgs/menu/btn_language_th.png"></a></li>
                        <li><a class="menuLanguage" href=""><img src="<?php echo Yii::getAlias('@web'); ?>/imgs/menu/btn_language_en.png"></a></li>
                </ul>
            </div>
        </div>
    </nav>
<div class="footer navbar-fixed-bottom">
     <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-left">
            <li><img src="<?php echo Yii::getAlias('@web'); ?>/imgs/menu/footer_contact_us_th.png"></li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
            <li><img src="<?php echo Yii::getAlias('@web'); ?>/imgs/menu/footer_logos.png"></li>
         </ul>
    </div>
</div>
