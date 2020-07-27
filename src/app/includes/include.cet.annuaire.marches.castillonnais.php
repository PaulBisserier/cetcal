<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.httpdataprocessor.php');
$dataProcessor = new HTTPDataProcessor();
$filtre = isset($_GET['q']) ? $dataProcessor->processHttpFormData($_GET['q']) : false; 
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/controller/cet.annuaire.controller.marches.castillonnais.php');
$ctrl = new MarchesCastillonnaisController();
$data = !$filtre ? $ctrl->init() : $ctrl->loadQuery($filtre);
$resultNull = is_array($data) && count($data) === 0;
$counter = 0;
?>

<div style="margin-bottom: 60px; margin-top: 30px;">
  <?php foreach ($data as $row): ?>
  <?php ++$counter; ?>
  <?php if ($counter === 1): ?> 
    <div class="row justify-content-lg-center" style="margin-bottom: 8px;">
  <?php endif; ?>
      <div class="col-md-3">
        <div class="card border-warning cet-carte-info">
          <div class="card-header text-white border-warning"><?= $row['denomination']; ?></div>
          <div class="card-body">
            <p class="card-text"><span class="text-muted">Jours/horaires : </span><br><?= $row['jourhoraire']; ?></p>
            <p class="card-text"><span class="text-muted">Pour s'y rendre : </span><br><a href="#"><?= $row['adresse']; ?></a></p>
          </div>
        </div>
      </div>
  <?php if ($counter === 3): ?>
    </div>
    <?php $counter = 0; ?>
  <?php endif; ?>
  <?php endforeach; ?>
  <?php if ($counter !== 3): // close div if it hasn't been done in loop. ?>
    </div>
  <?php endif; ?>
</div>