<?php
$cetcal_session_id = htmlentities(htmlspecialchars($_GET['sitkn']));
session_id($cetcal_session_id);
session_start();
$currentForm = isset($_SESSION['signuplieuxdist.form.post']) ? $_SESSION['signuplieuxdist.form.post'] : array();
$neant = '';
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signuplieuxdist.dto.php');
?>
<!-- singup lieux de distribution informations html form -->
<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <form id="signuplieuxdist.form" class="form" method="post" 
      action="/src/app/controller/cet.qstprod.controller.signuplieuxdist.form.php">
      <label for="cdc-signup-email">Veuillez renseigner vos lieux de distribution / vente :
        <small class="form-text cet-qstprod-label-text" style="margin-top: 2px;">Cet annuaire garantie la confidentialité de vos données numériques.<br>
          <a href="#">Prendre connaissance de notre politique relative aux données numériques.</a>
        </small>
      </label>

      <!-- ------------------------- -->
      <!-- INPUTS formulaire START : ---
      <input class="form-control" id="qstprod-" name="qstprod-" type="text" placeholder="">
      ---- ------------------------- -->
      <br>
      <label class="cet-formgroup-container-label"><small class="form-text">Renseignez un lieux de distribution ou de vente :</small></label>
      <div class="cet-formgroup-container">
        <label><small class="form-text">Vos activités de distribution / vente (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->points_vente_producteurs as $pdv): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= implode(';', $pdv); ?>" id="qstprod-pdv-<?= $counter; ?>" 
            name="qstprod-pdv[]"
            <?= isset($currentForm['qstprod-pdv']) && in_array(implode(';', $pdv), $currentForm['qstprod-pdv']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-pdv-<?= $counter; ?>"><?= $pdv[1]; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>

        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-pdvautre" name="qstprod-pdvautre" type="text" 
            placeholder="Point de distribution ou vente autre"
            value="<?= isset($currentForm['qstprod-pdvautre']) ? $currentForm['qstprod-pdvautre'] : $neant; ?>"
            maxlength="128">
        </div>
      </div>

      <div class="row cet-qstprod-btnnav">
        <div class="col text-center">
          <button class="btn btn-info" type="submit" 
            onmousedown="$('#qstprod-signuplieuxdist-nav').val('retour');" 
            id="btn-signuplieuxdist.form-retour"><?= CetQstprodConstLibelles::form_retour; ?></button>
          <button class="btn btn-info" type="submit" 
            onmousedown="$('#qstprod-signuplieuxdist-nav').val('valider');"
            id="btn-signuplieuxdist.form-valider"><?= CetQstprodConstLibelles::form_valider; ?></button>
        </div>
      </div>

      <input type="text" name="cetcal_session_id" id="cetcal_session_id" value="<?= $cetcal_session_id; ?>" hidden="hidden">
      <input type="text" name="qstprod-signuplieuxdist-nav" id="qstprod-signuplieuxdist-nav" value="unset" hidden="hidden">
    </form>
  </div>
</div>