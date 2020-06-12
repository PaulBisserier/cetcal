<?php 
// SESSION start for data storage.
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.httpdataprocessor.php');
$dataProcessor = new HTTPDataProcessor();
$cetcal_session_id = $dataProcessor->processHttpFormData($_POST['cetcal_session_id']);
session_id($cetcal_session_id);
session_start();
// Prepare navigation :
$nav = htmlspecialchars($_POST['qstprod-signupconso-nav']);
if ($nav != 'valider' && $nav != 'retour') { /*Error de navigation TODO.*/ $nav = 'retour'; }
$statut = $nav == 'valider' ? 'signupbesoins.form' : 'signupprods.form';

// POST form logic :
/* *****************************************************************************/
/* HTTP POST : var setup : *****************************************************/
// POST form logic - dans l'ordre du formulaire HTML :
$form_achats = $dataProcessor->processHttpFormArrayData($_POST['qstprod-consoachats']);
$form_achatAutre = $dataProcessor->processHttpFormData($_POST['qstprod-consoachatautre']);
$form_receptionsMoyens = $dataProcessor->processHttpFormArrayData($_POST['qstprod-receptions']);
$form_receptionsMoyenAutre = $dataProcessor->processHttpFormData($_POST['qstprod-receptionautre']);
$form_paimentsMoyens = $dataProcessor->processHttpFormArrayData($_POST['qstprod-paiments']);
$form_paimentsMoyenAutre = $dataProcessor->processHttpFormData($_POST['qstprod-paimentautre']);

require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupconso.dto.php');
$consoDto = new QstConsomateursDTO($pConsoachats = "", $pConsoachatsAutre = "",
    $pReceptions = "", $pReceptionAutre = "", $pPaiments = "", 
    $pPaimentAutre = "");
$_SESSION['signupconso.form'] = serialize($consoDto);

$_SESSION['signupconso.form.post'] = $_POST;
session_write_close();
/* *****************************************************************************/

// Apply navigation :
header('Location: /?statut='.$statut.'&sitkn='.$cetcal_session_id);
exit();
?>