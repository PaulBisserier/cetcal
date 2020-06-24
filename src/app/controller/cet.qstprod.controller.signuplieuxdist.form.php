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
  $nav = $dataProcessor->processHttpFormData($_POST['qstprod-signuplieuxdist-nav']);
  if ($nav != 'valider' && $nav != 'retour') /*Error de navigation TODO.*/ $nav = 'retour'; 
  $statut = $nav == 'valider' ? 'signupprods.form' : 'signupgen.form';

  // POST form logic :
  /* *****************************************************************************/
  /* HTTP POST : var setup : *****************************************************/
  // POST form logic - dans l'ordre du formulaire HTML :
  $form_points_vente = $dataProcessor->processHttpFormArrayData(
    isset($_POST['qstprod-pdv']) ? $_POST['qstprod-pdv'] : NULL);
  $form_point_vente_autre = $dataProcessor->processHttpFormData($_POST['qstprod-pdvautre']);

  require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signuplieuxdist.dto.php');
  $dtoLieuDist = new QstLieuxDistributionDTO($form_points_vente, $form_point_vente_autre);
  $_SESSION['signuplieuxdist.form'] = serialize($dtoLieuDist);

  $_SESSION['signuplieuxdist.form.post'] = $_POST;
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