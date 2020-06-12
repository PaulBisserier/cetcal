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
$statut = $nav == 'valider' ? 'signuprecap.form' : 'signupconso.form';

// POST form logic :
/* *****************************************************************************/
/* HTTP POST : var setup : *****************************************************/
// POST form logic - dans l'ordre du formulaire HTML :
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupbesoins.dto.php');
$besoinsDto = "";
$_SESSION['signupbesoins.form'] = serialize($besoinsDto);
$_SESSION['signupbesoins.form.post'] = $_POST;
session_write_close();
/* *****************************************************************************/

// Apply navigation :
header('Location: /?statut='.$statut.'&sitkn='.$cetcal_session_id);
exit();
?>