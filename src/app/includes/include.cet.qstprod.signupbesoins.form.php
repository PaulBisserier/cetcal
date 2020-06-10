<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/const/cet.qstprod.const.textes.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupbesoins.dto.php');
$cetcal_session_id = htmlentities(htmlspecialchars($_GET['sitkn']));
session_id($cetcal_session_id);
session_start();
?>
<!-- singup besoins html form -->
<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <p><?= CetQstprodConstTextes::bouchon ?></p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</div>

<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <form class="form" method="post" action="/src/app/controller/cet.qstprod.controller.signupbesoins.form.php">
      <label for="cdc-signup-email"> - Veuillez répondre aux questions ci-dessous :
        <small class="form-text cet-qstprod-label-text" style="margin-top: 2px;">Cet annuaire garantie la confidentialité de vos données numériques.<br>
          <a href="#">Prendre connaissance de notre politique relative aux données numériques.</a>
        </small>
      </label>

      <!-- ------------------------- -->
      <!-- INPUTS formulaire START : ---
      <input class="form-control" id="qstprod-" name="qstprod-" type="text" placeholder="">
      ---- ------------------------- -->
      <label class="cet-formgroup-container-label"><small class="form-text">Quels sont vos spécificités (Label, type d'agriculture)</small></label>
      <div class="cet-formgroup-container">
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->type_culture as $culture) : ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $culture; ?>" id="qstprod-produit-typeculture-<?= $counter; ?>" name="qstprod-produit-typeculture[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-typeculture-<?= $counter; ?>"><?= $culture; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
      </div>

      <label class="cet-formgroup-container-label"><small class="form-text">Quels sont vos points de distribution ou de vente :</small></label>
      <div class="cet-formgroup-container">
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->points_vente_producteurs as $pointvente) : ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $pointvente; ?>" id="qstprod-pointdevente-<?= $counter; ?>" name="qstprod-pointsdevente[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-pointsdevente-<?= $counter; ?>"><?= $pointvente; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
      </div>

      <label class="cet-formgroup-container-label"><small class="form-text">Quelles seraient vos besoins par rapport à un annuaire hébergé par une plateforme informatique ?</small></label>
      <div class="cet-formgroup-container">
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->besoins as $besoin): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="qstprod-besoins-<?= $counter; ?>" name="qstprod-besoins-<?= $counter; ?>">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-besoins-<?= $counter; ?>"><?= $besoin; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <br>
        <label class="cet-formgroup-container-label" for="qstprod-qstbesoinlibre"> 
          <small class="form-text">Un besoin n'est pas présent dans la liste ci-dessus ?</small>
        </label>
        <div class="form-group mb-3"> 
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Exprimez-vous sur vos attentes ! :</small></label>
          <textarea class="form-control" id="qstprod-qstbesoinlibre" name="qstprod-qstbesoinlibre" rows="3" placeholder="Exprimez-vous !"></textarea>
        </div>
      </div>

      <label class="cet-formgroup-container-label"> 
        <small class="form-text">Participez vous à un ou des réseau(x) de solidarité ?</small>
      </label>
      <div class="cet-formgroup-container">
        <label>
          <small class="form-text cet-qstprod-label-text">Participez vous à un réseau associatif et/ou de solidarité <b>producteur</b> ?<br>Si oui, lesquels ?</small>
        </label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->solidaires_producteurs as $solprod): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $solprod; ?>" id="qstprod-besoins-solprod-<?= $counter; ?>" name="qstprod-besoins-solsprods[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-besoins-solprod-<?= $counter; ?>"><?= $solprod; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <br>
        <label>
          <small class="form-text cet-qstprod-label-text">Participez vous à un réseau associatif et/ou de solidarité <b>avec les consomateurs</b> ?<br>Si oui, lesquels ?</small>
        </label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->solidaires_consomateurs as $solcons): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $solcons; ?>" id="qstprod-besoins-solcons-<?= $counter; ?>" name="qstprod-besoins-solscons[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-besoins-solcons-<?= $counter; ?>"><?= $solcons; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <br>
        <label>
          <small class="form-text cet-qstprod-label-text">Si aucun choix ne correspond, souhaiteriez-vous participer à ce type d'actions ?</small>
        </label>
        <div class="input-group mb-3">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="qstprod-question-reseaux-participation-oui" 
              name="qstprod-question-reseaux-participation" value="oui">
            <label class="form-check-label" for="qstprod-question-reseaux-participation-oui">Oui, je souhaite participer à ce type d'actions</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="qstprod-question-reseaux-participation-non" 
              name="qstprod-question-reseaux-participation" value="non">
            <label class="form-check-label" for="qstprod-question-reseaux-participation-non">Non merci</label>
          </div>
        </div>
      </div>
    

      <label class="cet-formgroup-container-label"> 
        <small class="form-text">Seriez vous prêt à rejoindre un groupe de réflexion sur la résilience alimentaire ?</small>
      </label>
      <div class="cet-formgroup-container">
        <label>
          <small class="form-text cet-qstprod-label-text">Si oui, sur quels sujet ?</small>
        </label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="1" id="qstprod-groupe-reflexion-1" name="qstprod-groupes-reflexion[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-groupe-reflexion-1">
            Une journée de réflexion partage avec des producteurs (exemples de thèmes: la gestion du foncier, les transmissions d'exploitation, diversification de production, reconversion, ...).
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="2" id="qstprod-groupe-reflexion-2" name="qstprod-groupes-reflexion[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-groupe-reflexion-2">
            Une journée de réflexion partage avec d'autres acteurs : restauration collective, transformateurs, association consommateurs , .... 
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="3" id="qstprod-groupe-reflexion-3" name="qstprod-groupes-reflexion[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-groupe-reflexion-3">
            Une journée de réflexion partage avec les élus et organisations professionnelle locales : ...
          </label>
        </div>
      </div>
      <!-- ------------------------ -->
      <!-- INPUTS formulaire STOP : -->      
      <!-- ------------------------ -->

      <div class="row cet-qstprod-btnnav">
        <div class="col text-center">
          <button class="btn btn-primary" type="submit" onmousedown="$('#qstprod-signupbesoins-nav').val('retour');">Retour</button>
          <button class="btn btn-primary" type="submit" onmousedown="$('#qstprod-signupbesoins-nav').val('valider');">Valider ces informations</button>
        </div>
      </div>

      <input type="text" name="cetcal_session_id" id="cetcal_session_id" value="<?= $cetcal_session_id; ?>" hidden="hidden">
      <input type="text" name="qstprod-signupbesoins-nav" id="qstprod-signupbesoins-nav" value="unset" hidden="hidden">
    </form>
  </div>
</div>