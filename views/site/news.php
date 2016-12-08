<?php
use app\components\ThaiDateHelper;
?>
<section id="news-and-updates">
  <div class="wrapper">
    <h1>สนามคัดเลือก</h1>
    <div class="region-container">
        <?php foreach ($regions as $region): ?>
          <div class="each-region">
            <h3><?php echo $region->name; ?></h3>
            <?php foreach ($region->arenas as $arena): ?>
              <div class="each-arena">
                <p><?php echo ThaiDateHelper::getThaiDate($arena->reg_date); ?></p>
                <p><?php echo $arena->text; ?></p>
                <p> (สมัครภายในวันที่ <?php echo ThaiDateHelper::getThaiDate($arena->last_reg_date); ?>)</p>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
