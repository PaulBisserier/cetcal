<?php 
// SESSION start for data storage.
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.httpdataprocessor.php');
$dataProcessor = new HTTPDataProcessor();
$cetcal_session_id = $dataProcessor->processHttpFormData($_POST['cetcal_session_id']);
session_id($cetcal_session_id);
session_start();
// Prepare navigation :
$nav = $dataProcessor->processHttpFormData($_POST['qstprod-signupprods-nav']);
if ($nav != 'valider' && $nav != 'retour' && $nav != 'ajouter' && $nav != 'supprimer') 
{ 
  /*Error de navigation TODO.*/ 
  $nav = 'retour';
}
$append = $nav == 'ajouter';
$remove = $nav == 'supprimer';
$statut = ($append == true || $remove == true) ? 'signupprods.form' : ($nav == 'valider' ? 'signupconso.form' : 'signuplieuxdist.form');

/* *****************************************************************************/
/* HTTP POST : var setup : *****************************************************/
// POST form logic - dans l'ordre du formulaire HTML :
if ($append) 
{
  $form_pnom = $dataProcessor->processHttpFormData($_POST['qstprod-nomprd']);
  $form_ptype = $dataProcessor->processHttpFormData($_POST['qstprod-typeprd']);
  $form_pdatedeb = $dataProcessor->processHttpFormData($_POST['qstprod-datedebut-saisonnaliteprd']);
  $form_pdatefin = $dataProcessor->processHttpFormData($_POST['qstprod-datefin-saisonnaliteprd']);
  $form_annees_experience = $dataProcessor->processHttpFormData($_POST['qstprod-anneesxpprd']);
  $form_aupres_consomateurs = $dataProcessor->processHttpFormData($_POST['qstprod-popprd']);

  $fichesProduits = isset($_SESSION['signupprods.form']) ? unserialize($_SESSION['signupprods.form']) : array();
  $form_pid = count($fichesProduits);
  require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupprods.dto.php');
  $dtoProdProduits = new QstProduitDTO($form_pnom, $form_ptype, $form_pdatedeb, $form_pdatefin, 
    $form_annees_experience, $form_aupres_consomateurs, $form_pid);
  array_push($fichesProduits, $dtoProdProduits);
  $_SESSION['signupprods.form'] = serialize($fichesProduits);
}
else if ($remove)
{
  $form_pid_remove = $dataProcessor->processHttpFormData($_POST['qstprod-signupprods-nav-pindex']);
  $fichesProduits = isset($_SESSION['signupprods.form']) ? unserialize($_SESSION['signupprods.form']) : array();
  unset($fichesProduits[$form_pid_remove]);
  $_SESSION['signupprods.form'] = serialize($fichesProduits);
}
/* *****************************************************************************/

// Apply navigation :
header('Location: /?statut='.$statut.'&sitkn='.$cetcal_session_id);
exit();
?>