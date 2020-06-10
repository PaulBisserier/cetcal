<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signuplieuxdist.dto.php');
$cetcal_session_id = htmlentities(htmlspecialchars($_GET['sitkn']));
session_id($cetcal_session_id);
session_start();
$lieuxdist = isset($_SESSION['signuplieuxdist.form']) ? unserialize($_SESSION['signuplieuxdist.form']) : NULL; 
$lieuxDistDisplay = ($lieuxdist === NULL || count($lieuxdist) === 0) ? 'none' : 'block';
?>
<!-- singup lieux de distribution informations html form -->
<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <p>BOUCHON >>> Veuillez renseigner une fiche pour chaque lieux de distribution</p>
      <p>Après inscription, vous avez la possibilité d'enrichir vos informations de lieux de distribution.</p>
      <p>Toutes les informations saisies sur annuaire-bio.org vous appartiennent. <<< BOUCHON</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</div>

<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <form id="signuplieuxdist.form" class="form" method="post" 
      action="/src/app/controller/cet.qstprod.controller.signuplieuxdist.form.php">
      <label for="cdc-signup-email"> - Veuillez renseigner vos lieux de distribution ou collaborateurs :
        <small class="form-text cet-qstprod-label-text" style="margin-top: 2px;">Cet annuaire garantie la confidentialité de vos données numériques.<br>
          <a href="#">Prendre connaissance de notre politique relative aux données numériques.</a>
        </small>
      </label>

      <!-- ------------------------- -->
      <!-- INPUTS formulaire START : ---
      <input class="form-control" id="qstprod-" name="qstprod-" type="text" placeholder="">
      ---- ------------------------- -->
      <br>
      <label class="cet-formgroup-container-label"><small class="form-text">Renseignez un lieux de distribution ou organisme, puis ajouter à la liste :</small></label>
      <div class="cet-formgroup-container">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="qstprod-labelnomlieuxdist">Lieux de dist. ou organisme :</span>
          </div>
          <select class="form-control custom-select" id="qstprod-nomlieuxdist" 
            name="qstprod-nomlieuxdist" aria-describedby="qstprod-labelnomlieuxdist">
            <option></option>
            <option>Castillonnais En Transition</option>
            <option>BIO Asso n°1</option>
            <option>Association pour la consomation en circuits courts n°2</option>
            <option>BIO Asso n°2</option>
            <option>BIO Asso n°3</option>
            <option>BIO Asso n°4</option>
            <option>BIO Asso n°5</option>
            <option>BIO Asso n°6</option>
            <option>BIO Asso n°7</option>
          </select>
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Nom du lieu de distribution si inexistant dans la liste :</small></label>
          <input class="form-control" id="qstprod-nomlieuxdistinconnu" name="qstprod-nomlieuxdistinconnu" type="text" placeholder="Nom du lieu de distribution si inexistant dans la liste.">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Date approximative de la prochaine livraison (format jj/mm/aaaa) :</small></label>  
          <input class="form-control" id="qstprod-datelieuxdist" name="qstprod-datelieuxdist" type="text" 
            placeholder="Date approximative de la prochaine livraison (format jj/mm/aaaa)"
            onblur="checkFRDateFormat(false, this.id);">
        </div>
        <div class="form-group mb-3"> 
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Périodicité de distribution mensuelle :</small></label> 
          <input class="form-control is-invalid" id="qstprod-periodicitedist" name="qstprod-periodicitedist" 
            type="number" min="0" placeholder="Périodicité de distribution mensuelle"
            onblur="checkFormInputInteger(30, 1, this.id);">
        </div>
        <div class="row">
          <div class="col"> 
            <button type="submit" class="btn btn-sm btn-primary" style="float: right;" 
              onmousedown="$('#qstprod-signuplieuxdist-nav').val('ajouter');">
              Ajouter ce lieux de distribution
            </button>
          </div>
        </div>
      </div>

      <!-- -------------------------------------- -->
      <!-- ZONE de récap lieux de distribution.   -->
      <!-- -------------------------------------- -->
      <div id="qstprod-table-lieuxdist" class="alert alert-success table-responsive" role="alert" 
        style="display: <?= $lieuxDistDisplay; ?>; margin-top: 20px;">
        <label> - Récapitulatif de vos lieux de distribution :</label>
        <div class="d-flex justify-content-center">
          <table class="table table-borderless table-striped table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actions</th>
                <th scope="col">lieux de distribution</th>
                <th scope="col">Journée/date</th>
                <th scope="col">Périodicité/mois</th>
              </tr>
            </thead>
            <tbody style="cursor: pointer;">
              <?php foreach ($lieuxdist as $data): ?>
              <?php $lieu = new QstLieuxDistributionDTO(); $lieu = $data; ?>
              <tr>
                <td>
                  <button class="btn btn-warning" type="submit" title="Supprimer ce lieu" data-toggle="tooltip"
                    onmousedown="removePlaceFromTable(<?= $lieu->lid; ?>);">
                    Supprimer
                  </button>
                </td>
                <td class="align-middle"><?= $lieu->lieuNom; ?></td>
                <td class="align-middle"><?= $lieu->jourLivraison; ?></td>
                <td class="align-middle"><?= $lieu->periodiciteLivraison; ?></td>
              </tr>  
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row cet-qstprod-btnnav">
        <div class="col text-center">
          <button class="btn btn-primary" type="submit" onmousedown="$('#qstprod-signuplieuxdist-nav').val('retour');">Retour</button>
          <button class="btn btn-primary" type="submit" onmousedown="$('#qstprod-signuplieuxdist-nav').val('valider');">Valider ces informations</button>
        </div>
      </div>

      <input type="text" name="cetcal_session_id" id="cetcal_session_id" value="<?= $cetcal_session_id; ?>" hidden="hidden">
      <input type="text" name="qstprod-signuplieuxdist-nav-lindex" id="qstprod-signuplieuxdist-nav-lindex" value="unset" hidden="hidden">
      <input type="text" name="qstprod-signuplieuxdist-nav" id="qstprod-signuplieuxdist-nav" value="unset" hidden="hidden">
    </form>
  </div>
</div>

<!-- ------------------------------ -->
<!-- Specific js for this page only -->
<script src="/src/scripts/js/cetcal/cetcal.min.signuplieuxdist.js"></script>