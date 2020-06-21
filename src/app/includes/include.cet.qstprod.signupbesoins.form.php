<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/const/cet.qstprod.const.textes.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupbesoins.dto.php');
$neant = '';
$cetcal_session_id = htmlentities(htmlspecialchars($_GET['sitkn']));
session_id($cetcal_session_id);
session_start();
$currentForm = isset($_SESSION['signupbesoins.form.post']) ? $_SESSION['signupbesoins.form.post'] : array();
?>
<!-- singup besoins html form -->
<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <form class="form" method="post" action="/src/app/controller/cet.qstprod.controller.signupbesoins.form.php">
      <label for="cdc-signup-email">Veuillez répondre aux questions ci-dessous :
        <small class="form-text cet-qstprod-label-text" style="margin-top: 2px;">Cet annuaire garantie la confidentialité de vos données numériques.<br>
          <a href="#">Prendre connaissance de notre politique relative aux données numériques.</a>
        </small>
      </label>

      <!-- ------------------------- -->
      <!-- INPUTS formulaire START : ---
      <input class="form-control" id="qstprod-" name="qstprod-" type="text" placeholder="">
      ---- ------------------------- -->
      <label class="cet-formgroup-container-label"> 
        <small class="form-text">La Solidarité, quels sont vos engagements et vos attentes :</small>
      </label>
      <div class="cet-formgroup-container">
        <label>
          <small class="form-text cet-qstprod-label-text">Participez vous à un réseau de solidarité entre producteurs ?</small>
        </label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->solidaires_producteurs as $solprod): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= implode(';', $solprod); ?>" id="qstprod-besoins-solprod-<?= $counter; ?>" 
            name="qstprod-besoins-solsprods[]"
            <?= isset($currentForm['qstprod-besoins-solsprods']) && in_array(implode(';', $solprod), $currentForm['qstprod-besoins-solsprods']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-besoins-solprod-<?= $counter; ?>"><?= $solprod[1]; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-solprod-autre" name="qstprod-solprod-autre" type="text" 
            placeholder="Autre ? Merci de préciser"
            value="<?= isset($currentForm['qstprod-solprod-autre']) ? $currentForm['qstprod-solprod-autre'] : $neant; ?>"
            maxlength="128">
        </div>

        <br>
        <label>
          <small class="form-text cet-qstprod-label-text">Souhaiteriez vous participer à ce type d'actions ?</small>
        </label>
        <div class="input-group mb-3">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="qstprod-question-reseaux-participation-oui" 
              name="qstprod-question-reseaux-participation" value="oui" checked="checked">
            <label class="form-check-label" for="qstprod-question-reseaux-participation-oui">Oui, je souhaite participer à ce type d'actions</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="qstprod-question-reseaux-participation-non" 
              name="qstprod-question-reseaux-participation" value="non">
            <label class="form-check-label" for="qstprod-question-reseaux-participation-non">Non merci</label>
          </div>
        </div>
        <label>
          <small class="form-text cet-qstprod-label-text">Si oui, lesquelles vous semblent répondre à un de vos besoins ? (plusieurs choix possibles)</small>
        </label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->solidaires_actions as $action): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= implode(';', $action); ?>" id="qstprod-besoins-action-<?= $counter; ?>" 
            name="qstprod-besoins-actions[]"
            <?= isset($currentForm['qstprod-besoins-actions']) && in_array(implode(';', $action), $currentForm['qstprod-besoins-actions']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-besoins-action-<?= $counter; ?>"><?= $action[1]; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-action-autre" name="qstprod-action-autre" type="text" 
            placeholder="Autre ? Merci de préciser"
            value="<?= isset($currentForm['qstprod-action-autre']) ? $currentForm['qstprod-action-autre'] : $neant; ?>"
            maxlength="128">
        </div>
      </div>
    
      <label class="cet-formgroup-container-label"> 
        <small class="form-text">Seriez vous prêt à rejoindre un groupe de réflexion sur la résilience alimentaire ?</small>
      </label>
      <div class="cet-formgroup-container">
        <label>
          <small class="form-text cet-qstprod-label-text">Si oui, sur quels sujet ?</small>
        </label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->solidaires_groupe_resilience as $grouperes): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= implode(';', $grouperes); ?>" id="qstprod-besoins-grouperes-<?= $counter; ?>" 
            name="qstprod-besoins-groupesres[]"
            <?= isset($currentForm['qstprod-besoins-groupesres']) && in_array(implode(';', $grouperes), $currentForm['qstprod-besoins-groupesres']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-besoins-grouperes-<?= $counter; ?>"><?= $grouperes[1]; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-grouperes-autre" name="qstprod-grouperes-autre" type="text" 
            placeholder="Autre ? Merci de préciser"
            value="<?= isset($currentForm['qstprod-grouperes-autre']) ? $currentForm['qstprod-grouperes-autre'] : $neant; ?>"
            maxlength="128">
        </div>
      </div>
      <!-- ------------------------ -->
      <!-- INPUTS formulaire STOP : -->      
      <!-- ------------------------ -->

      <div class="row cet-qstprod-btnnav">
        <div class="col text-center">
          <button class="btn btn-info" type="submit" onmousedown="$('#qstprod-signupbesoins-nav').val('retour');"
            id="btn-signupbesoins.form-retour"><?= CetQstprodConstLibelles::form_retour; ?></button>
          <button class="btn btn-info" type="submit" onmousedown="$('#qstprod-signupbesoins-nav').val('valider');"
            id="btn-signupbesoins.form-valider"><?= CetQstprodConstLibelles::form_valider; ?></button>
        </div>
      </div>

      <input type="text" name="cetcal_session_id" id="cetcal_session_id" value="<?= $cetcal_session_id; ?>" hidden="hidden">
      <input type="text" name="qstprod-signupbesoins-nav" id="qstprod-signupbesoins-nav" value="unset" hidden="hidden">
    </form>
  </div>
</div>