<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\ArenaHelper;
use app\components\ThaiDateHelper;
use app\components\PlayerHelper;

// Register JS file
$this->registerJsFile(Yii::getAlias('@web') . '/js/teamregistration.js');
?>

<div class="wrapper">

  <section id="team-registration-form-container">

    <div class="registration-form-header">
      <!-- <div class="bayern-vertical-logo">
        <?php echo Html::img('@web/images/vertical-logo.png'); ?>
      </div> -->
      <div class="bayern-sponsored">
        <?php echo Html::img('@web/images/registration_wkn.png'); ?>
        <?php echo Html::img('@web/images/vertical_logo_2.png'); ?>
        <?php echo Html::img('@web/images/registration_stb.png'); ?>
      </div>


      <h1>สมัครในนามทีม</h1>
    </div>

    <div id="form-navigation-container" class="">
      <a class="form-navigator selected" href="#" data-target-sync="1" data-target-sequence="1">โค้ช / อาจารย์</a>
      <a class="form-navigator" href="#" data-target-sync="2" data-target-sequence="2">ผู้เล่นที่ 1</a>
      <a class="form-navigator" href="#" data-target-sync="3" data-target-sequence="3">ผู้เล่นที่ 2</a>
      <a class="form-navigator" href="#" data-target-sync="4" data-target-sequence="4">ผู้เล่นที่ 3</a>
      <a class="form-navigator" href="#" data-target-sync="5" data-target-sequence="5">ผู้เล่นที่ 4</a>
      <a class="form-navigator" href="#" data-target-sync="6" data-target-sequence="6">ผู้เล่นที่ 5</a>
      <a class="form-navigator" href="#" data-target-sync="7" data-target-sequence="7">ผู้เล่นที่ 6</a>
      <a class="form-navigator" href="#" data-target-sync="8" data-target-sequence="8">ผู้เล่นที่ 7</a>
    </div>

    <?php $form = ActiveForm::begin(); ?>

      <div id="coach-form" class="each-form" data-sequence="1">
        <h1>สำหรับโค้ช / อาจารย์</h1>
        <ul class="clearfix">
          <li class="full clearfix">
            <?php echo $form->field($coachModel, 'name', ['inputOptions' => ['placeholder' => $coachModel->getAttributeLabel('name')]])->label(false); ?>
          </li>
          <li class="full clearfix">
            <?php echo $form->field($coachModel, 'name_en', ['inputOptions' => ['placeholder' => $coachModel->getAttributeLabel('name_en')]])->label(false); ?>
          </li>
          <li class="col-3 clearfix">
            <?php echo $form->field($coachModel, 'identity_card_no', ['inputOptions' => ['placeholder' => $coachModel->getAttributeLabel('identity_card_no')]])->label(false); ?>
            <?php echo $form->field($coachModel, 'age', ['inputOptions' => ['placeholder' => $coachModel->getAttributeLabel('age')]])->label(false); ?>
            <?php echo $form->field($coachModel, 'telephone', ['inputOptions' => ['placeholder' => $coachModel->getAttributeLabel('telephone')]])->label(false); ?>
          </li>
          <li class="full clearfix">
            <?php echo $form->field($coachModel, 'email', ['inputOptions' => ['placeholder' => $coachModel->getAttributeLabel('email')]])->label(false); ?>
          </li>
          <li class="full clearfix">
            <?php echo $form->field($coachModel, 'school', ['inputOptions' => ['placeholder' => $coachModel->getAttributeLabel('school')]])->label(false); ?>
          </li>
          <li class="full clearfix">
            <?php echo $form->field($coachModel, 'address', ['inputOptions' => ['placeholder' => $coachModel->getAttributeLabel('address')]])->label(false); ?>
          </li>
        </ul>

        <div class="upload-button-container">
          <?php echo $form->field($coachModel, 'identity_card_file', ['options' => ['class' => 'form-center'],
            'template' =>
            '   {label}
                <div class="id-card-uploader button green">
                  <span>อัพโหลดภาพบัตรประชาชน</span>
                  {input}
                </div>
             '
          ])->fileInput()->label(false); ?>
        </div>

        <div class="registration-form-arenas">
          <ul>
            <?= $form->field($coachModel, 'arena')->radioList(
              $arenas
            ,[
              "item"=>function($index, $label, $name, $checked, $value) {
                $input = "<input type='radio' name=" . $name . " value=". $value . " />";
                $_label = '<label class="control-label"><div class="radio-left">'. $label .'</div><div class="radio-right">วันที่ '. ThaiDateHelper::getThaiDate(ArenaHelper::findDateByText($label)) .'</div></label>';
                return '<div class="each-radiobox clearfix"><label class="radio-label"><div class="radio-label-input-group">'.$input.'<div class="custom-radio"></div></div></label>' . $_label . "</div>";
              }
            ]
            )->label(false); ?>
          </ul>
        </div>

        <div class="submit-button-container">
          <?php echo Html::a('ไปต่อ', '/', ['class'=>'button red', 'data-target-sequence'=>'2']); ?>
        </div>
      </div>

      <!-- Iterate through form objects to create the forms of same model -->
      <?php foreach ($models as $index => $model): ?>
        <div class="each-form player" data-sequence="<?= $index + 2 ?>">
          <h1>ผู้เล่นคนที่ <?= $index + 1 ?></h1>
          <ul>
            <li class="col-2 clearfix">
              <?php echo $form->field($model, '['. $index .']name', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('name')]])->label(false); ?>
              <?php echo $form->field($model, '['. $index .']nickname', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('nickname')]])->label(false); ?>
            </li>
            <li class="full clearfix">
              <?php echo $form->field($model, '[' . $index . ']name_en', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('name_en')]])->label(false); ?>
            </li>
            <li class="custom clearfix">
              <div class="form-group span-1" data-seq-ref="<?= $index ?>">
                <?php echo Html::dropDownList('birthdate',null, ThaiDateHelper::getDates(), ['prompt'=>'--- วัน ---', 'class'=>'birthdate-date-selector']); ?>
              </div>
              <div class="form-group span-1" data-seq-ref="<?= $index ?>">
                <?php echo Html::dropDownList('birthmonth', null, ThaiDateHelper::getMonths(), ['prompt'=>'--- เดือน ---', 'class'=>'birthdate-month-selector']); ?>
              </div>
              <div class="form-group span-1" data-seq-ref="<?= $index ?>">
                <?php echo Html::dropDownList('birthyear', null, ThaiDateHelper::getYears(), ['prompt'=>'--- ปี ---', 'class'=>'birthdate-year-selector']); ?>
              </div>
              <?php echo $form->field($model, '[' . $index . ']age', ['options'=>['class'=>'span-3'], 'inputOptions' => ['placeholder'=>$model->getAttributeLabel('age'), 'readonly'=>true]])->label(false); ?>
            </li>
            <li class="full clearfix">
              <?php echo $form->field($model, '[' . $index . ']identity_card_no', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('identity_card_no')]])->label(false); ?>
            </li>
            <li class="col-2 clearfix">
              <?php echo $form->field($model, '[' . $index . ']school', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('school')]])->label(false); ?>
              <?php echo $form->field($model, '[' . $index . ']year', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('year')]])->label(false); ?>
            </li>
            <li class="full clearfix">
              <?php echo $form->field($model, '[' . $index . ']address', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('address')]])->label(false); ?>
            </li>
            <li class="col-3 clearfix">
              <?php echo $form->field($model, '['. $index .']telephone', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('telephone')]])->label(false); ?>
              <?php echo $form->field($model, '['. $index .']line_id', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('line_id')]])->label(false); ?>
              <?php echo $form->field($model, '['. $index .']facebook_link', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('facebook_link')]])->label(false); ?>
            </li>
            <li class="full clearfix">
              <?php echo $form->field($model, '[' . $index . ']email', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('email')]])->label(false); ?>
            </li>
            <li class="col-3 clearfix">
              <?php echo $form->field($model, '[' . $index . ']foot', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('foot')]])->dropDownList(['left'=>'ซ้าย', 'right'=>'ขวา'], ['prompt'=>'--- เท้าที่ถนัด ---'])->label(false); ?>
              <?php echo $form->field($model, '[' . $index . ']pp', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('pp')]])->dropDownList(PlayerHelper::getAllPositions(['gk']), ['prompt'=>'--- ตำแหน่งที่ถนัด ---'])->label(false); ?>
              <?php echo $form->field($model, '[' . $index . ']ppa', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('ppa')]])->dropDownList(PlayerHelper::getAllPositions(['gk']), ['prompt'=>'--- ตำแหน่งที่ถนัด ---'])->label(false); ?>
            </li>
            <li class="col-3 clearfix">
              <?php echo $form->field($model, '['. $index .']weight', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('weight')]])->label(false); ?>
              <?php echo $form->field($model, '['. $index .']height', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('height')]])->label(false); ?>
              <?php echo $form->field($model, '['. $index .']team', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('team')]])->label(false); ?>
            </li>
            <li class="col-2 clearfix">
              <?php echo $form->field($model, '[' . $index . ']guardian_name', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('guardian_name')]])->label(false); ?>
              <?php echo $form->field($model, '[' . $index . ']guardian_telephone', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('guardian_telephone')]])->label(false); ?>
            </li>
          </ul>

          <div class="upload-button-container">
            <?php echo $form->field($model, '[' . $index . ']identity_card_file', ['options' => ['class' => 'form-center'],
              'template' =>
              '   {label}
                  <div class="id-card-uploader button green">
                    <span>อัพโหลดภาพบัตรประชาชน</span>
                    {input}
                  </div>
               '
            ])->fileInput()->label(false); ?>
          </div>

          <?= $form->field($model, '[' . $index . ']birthdate')->hiddenInput(['value'=>''])->label(false); ?>

          <div class="submit-button-container">
            <?php if (($index + 1) === count($models)) : ?>
              <?php echo Html::submitButton('ส่งข้อมูล', ['class'=>'button']); ?>
            <?php else : ?>
              <?php echo Html::a('ไปต่อ', '/', ['class'=>'button red','data-target-sequence'=>$index + 3]); ?>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>

    <?php ActiveForm::end(); ?>
  </section>

</div>
