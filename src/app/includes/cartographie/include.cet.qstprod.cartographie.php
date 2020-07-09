<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/controller/cet.qstprod.controller.cartographie.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/cet.qstprod.producteurs.model.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.sessionshelper.php');
$sessionshelper = new SessionHelper($_SERVER['DOCUMENT_ROOT']);
$controller = new CETCALCartographieController();
$data = $controller->fetchDataCartographie();
?>
<div class="cet-module row justify-content-lg-center" style="margin-bottom: 12px;">
  <div class="col-lg-6"> 
    <div id="mapid"></div>
  </div>
</div>
<?php if (!$dynamic_cet_crt): ?>
  <div id="cetcal.producteur.xml" hidden="hidden">
    <?php include $_SERVER['DOCUMENT_ROOT'].'/res/data/datafiles/cartographie/include.cet.annuaire.crt.dataset.xml'; ?>
  </div>
<?php elseif ($dynamic_cet_crt): ?>
  <div id="cetcal.producteur.xml" hidden="hidden">
    <producteurs hidden="hidden">
      <?php foreach ($data as $prdDto): ?>
        <producteur>
          <pk><?= $prdDto->getPk(); ?></pk>
          <nom><?= $prdDto->nom; ?></nom>
          <prenom><?= $prdDto->prenom; ?></prenom>
          <email><?= $prdDto->email; ?></email>
          <?php
            $adr = str_replace("  ", " ", $prdDto->adrNumvoie.' '.$prdDto->adrRue.' '.$prdDto->adrLieudit.' '.$prdDto->adrCommune.' '.$prdDto->adrCodePostal.' '.$prdDto->adrComplementAdr);
            $adrcrt = str_replace(" ", "%20", $adr);
          ?>
          <addresscrt><?= $adrcrt; ?></addresscrt>
          <address><?= $adr; ?></address>
          <nomferme><?= $prdDto->nomferme; ?></nomferme>
          <urlfb><?= $prdDto->pageFB; ?></urlfb>
          <urlig><?= $prdDto->pageIG; ?></urlig>
          <grpcagette><?= $prdDto->groupeCagette; ?></grpcagette>
          <urltwitter><?= $prdDto->pageTwitter; ?></urltwitter>
          <urlwww><?= $prdDto->siteWebUrl; ?></urlwww>
          <urlboutique><?= $prdDto->boutiqueEnLigneUrl; ?></urlboutique>
          <telfixe><?= $prdDto->telfix; ?></telfixe>
          <telport><?= $prdDto->telport; ?></telport>
        </producteur>
      <?php endforeach; ?>
    </producteurs>
  </div>
<?php endif; ?>

<script src="/src/scripts/js/cetcal/cetcal.cartographie.min.js"></script>