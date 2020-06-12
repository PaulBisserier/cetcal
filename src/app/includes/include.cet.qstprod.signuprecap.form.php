<?php 
$cetcal_session_id = htmlentities(htmlspecialchars($_GET['sitkn']));
session_id($cetcal_session_id);
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupgen.dto.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupprods.dto.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signuplieuxdist.dto.php');
$data = new QstProdGeneraleDTO();
$data = isset($_SESSION['signupgen.form']) ? unserialize($_SESSION['signupgen.form']) : NULL; 
$produits = isset($_SESSION['signupprods.form']) ? unserialize($_SESSION['signupprods.form']) : NULL;
$recapProduitsDisplayRecap = ($produits === NULL || count($produits) === 0) ? 'none' : 'block';
$lieuxdist = isset($_SESSION['signuplieuxdist.form']) ? unserialize($_SESSION['signuplieuxdist.form']) : NULL;
$lieuxDistDisplayRecap = ($lieuxdist === NULL || count($lieuxdist) === 0) ? 'none' : 'block';
?>
<!-- singup récapitulatif html form -->
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

<!-- -------------------------------------- -->
<!-- ZONE de récap informations générales.   -->
<!-- -------------------------------------- -->
<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <div id="qstprod-table-generale" class="alert alert-success table-responsive" role="alert">
      <label> - Récapitulatif de vos informations générales :</label>
      <div class="d-flex justify-content-center">
        <table class="table table-borderless table-striped">
          <tbody>
            <tr><td>Nom, prénom : </td><td><?= $data->nom; ?> <?= $data->prenom; ?></td></tr>
            <tr><td>Adresse email : </td><td><?= $data->email; ?></td></tr>
            <tr><td>Téléphone fix : </td><td><?= $data->telfix; ?></td></tr>
            <tr><td>Téléphone mobil : </td><td><?= $data->telport; ?></td></tr>
            <tr><td>Nom de la ferme : </td><td><?= $data->nomferme; ?></td></tr>
            <tr><td>Siret associé à la ferme : </td><td><?= $data->siret; ?></td></tr>
            <?php if (isset($data->adrLieudit) || isset($data->adrComplementAdr)) $displayCmplAdr = true; ?>
            <tr>
              <td>Adresse postale de la ferme : </td>
              <td><?= $data->adrNumvoie; ?> <?= $data->adrRue; ?><?php if ($displayCmplAdr) : ?><br><?= $data->adrLieudit; ?> <?= $data->adrComplementAdr; ?><?php endif; ?><br><?= $data->adrCommune; ?> <?= $data->adrCodePostal; ?>
              </td>
            </tr>
            <tr><td>Page Facebook : </td><td><?= $data->pageFB; ?></td></tr>
            <tr><td>Page Instagram : </td><td><?= $data->pageIG; ?></td></tr>
            <tr><td>Page Twitter : </td><td><?= $data->pageTwitter; ?></td></tr>
            <tr><td>Adresse web de votre site dédié : </td><td><?= $data->siteWebUrl; ?></td></tr>
            <tr><td>Adresse web, Boutique en ligne : </td><td><?= $data->boutiqueEnLigneUrl; ?></td></tr>
            <tr><td>Vous êtes installé à la ferme <b><?= $data->nomferme; ?></b> depuis : </td><td><?= $data->anneeInstallation; ?></td></tr>
            <tr><td>Organisme Syndical : </td><td><?= $data->organismeSyndic; ?></td></tr>
            <tr><td>Organisme Certificateur BIO : </td><td><?= $data->organismeCertificateurBIO; ?></td></tr>
            <tr><td>Type de production : </td><td><?= $data->typeDeProduction; ?></td></tr>
            <tr><td>Surface de terres cultivées : </td><td><?= $data->surfaceHectTerres; ?> <i>Hectares</i></td></tr>
            <tr><td>Surface sous serre(s) : </td><td><?= $data->surfaceHectSousSerre; ?> <i>Hectares</i></td></tr>
            <tr><td>Concernant les outils informatiques, vous avez répondu : </td><td><?= $data->reponseLibreBesoins; ?></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- ------------------------- -->
