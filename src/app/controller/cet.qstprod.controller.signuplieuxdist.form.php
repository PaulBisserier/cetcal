<?php 
// SESSION start for data storage.
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.httpdataprocessor.php');
$dataProcessor = new HTTPDataProcessor();
$cetcal_session_id = $dataProcessor->processHttpFormData($_POST['cetcal_session_id']);
session_id($cetcal_session_id);
session_start();
// Prepare navigation :
$nav = $dataProcessor->processHttpFormData($_POST['qstprod-signuplieuxdist-nav']);
if ($nav != 'valider' && $nav != 'retour' && $nav != 'ajouter' && $nav != 'supprimer') 
{ 
  /*Error de navigation TODO.*/ 
  $nav = 'retour'; 
}
$append = $nav == 'ajouter';
$remove = $nav == 'supprimer';
$statut = ($append == true || $remove == true) ? 'signuplieuxdist.form' : ($nav == 'valider' ? 'signupprods.form' : 'signupgen.form');

// POST form logic :
/* *****************************************************************************/
/* HTTP POST : var setup : *****************************************************/
// POST form logic - dans l'ordre du formulaire HTML :
if ($append) 
{
  $form_nomlieu = $dataProcessor->processHttpFormData($_POST['qstprod-nomlieuxdist']);
  $form_nomlieusaisie = $dataProcessor->processHttpFormData($_POST['qstprod-nomlieuxdistinconnu']);
  $form_jourapproxliv = $dataProcessor->processHttpFormData($_POST['qstprod-datelieuxdist']);
  $form_periodiciteliv = $dataProcessor->processHttpFormData($_POST['qstprod-periodicitedist']);

  $fichesLieux = isset($_SESSION['signuplieuxdist.form']) ? unserialize($_SESSION['signuplieuxdist.form']) : array();
  $form_lid = count($fichesLieux);
  require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signuplieuxdist.dto.php');
  $dtoLieuDist = new QstLieuxDistributionDTO($form_nomlieu, $form_nomlieusaisie, $form_jourapproxliv,
    $form_periodiciteliv, $form_lid);
  array_push($fichesLieux, $dtoLieuDist);
  $_SESSION['signuplieuxdist.form'] = serialize($fichesLieux);
}
else if ($remove)
{
  $form_lid_remove = $dataProcessor->processHttpFormData($_POST['qstprod-signuplieuxdist-nav-lindex']);
  $fichesLieux = isset($_SESSION['signuplieuxdist.form']) ? unserialize($_SESSION['signuplieuxdist.form']) : array();
  unset($fichesLieux[$form_lid_remove]);
  $_SESSION['signuplieuxdist.form'] = serialize($fichesLieux);
}

$_SESSION['signuplieuxdist.form.post'] = $_POST;
session_write_close();
/* *****************************************************************************/

// Apply navigation :
header('Location: /?statut='.$statut.'&sitkn='.$cetcal_session_id);
exit();
?>