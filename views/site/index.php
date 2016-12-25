<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div id="main-content">
  <div class="horizontal-custom-rule"></div>
  <section id="teaser" class="clearfix">
    <div class="left">
      <?php echo Html::img('@web/images/teaser_r.png'); ?>
    </div>
    <div class="right">
      <div class="content-box reveal">
        <h3>เปิดรับสมัครแล้ว วันนี้!</h3>
        <p>
          <!-- Fc Bayern Youth Cup Thailand 2017<br/> รายการที่ค้นหา นักเตะอายุระหว่าง 14-15 ปี<br/> (พ.ศ.2544-2545) เข้ารับการคัดเลือกนักเตะที่ดีที่สุด<br/>จากทีมงานและผู้ฝึกสอนจาก Fc Bayern Munich<br/>ยอดทีมจากประเทศเยอรมัน -->
          <!-- FC BAYERN YOUTH CUP THAILAND 2017 เป็นโครงการของสโมสรฟุตบอลบาร์เยิร์น มิวนิค สโมสรฟุตบอลที่ดีที่สุดของโลกในขณะนี้ เป็นสโมสรฯ มีเอกลักษณ์เฉพาะตัวและแนวทางการสร้างนักกีฬาฟุตบอลในแบบของตนที่ชัดเจน เรียบง่ายแต่ทรงไปด้วยประสิทธิภาพในการพัฒนาเด็กเยาวชนรุ่นใหม่ๆ การจัดกิจกรรม FC BAYERN YOUTH CUP THAILAND 2017 นั้น มีแนวความคิดมาจากความต้องการที่จะสร้างโอกาสให้เด็กๆ จากสังคมที่แตกต่างกัน โดยมีพื้นฐานจากหลากหลายครอบครัว จะได้มาร่วมเล่นฟุตบอลแลกเปลี่ยนประสบการณ์การแข่งขันด้วยกัน -->
          FC Bayern Youth Cup Thailand 2017 รายการที่ค้นหาเยาวชนที่มีฝีเท้าดีที่สุด 10 คน เข้าไปฝึกและแข่งขัน World Final ที่เมืองมิวนิค ประเทศเยอรมนี<br/>
          <span style="color:#005f9a;">( เฉพาะผู้ที่เกิดระหว่างวันที่ 1 มกราคม 2544 - 31 ธันวาคม 2545 เท่านั้น )</span>
        </p>
        <div class="submit-operation">
          <?php echo Html::a('สมัครเข้าร่วมกิจกรรม', Yii::$app->urlManager->createUrl(['site/preregister', 'type'=>'individual']), ['class'=>['button bayern smalltext']]); ?>
          <?php echo Html::a('สมัครเป็นทีม', Yii::$app->urlManager->createUrl(['site/preregister', 'type'=>'team']), ['class'=>['button bayern smalltext']]); ?>
          <?php echo Html::a('สมัครผู้รักษาประตู', Yii::$app->urlManager->createUrl(['site/preregister', 'regtype'=>'gk']), ['class'=>['button bayern smalltext']]); ?>
        </div>
      </div>
    </div>
  </section>
</div>
