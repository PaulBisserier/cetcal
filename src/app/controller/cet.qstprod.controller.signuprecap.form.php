<?php 
// Prepare to read Session.
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.httpdataprocessor.php');
$dataProcessor = new HTTPDataProcessor();
$cetcal_session_id = $dataProcessor->processHttpFormData($_POST['cetcal_session_id']);
session_id($cetcal_session_id);
session_start();
// Prepare navigation :
$nav = $dataProcessor->processHttpFormData($_POST['qstprod-signuprecap-nav']);
if ($nav != 'valider' && $nav != 'retour') { /*Error de navigation TODO.*/ $nav = 'retour'; }
$statut = $nav == 'valider' ? '' : 'signupbesoins.form';

// POST form logic :

// Apply navigation :
header('Location: /?statut='.$statut.'&sitkn='.$cetcal_session_id);
exit();
?>