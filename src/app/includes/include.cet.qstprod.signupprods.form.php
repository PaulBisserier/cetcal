<?php
// DTOs used here :
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupprods.dto.php');
// Prepare Session usage :
$neant = '';
$cetcal_session_id = htmlentities(htmlspecialchars($_GET['sitkn']));
session_id($cetcal_session_id);
session_start();
$currentForm = isset($_SESSION['signupprods.form.post']) ? $_SESSION['signupprods.form.post'] : array();
?>
<!-- singup produits html form -->
<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <form id="signupprods.form" class="form" method="post" 
      action="/src/app/controller/cet.qstprod.controller.signupprods.form.php"
      onload="setupRechercheProduit();">
      <label for="cdc-signup-email">Veuillez renseigner vos informations produits :
        <small class="form-text cet-qstprod-label-text" style="margin-top: 2px;">Cet annuaire garantie la confidentialité de vos données numériques.<br>
          <a href="#">Prendre connaissance de notre politique relative aux données numériques.</a>
        </small>
      </label>

      <!-- ------------------------- -->
      <!-- INPUTS formulaire START : ---
      <input class="form-control" id="qstprod-" name="qstprod-" type="text" placeholder="">
      ---- ------------------------- -->
      <br>
      <label class="cet-formgroup-container-label"><small class="form-text">Spécificités de vos produits, Label, type d'agriculture, etc :</small></label>
      <div class="cet-formgroup-container">
        <label><small class="form-text">Spécificités de vos produits, Label, type d'agriculture, etc. (plusieurs options possibles) :</small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->type_culture as $typeculture): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $typeculture; ?>" id="qstprod-typeculture-<?=$counter; ?>" 
            name="qstprod-typescultures[]"
            <?= isset($currentForm['qstprod-typescultures']) && in_array($typeculture, $currentForm['qstprod-typescultures']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-typeculture-<?= $counter; ?>"><?= $typeculture; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-typeculture-autre" name="qstprod-typeculture-autre" type="text" 
            placeholder="Quel autre spécificité, label ou type d'agriculture ?"
            value="<?= isset($currentForm['qstprod-typeculture-autre']) ? $currentForm['qstprod-typeculture-autre'] : $neant; ?>">
        </div>
      </div>

      <label class="cet-formgroup-container-label"><small class="form-text">Quels produits vendez-vous ?</small></label>
      <div class="cet-formgroup-container">        
        <label><small class="form-text">Quels <b>legumes</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_legumes as $pv4Legumes): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $pv4Legumes; ?>" id="qstprod-produit-legume-<?= $counter; ?>" 
            name="qstprod-produits-legumes[]"
            <?= isset($currentForm['qstprod-produits-legumes']) && in_array($pv4Legumes, $currentForm['qstprod-produits-legumes']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-legume-<?= $counter; ?>"><?= $pv4Legumes; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-legume-autre" name="qstprod-produit-legume-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-legume-autre']) ? $currentForm['qstprod-produit-legume-autre'] : $neant; ?>">
        </div>
        <br>
        <label><small class="form-text">Quels <b>viandes</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_viandes as $pv4viande): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $pv4viande; ?>" id="qstprod-produit-viande-<?= $counter; ?>" 
            name="qstprod-produits-viandes[]"
            <?= isset($currentForm['qstprod-produits-viandes']) && in_array($pv4viande, $currentForm['qstprod-produits-viandes']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-viande-<?= $counter; ?>"><?= $pv4viande; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-viande-autre" name="qstprod-produit-viande-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-viande-autre']) ? $currentForm['qstprod-produit-viande-autre'] : $neant; ?>">
        </div>
        <br>
        <label><small class="form-text">Quels <b>produits laitiers</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_laitiers as $pv4laitier): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $pv4laitier; ?>" id="qstprod-produit-laitier-<?= $counter; ?>" 
            name="qstprod-produits-laitiers[]"
            <?= isset($currentForm['qstprod-produits-laitiers']) && in_array($pv4laitier, $currentForm['qstprod-produits-laitiers']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-laitier-<?= $counter; ?>"><?= $pv4laitier; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-laitier-autre" name="qstprod-produit-laitier-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-laitier-autre']) ? $currentForm['qstprod-produit-laitier-autre'] : $neant; ?>">
        </div>
        <br>
        <label><small class="form-text">Quels <b>produits de la ruche</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_mielruche as $pv4mielruche): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $pv4mielruche; ?>" id="qstprod-produit-mielruche-<?= $counter; ?>" 
            name="qstprod-produits-mielsruches[]"
            <?= isset($currentForm['qstprod-produits-mielsruches']) && in_array($pv4mielruche, $currentForm['qstprod-produits-mielsruches']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-mielruche-<?= $counter; ?>"><?= $pv4mielruche; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-mielruche-autre" name="qstprod-produit-mielruche-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-mielruche-autre']) ? $currentForm['qstprod-produit-mielruche-autre'] : $neant; ?>">
        </div>
        <br>
        <label><small class="form-text">Quels <b>fruits</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_fruits as $fruit): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $fruit; ?>" id="qstprod-produit-fruit-<?= $counter; ?>" 
            name="qstprod-produits-fruits[]"
            <?= isset($currentForm['qstprod-produits-fruits']) && in_array($fruit, $currentForm['qstprod-produits-fruits']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-fruit-<?= $counter; ?>"><?= $fruit; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-fruit-autre" name="qstprod-produit-fruit-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-fruit-autre']) ? $currentForm['qstprod-produit-fruit-autre'] : $neant; ?>">
        </div>
        <br>
        <label><small class="form-text">Quels <b>champignons</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_champignons as $champignon): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $champignon; ?>" id="qstprod-produit-champignon-<?= $counter; ?>" 
            name="qstprod-produits-champignons[]"
            <?= isset($currentForm['qstprod-produits-champignons']) && in_array($champignon, $currentForm['qstprod-produits-champignons']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-champignon-<?= $counter; ?>"><?= $champignon; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-champignon-autre" name="qstprod-produit-champignon-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-champignon-autre']) ? $currentForm['qstprod-produit-champignon-autre'] : $neant; ?>">
        </div>
        <br>
        <label><small class="form-text">Quels <b>plantes</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_plantes as $plante): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $plante; ?>" id="qstprod-produit-plante-<?= $counter; ?>" 
            name="qstprod-produits-plantes[]"
            <?= isset($currentForm['qstprod-produits-plantes']) && in_array($plante, $currentForm['qstprod-produits-plantes']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-plante-<?= $counter; ?>"><?= $plante; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-plante-autre" name="qstprod-produit-plante-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-plante-autre']) ? $currentForm['qstprod-produit-plante-autre'] : $neant; ?>">
        </div>
        <br>
        <label><small class="form-text">Quels <b>plants et semences</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_semences as $semence): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $semence; ?>" id="qstprod-produit-semence-<?= $counter; ?>" 
            name="qstprod-produits-semences[]"
            <?= isset($currentForm['qstprod-produits-semences']) && in_array($semence, $currentForm['qstprod-produits-semences']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-semence-<?= $counter; ?>"><?= $semence; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-semence-autre" name="qstprod-produit-semence-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-semence-autre']) ? $currentForm['qstprod-produit-semence-autre'] : $neant; ?>">
        </div>
      </div>

      <label class="cet-formgroup-container-label"><small class="form-text">Quels autres produits vendez-vous ?</small></label>
      <div class="cet-formgroup-container">
        <label><small class="form-text">Quels <b>produits transformés</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_transformes as $transforme): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $transforme; ?>" id="qstprod-produit-transforme-<?= $counter; ?>" 
            name="qstprod-produits-transformes[]"
            <?= isset($currentForm['qstprod-produits-transformes']) && in_array($transforme, $currentForm['qstprod-produits-transformes']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-transforme-<?= $counter; ?>"><?= $transforme; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-transforme-autre" name="qstprod-produit-transforme-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-transforme-autre']) ? $currentForm['qstprod-produit-transforme-autre'] : $neant; ?>">
        </div>
        <br>
        <label><small class="form-text">Quels <b>céréales et dérivés/légumineuses</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_cereales as $cereale): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $cereale; ?>" id="qstprod-produit-cereale-<?= $counter; ?>" 
            name="qstprod-produits-cereales[]"
            <?= isset($currentForm['qstprod-produits-cereales']) && in_array($cereale, $currentForm['qstprod-produits-cereales']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-cereale-<?= $counter; ?>"><?= $cereale; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-cereale-autre" name="qstprod-produit-cereale-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-cereale-autre']) ? $currentForm['qstprod-produit-cereale-autre'] : $neant; ?>">
        </div>
        <br>
        <label><small class="form-text">Quels <b>produits d'hygiène</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_hygienes as $hygiene): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $hygiene; ?>" id="qstprod-produit-hygiene-<?= $counter; ?>" 
            name="qstprod-produits-hygienes[]"
            <?= isset($currentForm['qstprod-produits-hygienes']) && in_array($hygiene, $currentForm['qstprod-produits-hygienes']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-hygiene-<?= $counter; ?>"><?= $hygiene; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-hygiene-autre" name="qstprod-produit-hygiene-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-hygiene-autre']) ? $currentForm['qstprod-produit-hygiene-autre'] : $neant; ?>">
        </div>
        <br>
        <label><small class="form-text">Quels <b>produits d'entretien</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_entretiens as $entretien): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $entretien; ?>" id="qstprod-produit-entretien-<?= $counter; ?>" 
            name="qstprod-produits-entretiens[]"
            <?= isset($currentForm['qstprod-produits-entretiens']) && in_array($entretien, $currentForm['qstprod-produits-entretiens']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-entretien-<?= $counter; ?>"><?= $entretien; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-entretien-autre" name="qstprod-produit-entretien-autre" type="text"
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-entretien-autre']) ? $currentForm['qstprod-produit-entretien-autre'] : $neant; ?>">
        </div>
        <br>
        <label><small class="form-text">Quels <b>nourriture pour animaux</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_animaux as $animal): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $animal; ?>" id="qstprod-produit-animal-<?= $counter; ?>" 
            name="qstprod-produits-animaux[]"
            <?= isset($currentForm['qstprod-produits-animaux']) && in_array($animal, $currentForm['qstprod-produits-animaux']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-animal-<?= $counter; ?>"><?= $animal; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-animal-autre" name="qstprod-produit-animal-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-animal-autre']) ? $currentForm['qstprod-produit-animal-autre'] : $neant; ?>">
        </div>
        <br>
        <label><small class="form-text">Quel <b>autre produit</b> vendez-vous ? (si les réponses font défaut, merci de nous renseigner) : </small></label>
        <div class="form-group mb-3">
          <input class="form-control" id="qstprod-produit-autre-autre" 
            name="qstprod-produit-autre-autre" type="text" 
            placeholder="Dites-nous quel autre produit"
            value="<?= isset($currentForm['qstprod-produit-autre-autre']) ? $currentForm['qstprod-produit-autre-autre'] : $neant; ?>">
        </div>
      </div>

      <div class="row cet-qstprod-btnnav">
        <div class="col text-center">
          <button class="btn btn-info" type="submit" onmousedown="$('#qstprod-signupprods-nav').val('retour');"
            id="btn-signupprods.form-retour">Retour</button>
          <button class="btn btn-info" type="submit" onmousedown="$('#qstprod-signupprods-nav').val('valider');"
            id="btn-signupprods.form-valider">Valider ces informations</button>
        </div>
      </div>

      <input type="text" name="cetcal_session_id" id="cetcal_session_id" value="<?= $cetcal_session_id; ?>" hidden="hidden">
      <input type="text" name="qstprod-signupprods-nav" id="qstprod-signupprods-nav" value="unset" hidden="hidden">
      <input type="text" name="qstprod-signupprods-nav-pindex" id="qstprod-signupprods-nav-pindex" value="unset" hidden="hidden">
    </form>
  </div>
</div>
<script src="/src/scripts/js/cetcal/cetcal.min.signupprods.js"></script>