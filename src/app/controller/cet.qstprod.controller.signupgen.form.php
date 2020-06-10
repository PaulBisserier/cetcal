<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.httpdataprocessor.php');
$dataProcessor = new HTTPDataProcessor();
// SESSION start for data storage.
$cetcal_session_id = hash('sha1', 
  $dataProcessor->processHttpFormData($_POST['qstprod-email']
  ).$dataProcessor->processHttpFormData($_POST['qstprod-mdp']));
session_id($cetcal_session_id);
session_start();
// Prepare navigation :
$nav = htmlspecialchars($_POST['qstprod-signupgen-nav']);
if ($nav != 'valider' && $nav != 'retour') 
{ 
  /*Error de navigation TODO.*/ 
  $nav = 'retour'; 
}
$statut = $nav == 'valider' ? 'signupbesoins.form' : '';

/* *****************************************************************************/
/* HTTP POST : var setup : *****************************************************/
// POST form logic - dans l'ordre du formulaire HTML :
if ($nav == 'valider') 
{
  $form_obl_nom = $dataProcessor->processHttpFormData($_POST['qstprod-nom']);
  $form_obl_prenom = $dataProcessor->processHttpFormData($_POST['qstprod-prenom']);
  $form_obl_email = $dataProcessor->processHttpFormData($_POST['qstprod-email']);
  $form_obl_emailconf = $dataProcessor->processHttpFormData($_POST['qstprod-email-conf']);
  $form_obl_mdp_hash = hash('sha256', $dataProcessor->processHttpFormData($_POST['qstprod-mdp']));
  $form_obl_mdpconf_hash = $dataProcessor->processHttpFormData($_POST['qstprod-mdpconf']);
  $form_telfix = $dataProcessor->processHttpFormData($_POST['qstprod-numbtel-fix']);
  $form_telport = $dataProcessor->processHttpFormData($_POST['qstprod-numbtel-port']);

  $form_obl_nomferme = $dataProcessor->processHttpFormData($_POST['qstprod-nomferme']);
  $form_obl_siret = $dataProcessor->processHttpFormData($_POST['qstprod-siret']);
  $form_adr_numvoie = $dataProcessor->processHttpFormData($_POST['qstprod-numvoie']);
  $form_adr_rue = $dataProcessor->processHttpFormData($_POST['qstprod-rue']);
  $form_adr_lieudit = $dataProcessor->processHttpFormData($_POST['qstprod-lieudit']);
  $form_adr_commune = $dataProcessor->processHttpFormData($_POST['qstprod-commune']);
  $form_adr_cp = $dataProcessor->processHttpFormData($_POST['qstprod-cp']);
  $form_adr_cmpladr = $dataProcessor->processHttpFormData($_POST['qstprod-cmpladrs']);

  $form_pagefb = $dataProcessor->processHttpFormData($_POST['qstprod-fb']);
  $form_pageig = $dataProcessor->processHttpFormData($_POST['qstprod-ig']);
  $form_pagetwitter = $dataProcessor->processHttpFormData($_POST['qstprod-twitter']);
  $form_siteweb = $dataProcessor->processHttpFormData($_POST['qstprod-www']);
  $form_boutiquewww = $dataProcessor->processHttpFormData($_POST['qstprod-adrwebboutiqueenligne']);

  $form_orgcertifbio = $dataProcessor->processHttpFormData($_POST['qstprod-orgcertifbio']);
  $form_typeprod = $dataProcessor->processHttpFormArrayData(
    isset($_POST['qstprod-besoins-activites']) ? $_POST['qstprod-besoins-activites'] : NULL);
  $form_surfacepc = $dataProcessor->processHttpFormData($_POST['qstprod-surfacepc']);
  $form_surfaceserre = $dataProcessor->processHttpFormData($_POST['qstprod-supserre']);
  $form_nbrtetes = $dataProcessor->processHttpFormData($_POST['qstprod-nbrtetes']);
  $form_hectolitresparan = $dataProcessor->processHttpFormData($_POST['qstprod-hectolitresparan']);

  $form_sondage = $dataProcessor->processHttpFormArrayData(
    isset($_POST['qstprod-sondage']) ? $_POST['qstprod-sondage'] : NULL);

  // Check for data isset/unset erros.
  $dataProcessor->scanForErrors();
  // Construct new DTO object :
  require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupgen.dto.php');
  $dtoQstGeneralesProd = new QstProdGeneraleDTO($form_obl_nom, $form_obl_prenom, $form_obl_email, $form_obl_mdp_hash, 
    $form_telfix, $form_telport, $form_obl_nomferme, $form_obl_siret, $form_adr_numvoie, $form_adr_rue, 
    $form_adr_lieudit, $form_adr_commune, $form_adr_cp, $form_adr_cmpladr, $form_pagefb, $form_pageig, 
    $form_pagetwitter, $form_siteweb, $form_boutiquewww, "", "", $form_orgcertifbio, 
    $form_typeprod, $form_surfacepc, $form_surfaceserre, $form_nbrtetes, $form_hectolitresparan);
  $_SESSION['signupgen.form'] = serialize($dtoQstGeneralesProd);
  session_write_close();
}
/* *****************************************************************************/

// Apply navigation :
header('Location: /?statut='.$statut.'&sitkn='.$cetcal_session_id);
exit();
?>