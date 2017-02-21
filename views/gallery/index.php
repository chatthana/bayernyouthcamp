<h1>Gallery Manager</h1>
<p>Please upload or update your gallery and images using the information below</p>
<div class="row">
  <div class="col-md-12">
    <div class="operations">
      <a href="<?php echo Yii::$app->urlManager->createUrl(['gallery/create']); ?>" class="btn btn-primary">Add new gallery</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table table-hover table-bordered table-stripped">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Remark</th>
        <th>Active</th>
        <th>Operation</th>
      </tr>
      <?php foreach ($galleries as $gallery): ?>
        <tr>
          <td><?php echo $gallery->id; ?></td>
          <td><?php echo $gallery->name; ?></td>
          <td><?php echo $gallery->remark; ?></td>
          <td><?php echo $gallery->active; ?></td>
          <td>
            <a href="<?php echo Yii::$app->urlManager->createUrl(['gallery/display', 'id' => $gallery->id]); ?>" class="fa fa-search"></a>
            <a href="#" class="fa fa-pencil"></a>
            <a href="#" class="fa fa-trash"></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
