<?php
// DTOs used here :
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupprods.dto.php');
// Prepare Session usage :
$cetcal_session_id = htmlentities(htmlspecialchars($_GET['sitkn']));
session_id($cetcal_session_id);
session_start();
$produits = isset($_SESSION['signupprods.form']) ? unserialize($_SESSION['signupprods.form']) : NULL; 
$recapProduitsDisplay = ($produits === NULL || count($produits) === 0) ? 'none' : 'block';
?>
<!-- singup produits html form -->
<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <p></p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</div>

<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <form id="signupprods.form" class="form" method="post" 
      action="/src/app/controller/cet.qstprod.controller.signupprods.form.php"
      onload="setupRechercheProduit();">
      <label for="cdc-signup-email"> - Veuillez renseigner vos informations produits :
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
          <input class="form-check-input" type="checkbox" value="<?= $typeculture; ?>" id="qstprod-typeculture-<?= $counter; ?>" name="qstprod-typescultures[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-typeculture-<?= $counter; ?>"><?= $typeculture; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-typeculture-autre" name="qstprod-typeculture-autre" type="text" placeholder="Quel autre spécificité, label ou type d'agriculture ?">
        </div>
      </div>

      <label class="cet-formgroup-container-label"><small class="form-text">Quels produits vendez-vous ?</small></label>
      <div class="cet-formgroup-container">        
        <label><small class="form-text">Quels <b>legumes</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_legumes as $pv4Legumes): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $pv4Legumes; ?>" id="qstprod-produit-legume-<?= $counter; ?>" name="qstprod-produits-legumes[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-legume-<?= $counter; ?>"><?= $pv4Legumes; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-legume-autre" name="qstprod-produit-legume-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div>
        <br>
        <label><small class="form-text">Quels <b>viandes</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_viandes as $pv4viande): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $pv4viande; ?>" id="qstprod-produit-viande-<?= $counter; ?>" name="qstprod-produits-viandes[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-viande-<?= $counter; ?>"><?= $pv4viande; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-viande-autre" name="qstprod-produit-viande-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div>
        <br>
        <label><small class="form-text">Quels <b>produits laitiers</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_laitiers as $pv4laitier): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $pv4laitier; ?>" id="qstprod-produit-laitier-<?= $counter; ?>" name="qstprod-produits-laitiers[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-laitier-<?= $counter; ?>"><?= $pv4laitier; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-laitier-autre" name="qstprod-produit-laitier-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div>
        <br>
        <label><small class="form-text">Quels <b>produits de la ruche</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_mielruche as $pv4mielruche): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $pv4mielruche; ?>" id="qstprod-produit-mielruche-<?= $counter; ?>" name="qstprod-produits-mielsruches[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-mielruche-<?= $counter; ?>"><?= $pv4mielruche; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-mielruche-autre" name="qstprod-produit-mielruche-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div>
        <br>
        <label><small class="form-text">Quels <b>fruits</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_fruits as $fruit): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $fruit; ?>" id="qstprod-produit-fruit-<?= $counter; ?>" name="qstprod-produits-fruits[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-fruit-<?= $counter; ?>"><?= $fruit; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-fruit-autre" name="qstprod-produit-fruit-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div>
        <br>
        <label><small class="form-text">Quels <b>champignons</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_champignons as $champignon): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $champignon; ?>" id="qstprod-produit-champignon-<?= $counter; ?>" name="qstprod-produits-champignons[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-champignon-<?= $counter; ?>"><?= $champignon; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-champignon-autre" name="qstprod-produit-champignon-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div>
        <br>
        <label><small class="form-text">Quels <b>plantes</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_plantes as $plante): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $plante; ?>" id="qstprod-produit-plante-<?= $counter; ?>" name="qstprod-produits-plantes[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-plante-<?= $counter; ?>"><?= $plante; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-plante-autre" name="qstprod-produit-plante-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div>
        <br>
        <label><small class="form-text">Quels <b>plants et semences</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_semences as $semence): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $semence; ?>" id="qstprod-produit-semence-<?= $counter; ?>" name="qstprod-produits-semences[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-semence-<?= $counter; ?>"><?= $semence; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-semence-autre" name="qstprod-produit-semence-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div>
      </div>

      <label class="cet-formgroup-container-label"><small class="form-text">Quels autres produits vendez-vous ?</small></label>
      <div class="cet-formgroup-container">

        <label><small class="form-text">Quels <b>produits transformés</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_transformes as $transforme): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $transforme; ?>" id="qstprod-produit-transforme-<?= $counter; ?>" name="qstprod-produits-transformes[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-transforme-<?= $counter; ?>"><?= $transforme; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-transforme-autre" name="qstprod-produit-transforme-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div> 

        <br>
        <label><small class="form-text">Quels <b>céréales et dérivés/légumineuses</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_cereales as $cereale): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $cereale; ?>" id="qstprod-produit-cereale-<?= $counter; ?>" name="qstprod-produits-cereales[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-cereale-<?= $counter; ?>"><?= $cereale; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-cereale-autre" name="qstprod-produit-cereale-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div> 

        <br>
        <label><small class="form-text">Quels <b>produits d'hygiène</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_hygienes as $hygiene): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $hygiene; ?>" id="qstprod-produit-hygiene-<?= $counter; ?>" name="qstprod-produits-hygienes[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-hygiene-<?= $counter; ?>"><?= $hygiene; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-hygiene-autre" name="qstprod-produit-hygiene-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div> 

        <br>
        <label><small class="form-text">Quels <b>produits d'entretien</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_entretiens as $entretien): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $entretien; ?>" id="qstprod-produit-entretien-<?= $counter; ?>" name="qstprod-produits-entretiens[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-entretien-<?= $counter; ?>"><?= $entretien; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-entretien-autre" name="qstprod-produit-entretien-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div>

        <br>
        <label><small class="form-text">Quels <b>nourriture pour animaux</b> vendez-vous ? (plusieurs options possibles) : </small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->produits_v4_animaux as $animal): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= $animal; ?>" id="qstprod-produit-animal-<?= $counter; ?>" name="qstprod-produits-animaux[]">
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-produit-animal-<?= $counter; ?>"><?= $animal; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de préciser :</small></label>   
          <input class="form-control" id="qstprod-produit-animal-autre" name="qstprod-produit-animal-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div> 

        <br>
        <label><small class="form-text">Quel <b>autre produit</b> vendez-vous ? (si les réponses font défaut, merci de nous renseigner) : </small></label>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Si autre, merci de nous renseigner :</small></label>   
          <input class="form-control" id="qstprod-produit-autre-autre" name="qstprod-produit-autre-autre" type="text" placeholder="Dites-nous quel autre produit">
        </div> 

      </div>

      <!-- ------------------------- -->
      <!-- INPUTS formulaire START : ---
      <input class="form-control" id="qstprod-" name="qstprod-" type="text" placeholder="">
      ---- ------------------------- -->
      <div id="cet-types-produits">
        <label class="cet-formgroup-container-label"><small class="form-text">Créer votre fiche produit en utilisant la recherche pour trouver tous vos produits :</small></label>
        <div class="cet-formgroup-container">
          <div id="cet-produits-zone-recap" style="display: none;">
            <label><small class="form-text cet-qstprod-label-text">Récapitulatifs de votre fiche produits :</small></label>
            <div class="cet-formgroup-container cet-formgroup-inner-container" id="qstprod-produits-recherche-recap">
              <label><small class="form-text cet-qstprod-label-text">Vos produits sélectionnés :</small></label>
              <div id="label-resultats-recherche-produits">
                <label>
                  <small class="form-text cet-qstprod-label-text">Aucun produit renseigné pour le moment.</small>
                </label>
              </div>
            </div>
          </div>
          <label><small class="form-text cet-qstprod-label-text">Effectuer une recherche et ajouter tous vos produits.<br>Vous avez la possibilité de saisir librement ou choisir votre produit dans la liste de propositions :</small></label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Rechercher :</span>
            </div>
            <input class="form-control" id="qstprod-produits-recherche" value=""
              name="qstprod-produits-recherche" type="text" placeholder="..." list="listeproduits">
            <datalist id="listeproduits">
              <option></option>
              <?php $counter = 0; ?>
              <?php foreach ($listes_arrays->fruits as $fruit) : ?>
              <option data-value="fruit:<?= $fruit; ?>" value="<?= $fruit; ?>"><?= $fruit; ?></option>
              <?php endforeach; ?>
              <?php foreach ($listes_arrays->legumes as $legume) : ?>
              <option data-value="legume:<?= $legume; ?>" value="<?= $legume; ?>"><?= $legume; ?></option>
              <?php endforeach; ?>
              <?php foreach ($listes_arrays->fromages as $fromage) : ?>
              <option data-value="fromage:<?= $fromage; ?>" value="<?= $fromage; ?>"><?= $fromage; ?></option>
              <?php endforeach; ?>
              <?php foreach ($listes_arrays->fleurs as $fleur) : ?>
              <option data-value="fleur:<?= $fleur; ?>" value="<?= $fleur; ?>"><?= $fleur; ?></option>
              <?php endforeach; ?>
              <?php foreach ($listes_arrays->produits_boissons as $boisson) : ?>
              <option data-value="boisson:<?= $boisson; ?>" value="<?= $boisson; ?>"><?= $boisson; ?></option>
              <?php endforeach; ?>
              <?php foreach ($listes_arrays->produits_secs as $produitSec) : ?>
              <option data-value="produitsec:<?= $produitSec; ?>" value="<?= $produitSec; ?>"><?= $produitSec; ?></option>
              <?php endforeach; ?>
            </datalist>
            <input type="hidden" name="answer" id="qstprod-produits-recherche-hidden">
          </div>
          <div class="row">
            <div class="col"> 
              <button type="button" class="btn btn-sm btn-success" style="float: right;"
                onmousedown="ajouterRechercheAFicheProduit('qstprod-produits-recherche-hidden');">
                Ajouter ce produit à votre liste
              </button>
            </div>  
          </div>
          <br>
          <div class="row">
            <div class="col"> 
              <label><small><i>Vous avez la possibilité de détailler chaque produit, et ainsi donner d'avantage de précisions aux consomateurs. Pour cela, saisir une ou des fiche(s) produit(s) détaillée(s) :</i></small></label>
              <button type="button" class="btn btn-sm btn-block btn-success" style="float: right;"
                onclick="displayFicheProduit();">Saisir une fiche produit détaillée</button>
            </div>  
          </div>
        </div>
      </div>

      <div id="cet-fiche-produit" style="display: none;">
        <label class="cet-formgroup-container-label"><small class="form-text">Renseignez la fiche produit, puis ajouter à la liste :</small></label>
        <div class="cet-formgroup-container">
          <div class="form-group mb-3">
            <label class="cet-input-label"><small class="cet-qstprod-label-text">Nom du produit :</small></label>
            <input class="form-control is-invalid" id="qstprod-nomprd" name="qstprod-nomprd" 
              type="text" placeholder="Nom du produit, exemple : tomate"
              onblur="checkFormInputMin(30, 2, this.id);">
          </div>
          <div class="form-group mb-3">
            <label class="cet-input-label"><small class="cet-qstprod-label-text">Type de produit :</small></label>
            <input class="form-control" id="qstprod-typeprd" name="qstprod-typeprd" type="text" 
              placeholder="Type de produit, exemple : marmande">
          </div>
          <div class="form-row">
            <div class="form-group col-lg-6">
              <label><small class="form-text cet-qstprod-label-text">Indiquer les dates de début et fin pour la saisonnalité de ce produit :</small></label>
            </div>
            <div class="form-group col-lg-3">
              <input type="text" class="form-control" id="qstprod-datedebut-saisonnaliteprd" 
                name="qstprod-datedebut-saisonnaliteprd" 
                onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Date début">
            </div>
            <div class="form-group col-lg-3">
              <input type="text" class="form-control" id="qstprod-datefin-saisonnaliteprd" 
                name="qstprod-datefin-saisonnaliteprd" 
                onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Date fin">
            </div>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="qstprod-labelpopprd">Auprès des consomateurs, ce produit est pour vous :</span>
            </div>
            <select class="form-control custom-select is-invalid" id="qstprod-popprd" 
              name="qstprod-popprd" aria-describedby="qstprod-labelpopprd" onblur="checkFormInputMin(30, 2, this.id);">
              <option></option>
              <option>populaire !</option>
              <option>difficile...</option>
              <option>à développer</option>
              <option>mon meilleur produit !</option>
              <option>un produit rare</option>
            </select>
          </div>  
          <div class="row">
            <div class="col"> 
              <button type="submit" class="btn btn-sm btn-success" style="float: right; margin-left: 3px;"
                onmousedown="$('#qstprod-signupprods-nav').val('ajouter');">Ajouter ce produit</button>
              <button type="button" class="btn btn-sm btn-primary" style="float: right;"
                onclick="displayFicheProduit();">Annuler</button>
            </div>  
          </div>
        </div>
      </div>
      
      <!-- ------------------------- -->
      <!-- ZONE de récap produits.   -->
      <!-- ------------------------- -->
      <div id="qstprod-table-produits" class="alert alert-success table-responsive" role="alert" 
        style="display: <?= $recapProduitsDisplay; ?>; margin-top: 20px;">
        <label> - Récapitulatif de vos fiches produits détaillées :</label>
        <div class="d-flex justify-content-center">
          <table class="table table-borderless table-striped table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actions</th>
                <th scope="col">Nom</th>
                <th scope="col">Type</th>
                <th scope="col">Du,</th>
                <th scope="col">Au</th>
                <th scope="col">C'est un produit</th>
              </tr>
            </thead>
            <tbody style="cursor: pointer;">
              <?php foreach ($produits as $data): ?>
              <?php $produit = new QstProduitDTO(); $produit = $data; ?>
              <tr>
                <td>
                  <button class="btn btn-warning" type="submit" title="Supprimer ce produit" data-toggle="tooltip"
                    onmousedown="removeProductFromTable(<?= $produit->pid; ?>);">
                    Supprimer
                  </button>
                </td>
                <td class="align-middle"><?= $produit->produitNom; ?></td>
                <td class="align-middle"><?= $produit->produitType; ?></td>
                <td class="align-middle"><?= $produit->produitDateDebut; ?></td>
                <td class="align-middle"><?= $produit->produitDateFin; ?></td>
                <td class="align-middle"><?= $produit->produitAupresConsomateurs; ?></td>
              </tr>  
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row cet-qstprod-btnnav">
        <div class="col text-center">
          <button class="btn btn-primary" type="submit" onmousedown="$('#qstprod-signupprods-nav').val('retour');">Retour</button>
          <button class="btn btn-primary" type="submit" onmousedown="$('#qstprod-signupprods-nav').val('valider');">Valider ces informations</button>
        </div>
      </div>

      <input type="text" name="cetcal_session_id" id="cetcal_session_id" value="<?= $cetcal_session_id; ?>" hidden="hidden">
      <input type="text" name="qstprod-signupprods-nav" id="qstprod-signupprods-nav" value="unset" hidden="hidden">
      <input type="text" name="qstprod-signupprods-nav-pindex" id="qstprod-signupprods-nav-pindex" value="unset" hidden="hidden">
    </form>
  </div>
</div>
<script src="/src/scripts/js/cetcal/cetcal.min.signupprods.js"></script>