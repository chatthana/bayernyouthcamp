<?php
/* @var $this yii\web\View */
?>

<div style="position:relative; text-align:center;">
  <img src="<?php echo Yii::getAlias('@web'); ?>/images/stbheader.png" alt="" />
</div>

<h1 style="margin-top:40px;">ระบบบริหารผู้สมัคร</h1>

<p>
    ยินดีต้อนรับสู่ระบบริหารจัดการผู้ใช้ ในโครงการ BAYERN FC YOUTH CUP 2017
</p>

<p>
  ระบบดังกล่าวจัดทำขึ้นเพื่อใช้บริหารผู้สมัครและทีมต่างๆในโครงการ FC Bayern Youth Cup 2017
  โดยระบบหลังบ้านนี้จะถูกแบ่งเป็นส่วนๆในการใช้งานเพื่อให้ง่ายต่อการเข้าถึง
</p>

<h1>วิธีการใช้งานเบื้องต้น</h1>
<ul>
  <li>ให้ผู้ใช้ทำการล๊อกอินเข้าสู่ระบบหลังบ้านโดยใช้ username - password ที่ทางทีมงานได้จัดทำให้</li>
  <li>
    แถบเมนูด้านบนจะแสดงให้เห็นถึงเมนูส่วนต่างๆที่ผู้ดูแลระบบสามารถเลือกดูข้อมูลได้ โดยจะแบ่งออกเป็นสามส่วนคือ Player คือส่วนของผู้เล่นทั้งหมดไม่ว่าจะสมัครแบบ
    ทีมหรือแบบรายบุคคล จุดสังเกตคือ หากผู้เล่นสมัครแบบทีมนั้น คอลัมน์ virtual_team จะปรากฏเป็นเลขประจำทีม ซึ่งผู้เล่นทั้ง 7 คนในทีมจะมีหมายเลขเดียวกัน ดังนั้น
    หมายเลขดังกล่าวสามารนำไปใช้ตรวจสอบการสมัครแบบรายทีมได้ทันที ส่วนในกรณีที่ผู้สมัครทำการสมัครแบบรายบุคคลมานั้น คอลัมน์ดังกล่าวจะปรากฏเป็น (not set) ในส่วน
    ของ Team คือตรวจสอบรายชื่อทีมทั้งหมดที่มีการสมัครมา และส่วนของ Coach คือรายชื่อโค้ชทั้งหมดที่สมัครร่วมโครงการ โดยโค้ชทุกคนต้องมีเลขทีมเดียวกับลูกทีมทั้ง 7
  </li>
  <li>
    ข้อมูลสนามสามารถทำการเปลี่ยนแปลงได้โดยดูที่แถวขวาสุดในตารางสนาม ให้คลิกที่รูปดินสอเพื่อทำการเปลี่ยนแปลงข้อมูลใดๆที่เกี่ยวข้องกับสนามนั้นๆ โดยการเปลี่ยนแปลงใดๆ ในหัวข้อนี้จะส่งผลต่อสนามที่
    ให้ผู้ใช้ได้เลือกในขั้นตอนการสมัคร
  </li>
</ul>
