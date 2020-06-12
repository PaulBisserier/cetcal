<?php 
// SESSION start for data storage.
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.httpdataprocessor.php');
$dataProcessor = new HTTPDataProcessor();
$cetcal_session_id = $dataProcessor->processHttpFormData($_POST['cetcal_session_id']);
session_id($cetcal_session_id);
session_start();
// Prepare navigation :
$nav = $dataProcessor->processHttpFormData($_POST['qstprod-signupprods-nav']);
if ($nav != 'valider' && $nav != 'retour') /*Error de navigation TODO.*/ $nav = 'retour';
$statut = $nav == 'valider' ? 'signupconso.form' : 'signuplieuxdist.form';

/* *****************************************************************************/
/* HTTP POST : var setup : *****************************************************/
// POST form logic - dans l'ordre du formulaire HTML :
if ($append) 
{
  $form_typescultures = $dataProcessor->processHttpFormArrayData($_POST['qstprod-typescultures']);
  $form_typescultureAutre = $dataProcessor->processHttpFormData($_POST['qstprod-typesculture-autre']);
  $form_legumes = $dataProcessor->processHttpFormArrayData($_POST['qstprod-produits-legumes']);
  $form_legumeAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-legume-autre']);
  $form_viandes = $dataProcessor->processHttpFormArrayData($_POST['qstprod-produits-viandes']);
  $form_viandeAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-viande-autre']);
  $form_laitiers = $dataProcessor->processHttpFormArrayData($_POST['qstprod-produits-laitiers']);
  $form_laitierAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-laitier-autre']);
  $form_mielsruches = $dataProcessor->processHttpFormArrayData($_POST['qstprod-produits-mielsruches']);
  $form_mielsrucheAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-mielruche-autre']);
  $form_fruits = $dataProcessor->processHttpFormArrayData($_POST['qstprod-produits-fruits']);
  $form_fruitAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-fruit-autre']);
  $form_champignons = $dataProcessor->processHttpFormArrayData($_POST['qstprod-produits-champignons']);
  $form_champignonAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-champignon-autre']);
  $form_plantes = $dataProcessor->processHttpFormArrayData($_POST['qstprod-produits-plantes']);
  $form_planteAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-plante-autre']);
  $form_semences = $dataProcessor->processHttpFormArrayData($_POST['qstprod-produits-semences']);
  $form_semenceAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-semence-autre']);
  $form_transformes = $dataProcessor->processHttpFormArrayData($_POST['qstprod-produits-transformes']);
  $form_transformeAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-transforme-autre']);
  $form_cereales = $dataProcessor->processHttpFormArrayData($_POST['qstprod-produits-cereales']);
  $form_cerealeAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-cereale-autre']);
  $form_hygienes = $dataProcessor->processHttpFormArrayData($_POST['qstprod-produits-hygienes']);
  $form_hygieneAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-hygiene-autre']);
  $form_entretiens = $dataProcessor->processHttpFormArrayData($_POST['qstprod-produits-entretiens']);
  $form_entretienAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-entretien-autre']);
  $form_animaux = $dataProcessor->processHttpFormData($_POST['qstprod-produits-animaux']);
  $form_animauxAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-animal-autre']);
  $form_autreAutre = $dataProcessor->processHttpFormData($_POST['qstprod-produit-autre-autre']);

  require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupprods.dto.php');
  $dtoProdProduits = new QstProduitDTO($form_typescultures, $form_typescultureAutre, $form_legumes, $form_legumeAutre, $form_viandes, $form_viandeAutre, 
    $form_laitiers, $form_laitierAutre, $form_mielsruches, 
    $form_mielsrucheAutre, $form_fruits, $form_fruitAutre, $form_champignons,
    $form_champignonAutre, $form_plantes, $form_planteAutre, $form_semences,
    $form_semenceAutre, $form_transformes, $form_transformeAutre, 
    $form_cereales, $form_cerealeAutre, $form_hygienes, $form_hygieneAutre,
    $form_entretiens, $form_entretienAutre, $form_animaux, 
    $form_animauxAutre, $form_autreAutre);
  $_SESSION['signupprods.form'] = serialize($dtoProdProduits);

}

$_SESSION['signupprods.form.post'] = $_POST;
session_write_close();
/* *****************************************************************************/

// Apply navigation :
header('Location: /?statut='.$statut.'&sitkn='.$cetcal_session_id);
exit();
?>