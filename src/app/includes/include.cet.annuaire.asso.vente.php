<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/cet.annuaire.entites.model.php');
$model = new CETCALEntitesModel();
$data = $model->selectAll();
$counter = 0; $newRow = false;
?>

<?php foreach ($data as $row): ?>
<?php ++$counter; ?>
<?php if ($counter === 1): ?> 
  <div class="row justify-content-lg-center" style="margin-bottom: 8px;">
<?php endif; ?>
    <div class="col-md-3">
      <div class="card border-success cet-carte-info">
        <div class="card-header text-white bg-success"><?= $row['denomination']; ?></div>
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted"><?= $row['territoire']; ?></h6>
          <p class="card-text"><?= $row['activite']; ?> <?= $row['specificites']; ?></p>
          <p class="card-text"><?= $row['adresse']; ?></p>
          <?php if (isset($row['infoscmd']) && !empty($row['infoscmd'])): ?>
            <p class="card-text"><i class="fa fa-info-circle" aria-hidden="true"></i> <?= $row['infoscmd']; ?></p>
          <?php endif; ?>
          <?php if (isset($row['jourhoraire']) && !empty($row['jourhoraire'])): ?>
            <p class="card-text">Jours/Horaires : <?= $row['jourhoraire']; ?></p>
          <?php endif; ?>
        </div>
        <ul class="list-group list-group-flush border-success">
          <?php if (isset($row['email']) && !empty($row['email'])): ?> 
            <li class="list-group-item border-success">
              <?php foreach (splitData("#", $row['email']) as $value): ?>
                <a href="#" class="card-link">
                  <email class="cet-email-tag"><?= $value; ?></email>
                </a>
              <?php endforeach; ?>
            </li>
          <?php endif; ?>
          <?php if (isset($row['tels']) && !empty($row['tels'])): ?> 
            <li class="list-group-item border-success">
              <?php foreach (splitData("#", $row['tels']) as $value): ?>
                <a href="tel:<?= $value; ?>" class="card-link">
                  <?= $value; ?>
                </a>
              <?php endforeach; ?>
            </li>
          <?php endif; ?>
          <?php if (isset($row['urlwww']) && !empty($row['urlwww'])): ?> 
            <li class="list-group-item border-success">
              <?php foreach (splitData("#", $row['urlwww']) as $value): ?>
                <a href="<?= $value; ?>" class="card-link" target="_blank">
                  <?= $value; ?>
                </a>
              <?php endforeach; ?>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
<?php if ($counter === 3): ?>
  </div>
  <?php $counter = 0; ?>
<?php endif; ?>
<?php endforeach; ?>

<?php 
function splitData($spliter, $data)
{
  $res = array();
  if (!strpos($data, $spliter)) array_push($res, $data);
  else $res = explode($spliter, $data);
  return $res;
}
?>