<!-- ZONE de récap produits.   -->
<!-- ------------------------- -->
<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <div id="qstprod-table-produits" class="alert alert-success table-responsive" role="alert" 
      style="display: <?= $recapProduitsDisplayRecap; ?>;">
      <label> - Récapitulatif de vos fiches produits :</label>
      <div class="d-flex justify-content-center">
        <table class="table table-borderless table-striped">
          <thead class="thead-light">
            <tr>
              <th scope="col">Nom</th>
              <th scope="col">Type</th>
              <th scope="col">Du,</th>
              <th scope="col">Au</th>
              <th scope="col">Expérience</th>
              <th scope="col">C'est un produit</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($produits as $data): ?>
            <?php $produit = new QstProduitDTO(); $produit = $data; ?>
            <tr>
              <td><?= $produit->produitNom; ?></td>
              <td><?= $produit->produitType; ?></td>
              <td><?= $produit->produitDateDebut; ?></td>
              <td><?= $produit->produitDateFin; ?></td>
              <td><?= $produit->produitAnneesExperience; ?></td>
              <td><?= $produit->produitAupresConsomateurs; ?></td>
            </tr>  
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- -------------------------------------- -->
<!-- ZONE de récap lieux de distribution.   -->
<!-- -------------------------------------- -->
<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <div id="qstprod-table-lieuxdist" class="alert alert-success table-responsive" role="alert" 
      style="display: <?= $lieuxDistDisplayRecap; ?>;">
      <label> - Récapitulatif de vos lieux de distribution :</label>
      <div class="d-flex justify-content-center">
        <table class="table table-borderless table-striped">
          <thead class="thead-light">
            <tr>
              <th scope="col">lieux de distribution</th>
              <th scope="col">Journée/date</th>
              <th scope="col">Périodicité/mois</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($lieuxdist as $data): ?>
            <?php $lieu = new QstLieuxDistributionDTO(); $lieu = $data; ?>
            <tr>
              <td><?= $lieu->lieuNom; ?></td>
              <td><?= $lieu->jourLivraison; ?></td>
              <td><?= $lieu->periodiciteLivraison; ?></td>
            </tr>  
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <div class="cet-formgroup-container">
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <p><small class="cet-qstprod-label-text"><b><?= CetQstprodConstTextes::recap_questionnaire_declaratif_a; ?></b></small></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <label>
        <small class="form-text cet-qstprod-label-text">Souhaitez-vous valider votre inscription et envoyer votre questionnaire ? Si oui, merci de déclarer vos informations :</small>
      </label>
      <div class="input-group mb-3">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="qstprod-question-reseaux-participation-oui" 
            name="qstprod-question-reseaux-participation" value="oui">
          <label class="form-check-label" for="qstprod-question-reseaux-participation-oui">Oui, j'ai déclare que les informations renseignées sont exactes et vérifiées.</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="qstprod-question-reseaux-participation-non" 
            name="qstprod-question-reseaux-participation" value="non">
          <label class="form-check-label" for="qstprod-question-reseaux-participation-non">Non, je ne souhaite plus m'inscrire.</label>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <form class="form" method="post" action="/src/app/controller/cet.qstprod.controller.signuprecap.form.php">

      <div class="row cet-qstprod-btnnav">
        <div class="col text-center">
          <button class="btn btn-primary" type="submit" onmousedown="$('#qstprod-signuprecap-nav').val('retour');">Retour</button>
          <button class="btn btn-primary" type="submit" onmousedown="$('#qstprod-signuprecap-nav').val('valider');">Valider votre inscription</button>
        </div>
      </div>

      <input type="text" name="cetcal_session_id" id="cetcal_session_id" value="<?= $cetcal_session_id; ?>" hidden="hidden">
      <input type="text" name="qstprod-signuprecap-nav" id="qstprod-signuprecap-nav" value="unset" hidden="hidden">
    </form>
  </div>
</div>