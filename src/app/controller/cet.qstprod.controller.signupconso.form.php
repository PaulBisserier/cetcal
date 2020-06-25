<?php
include $_SERVER['DOCUMENT_ROOT'].'/src/app/const/cet.qstprod.const.globals.php';
include $_SERVER['DOCUMENT_ROOT'].'/src/app/const/cet.qstprod.const.log.levels.php';
include $_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.log.php';
$logUtils = new CETLogUtils($_SERVER['DOCUMENT_ROOT']);
$LOG_FILE = $logUtils->file;
include $_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.exceptions.php';  
$cetcal_session_id = "";
try 
{
  // SESSION start for data storage.
  require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.httpdataprocessor.php');
  $dataProcessor = new HTTPDataProcessor();
  $cetcal_session_id = $dataProcessor->processHttpFormData($_POST['cetcal_session_id']);
  session_id($cetcal_session_id);
  // 1 heure de Session côté serveur.
  ini_set('session.gc_maxlifetime', CetQstprodConstGlobals::session_life_span);
   // Les clients devront se souvenir de leurs Session ID durant le même lapse de temps :
  session_set_cookie_params(CetQstprodConstGlobals::session_life_span);
  session_start();
  
  // Prepare navigation :
  $nav = htmlspecialchars($_POST['qstprod-signupconso-nav']);
  if ($nav != 'valider' && $nav != 'retour') { /*Error de navigation TODO.*/ $nav = 'retour'; }
  $statut = $nav == 'valider' ? 'signupbesoins.form' : 'signupprods.form';

  // POST form logic :
  /* *****************************************************************************/
  /* HTTP POST : var setup : *****************************************************/
  // POST form logic - dans l'ordre du formulaire HTML :
  $form_achats = $dataProcessor->processHttpFormArrayData(
    isset($_POST['qstprod-consoachats']) ? $_POST['qstprod-consoachats'] : NULL);
  $form_achatAutre = $dataProcessor->processHttpFormData($_POST['qstprod-consoachatautre']);
  $form_receptionsMoyens = $dataProcessor->processHttpFormArrayData(
    isset($_POST['qstprod-receptions']) ? $_POST['qstprod-receptions'] : NULL);
  $form_receptionsMoyenAutre = $dataProcessor->processHttpFormData($_POST['qstprod-receptionautre']);
  $form_paimentsMoyens = $dataProcessor->processHttpFormArrayData(
    isset($_POST['qstprod-paiments']) ? $_POST['qstprod-paiments'] : NULL);
  $form_paimentsMoyenAutre = $dataProcessor->processHttpFormData($_POST['qstprod-paimentautre']);
  $form_driveadr = $dataProcessor->processHttpFormData($_POST['qstprod-adr-drive']);
  $form_drivejour = $dataProcessor->processHttpFormArrayData(
    isset($_POST['qstprod-joursdrive']) ? $_POST['qstprod-joursdrive'] : NULL);

  require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupconso.dto.php');
  $consoDto = new QstConsomateursDTO($form_achats, $form_achatAutre,
      $form_receptionsMoyens, $form_receptionsMoyenAutre, $form_paimentsMoyens, 
      $form_paimentsMoyenAutre, $form_driveadr, $form_drivejour);
  $_SESSION['signupconso.form'] = serialize($consoDto);

  $_SESSION['signupconso.form.post'] = $_POST;
  session_write_close();
  /* *****************************************************************************/

  // Apply navigation :
  header('Location: /?statut='.$statut.'&sitkn='.$cetcal_session_id);
  exit();
}
catch (Exception $e) 
{
  session_write_close();
  //error_log(CET_LOG::TAG.$e->getMessage()."}[stacktrace=".$e->getTraceAsString()."]", 3, $LOG_FILE);
  header('Location: /src/app/controller/cet.qstprod.controller.generique.erreure.php/?err='.$e->getMessage().'&sitkn='.$cetcal_session_id);
  exit();
}