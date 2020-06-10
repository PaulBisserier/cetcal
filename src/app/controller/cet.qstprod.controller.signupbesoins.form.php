<?php 
// SESSION start for data storage.
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.httpdataprocessor.php');
$dataProcessor = new HTTPDataProcessor();
$cetcal_session_id = $dataProcessor->processHttpFormData($_POST['cetcal_session_id']);
session_id($cetcal_session_id);
session_start();
// Prepare navigation :
$nav = htmlspecialchars($_POST['qstprod-signupbesoins-nav']);
if ($nav != 'valider' && $nav != 'retour') { /*Error de navigation TODO.*/ $nav = 'retour'; }
$statut = $nav == 'valider' ? 'signupprods.form' : 'signupgen.form';

// POST form logic :
/* *****************************************************************************/
/* HTTP POST : var setup : *****************************************************/
// POST form logic - dans l'ordre du formulaire HTML :
//$form_qstgen_lieuxdist = $_POST['qstprod-ldist-qstgen[]'];
$form_qstgen_libre = $dataProcessor->processHttpFormData($_POST['qstprod-qstbesoinlibre']);
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupbesoins.dto.php');
$besoinsDto = "";
$_SESSION['signupbesoins.form'] = serialize($besoinsDto);
/* *****************************************************************************/

// Apply navigation :
header('Location: /?statut='.$statut.'&sitkn='.$cetcal_session_id);
exit();
?>