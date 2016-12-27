<section id="main-content">
  <div class="wrapper">
    <!-- <div class="exception-notifier error">
      <h3>เกิดข้อผิดพลาด</h3>
      <p>คุณกดปุ่ม Refresh จนเกิดการซ้ำของข้อมูล</p>
      <div class="exception-button-container">
        <a href="<?php echo Yii::$app->UrlManager->createUrl(['site/index']); ?>">กลับไปหน้าแรก</a>
      </div>
    </div> -->
    <?php foreach (Yii::$app->session->getAllFlashes() as $key => $value): ?>
      <div class="exception-notifier <?php echo $key; ?>">
        <h3>เกิดข้อผิดพลาด</h3>
        <p><?php echo $value; ?></p>
        <div class="exception-button-container">
          <a href="<?php echo Yii::$app->UrlManager->createUrl(['site/index']); ?>">กลับไปหน้าแรก</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
