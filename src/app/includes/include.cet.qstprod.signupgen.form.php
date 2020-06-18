<?php
$neant = '';
$currentForm = [];
if (isset($_GET['sitkn']))
{
  $cetcal_session_id = htmlentities(htmlspecialchars($_GET['sitkn']));
  session_id($cetcal_session_id);
  session_start();
  $currentForm = (isset($_SESSION['signupgen.form']) && isset($_SESSION['signupgen.form.post'])) ? 
    $_SESSION['signupgen.form.post'] : array();
}
?>
<!-- singup general informations html form -->
<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <form id="signupgen.form" class="form" method="post" action="/src/app/controller/cet.qstprod.controller.signupgen.form.php">
      <label for="cdc-signup-email">Veuillez renseigner les information demandées ci-dessous :
        <small class="form-text cet-qstprod-label-text" style="margin-top: 2px;">Cet annuaire garantie la confidentialité de vos données numériques.<br>
          <a href="#">Prendre connaissance de notre politique relative aux données numériques.</a>
        </small>
      </label>

      <!-- ------------------------- -->
      <!-- INPUTS formulaire START : ---
      <input class="form-control" id="qstprod-" name="qstprod-" type="text" placeholder="">
      ---- ------------------------- -->
      <br>
      <label class="cet-formgroup-container-label"><small class="form-text">Informations générales :</small></label>
      <div class="cet-formgroup-container">
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Nom de famille :</small></label>
          <input class="form-control" id="qstprod-nom" name="qstprod-nom" type="text" placeholder="Nom de famille" maxlength="30"
            value="<?= isset($currentForm['qstprod-nom']) ? $currentForm['qstprod-nom'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Prénom :</small></label>
          <input class="form-control" id="qstprod-prenom" name="qstprod-prenom" type="text" placeholder="Prénom"
            value="<?= isset($currentForm['qstprod-prenom']) ? $currentForm['qstprod-prenom'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Adresse e-mail :</small></label>
          <input class="form-control" id="qstprod-email" name="qstprod-email" type="text" placeholder="Adresse e-mail"
            value="<?= isset($currentForm['qstprod-email']) ? $currentForm['qstprod-email'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Confirmation adresse e-mail :</small></label>
          <input class="form-control" id="qstprod-email-conf" name="qstprod-email-conf" type="text" placeholder="Confirmation adresse e-mail" 
            onblur="checkValidEmailConfirmation(60, 'qstprod-email', this.id);"
            value="<?= isset($currentForm['qstprod-email-conf']) ? $currentForm['qstprod-email-conf'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Mot de passe de connexion à l'annuaire (8 caractères minimum) :</small></label>
          <input class="form-control is-invalid" id="qstprod-mdp" name="qstprod-mdp" type="password" 
            placeholder="Mot de passe de connexion à l'annuaire"
            onblur="checkFormInputMin(30, 8, this.id);">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Confirmer votre mot de passe :</small></label>
          <input class="form-control is-invalid" id="qstprod-mdpconf" name="qstprod-mdpconf" 
            type="password" placeholder="Confirmer votre mot de passe"
            onblur="checkMotsDePasse(30, 8, 'qstprod-mdp', this.id);">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">N° de téléphone fixe :</small></label>
          <input class="form-control" id="qstprod-numbtel-fix" name="qstprod-numbtel-fix" type="text" 
            maxlength="10" placeholder="N° de téléphone fix."
            value="<?= isset($currentForm['qstprod-numbtel-fix']) ? $currentForm['qstprod-numbtel-fix'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">N° de téléphone mobile :</small></label>
          <input class="form-control" id="qstprod-numbtel-port" name="qstprod-numbtel-port" type="text" 
            maxlength="10" placeholder="N° de téléphone mobile."
            value="<?= isset($currentForm['qstprod-numbtel-port']) ? $currentForm['qstprod-numbtel-port'] : $neant; ?>">
        </div>
      </div>
      
      <label class="cet-formgroup-container-label" for="qstprod-nomferme"><small class="form-text">Renseignez vos informations d'adresse d'exploitation :</small></label>
      <div class="cet-formgroup-container">
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Nom commercial de la ferme :</small></label>
          <input class="form-control is-invalid" id="qstprod-nomferme" name="qstprod-nomferme" type="text" 
            placeholder="Nom commercial de la ferme" onblur="checkFormInput(60, this.id);"
            value="<?= isset($currentForm['qstprod-nomferme']) ? $currentForm['qstprod-nomferme'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">N° Siret de la ferme :</small></label>
          <input class="form-control is-invalid" id="qstprod-siret" name="qstprod-siret" type="text" maxlength="14" 
            minlength="14" placeholder="Siret" onblur="checkSiret(this.id);"
            value="<?= isset($currentForm['qstprod-siret']) ? $currentForm['qstprod-siret'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Numéro sur voirie de la ferme :</small></label>
          <input class="form-control" id="qstprod-numvoie" name="qstprod-numvoie" type="text" 
            placeholder="Numéro sur voirie"
            value="<?= isset($currentForm['qstprod-numvoie']) ? $currentForm['qstprod-numvoie'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Nom de la rue, chemin, avenue... :</small></label>
          <input class="form-control" id="qstprod-rue" name="qstprod-rue" type="text" 
            placeholder="Nom de la rue, chemin, avenue..."
            value="<?= isset($currentForm['qstprod-rue']) ? $currentForm['qstprod-rue'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Lieu dit :</small></label>
          <input class="form-control" id="qstprod-lieudit" name="qstprod-lieudit" type="text" placeholder="Lieu dit"
            value="<?= isset($currentForm['qstprod-lieudit']) ? $currentForm['qstprod-lieudit'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Commune de la ferme :</small></label>
          <input class="form-control is-invalid" id="qstprod-commune" name="qstprod-commune" type="text" placeholder="Commune"
            onblur="checkFormInput(60, this.id);"
            value="<?= isset($currentForm['qstprod-commune']) ? $currentForm['qstprod-commune'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Code postal :</small></label>
          <input class="form-control is-invalid" id="qstprod-cp" name="qstprod-cp" type="text" maxlength="5" placeholder="Code postal"
            onblur="checkFormInputInteger(9, 4, this.id);"
            value="<?= isset($currentForm['qstprod-cp']) ? $currentForm['qstprod-cp'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">  
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Complément d'adresse :</small></label>
          <input class="form-control" id="qstprod-cmpladrs" name="qstprod-cmpladrs" type="text" 
            placeholder="Complément d'adresse"
            value="<?= isset($currentForm['qstprod-cmpladrs']) ? $currentForm['qstprod-cmpladrs'] : $neant; ?>">
        </div>
      </div>

      <label class="cet-formgroup-container-label"><small class="form-text">Cagette.net :</small></label> 
      <div class="cet-formgroup-container">
        <div class="form-group mb-3"> 
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Quel est votre groupe cagette ?</small></label>
          <input class="form-control" id="qstprod-cagette" name="qstprod-cagette" type="text" 
            placeholder="Indiquer votre groupe cagette"
            value="<?= isset($currentForm['qstprod-cagette']) ? $currentForm['qstprod-cagette'] : $neant; ?>">
        </div>
      </div>

      <label class="cet-formgroup-container-label" for="qstprod-www"><small class="form-text">Informations web et réseaux sociaux :</small></label> 
      <div class="cet-formgroup-container">
        <div class="form-group mb-3"> 
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Page Facebook de la ferme :</small></label>
          <input class="form-control" id="qstprod-fb" name="qstprod-fb" type="text" 
            placeholder="Page Facebook de la ferme (si existant)"
            value="<?= isset($currentForm['qstprod-fb']) ? $currentForm['qstprod-fb'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">   
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Page Instagram de la ferme :</small></label>
          <input class="form-control" id="qstprod-ig" name="qstprod-ig" type="text" 
            placeholder="Page Instagram de la ferme (si existant)"
            value="<?= isset($currentForm['qstprod-ig']) ? $currentForm['qstprod-ig'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Compte Twitter de la ferme :</small></label>   
          <input class="form-control" id="qstprod-twitter" name="qstprod-twitter" type="text" 
            placeholder="Compte Twitter de la ferme (si existant)"
            value="<?= isset($currentForm['qstprod-twitter']) ? $currentForm['qstprod-twitter'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Site internet de votre exploitation :</small></label>
          <input class="form-control" id="qstprod-www" name="qstprod-www" type="text" 
            placeholder="Site internet de votre exploitation (si existant)"
            value="<?= isset($currentForm['qstprod-www']) ? $currentForm['qstprod-www'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Adresse web de votre boutique ligne :</small></label>
          <input class="form-control" id="qstprod-adrwebboutiqueenligne" name="qstprod-adrwebboutiqueenligne" 
            type="text" placeholder="Adresse web de boutique en ligne"
            value="<?= isset($currentForm['qstprod-adrwebboutiqueenligne']) ? $currentForm['qstprod-adrwebboutiqueenligne'] : $neant; ?>">
        </div>
      </div>

      <label class="cet-formgroup-container-label"><small class="form-text">Activité de production :</small></label>
      <div class="cet-formgroup-container">
        <div class="form-group mb-3"> 
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Organisme certificateur BIO :</small></label>
          <input class="form-control" id="qstprod-orgcertifbio" name="qstprod-orgcertifbio" type="text" 
            placeholder="Organisme certificateur BIO"
            value="<?= isset($currentForm['qstprod-orgcertifbio']) ? $currentForm['qstprod-orgcertifbio'] : $neant; ?>">
        </div>
        <label><small class="form-text">Concernant votre activité de production ? (plusieurs options possibles)</small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->activites as $activite): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $activite; ?>" id="qstprod-besoins-activite-<?= $counter; ?>" 
            name="qstprod-besoins-activites[]"
            <?= isset($currentForm['qstprod-besoins-activites']) && in_array($activite, $currentForm['qstprod-besoins-activites']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-besoins-activite-<?= $counter; ?>"><?= $activite; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <br>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Superficie cultivée plein champ en <b>hectares</b> :</small></label>
          <input class="form-control" id="qstprod-surfacepc" name="qstprod-surfacepc" type="number" min="0.01"
            step="0.01" placeholder="Superficie cultivée plein champ en hectares"
            value="<?= isset($currentForm['qstprod-surfacepc']) ? $currentForm['qstprod-surfacepc'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Superficie de culture serre en <b>ares</b> :</small></label>
          <input class="form-control" id="qstprod-supserre" name="qstprod-supserre" type="number" min="0.01"
            step="0.01" placeholder="Superficie de culture serre en ares"
            value="<?= isset($currentForm['qstprod-supserre']) ? $currentForm['qstprod-supserre'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si bétail, le nombres de têtes :</small></label>
          <input class="form-control" id="qstprod-nbrtetes" name="qstprod-nbrtetes" type="number" min="1"
            step="1" placeholder="Nombres de têtes"
            value="<?= isset($currentForm['qstprod-nbrtetes']) ? $currentForm['qstprod-nbrtetes'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Pour bière, lait ou vins, hectolitres / an :</small></label>
          <input class="form-control" id="qstprod-hectolitresparan" name="qstprod-hectolitresparan" type="number" min="0.1"
            step="0.1" placeholder="Hectolitres / an"
            value="<?= isset($currentForm['qstprod-hectolitresparan']) ? $currentForm['qstprod-hectolitresparan'] : $neant; ?>">
        </div>
      </div>

      <label class="cet-formgroup-container-label"><small class="form-text">Sondage :</small></label>
      <div class="cet-formgroup-container">
        <label><small class="form-text">Quels sont vos besoins et difficultés ?</small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->sondage_difficultes as $sondagedifficulte): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $sondagedifficulte; ?>" id="qstprod-sondagedifficulte-<?= $counter; ?>" 
            name="qstprod-sondagedifficultes[]"
            <?= isset($currentForm['qstprod-sondagedifficultes']) && in_array($sondagedifficulte, $currentForm['qstprod-sondagedifficultes']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-sondagedifficulte-<?= $counter; ?>"><?= $sondagedifficulte; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>

        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->sondage_divers as $divers): ?>
        <?php for ($i=0; $i < count($divers) - 1; $i++): ?>
          <?php if ($i == 0): ?>
            <br>
            <label><small class="form-text"><?= $divers[$i]; ?></small></label>
          <?php endif; ?>
          <?php if ($i > 0): ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?= $divers[$i]; ?>" id="qstprod-sondage-<?= ++$counter; ?>" 
                name="qstprod-sondage[]"
                <?= isset($currentForm['qstprod-sondage']) && in_array($divers[$i], $currentForm['qstprod-sondage']) ? 
              'checked="checked"' : $neant; ?>>
              <label class="form-check-label cet-qstprod-label-text" for="qstprod-sondage-<?= $counter; ?>"><?= $divers[$i]; ?></label>
            </div>
            <?php ++$counter; ?>
          <?php endif; ?>
        <?php endfor; ?>
        <?php endforeach; ?>
      </div>
      <!-- ------------------------ -->
      <!-- INPUTS formulaire STOP : -->      
      <!-- ------------------------ -->

      <div class="row cet-qstprod-btnnav">
        <div class="col text-center">
          <button class="btn btn-info" type="submit" onmousedown="$('#qstprod-signupgen-nav').val('retour');"
            id="btn-signupgen-form-retour">Retour accueil</button>
          <button class="btn btn-info" type="submit" id="btn-signupgen-form-valider" onmousedown="$('#qstprod-signupgen-nav').val('valider');">Valider ces informations</button>
        </div>
      </div>

      <input type="text" name="qstprod-signupgen-nav" id="qstprod-signupgen-nav" value="unset" hidden="hidden">
    </form>
  </div>
</div>
<script src="/src/scripts/js/cetcal/cetcal.min.signupgen.js"></script>