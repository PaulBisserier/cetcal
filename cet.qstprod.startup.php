<?php
$cetcal_session_id = "";
if (isset($_GET['sitkn']))
{
  $cetcal_session_id = htmlentities(htmlspecialchars($_GET['sitkn']));
  session_id($cetcal_session_id);
  include $_SERVER['DOCUMENT_ROOT'].'/src/app/const/cet.qstprod.const.globals.php';
  // 2 heure de Session côté serveur.
  ini_set('session.gc_maxlifetime', CetQstprodConstGlobals::session_life_span);
  // Les clients devront se souvenir de leurs Session ID durant le même lapse de temps :
  session_set_cookie_params(CetQstprodConstGlobals::session_life_span);
  session_start();
}

$reboot = isset($_GET['reboot']) && htmlentities(htmlspecialchars($_GET['reboot'])) == "true";

$tag_mep = "";
$DOC_ROOT = $_SERVER['DOCUMENT_ROOT'];
$PHP_INCLUDES_PATH = $DOC_ROOT.'/src/app/includes/';
$PHP_CONST_PATH = $DOC_ROOT.'/src/app/const/';
$PHP_CONTROLLER_PATH = $DOC_ROOT.'/src/app/controller/';
$PHP_UTILS_PATH = $DOC_ROOT.'/src/app/utils/';

include $PHP_CONST_PATH.'cet.qstprod.const.listes.php';
include $PHP_UTILS_PATH.'cet.qstprod.utils.log.php';
include $PHP_UTILS_PATH.'cet.qstprod.utils.filereader.php';
$logUtils = new CETLogUtils($DOC_ROOT);
$LOG_FILE = $logUtils->file;
$listes_arrays = new CetQstprodConstListes();
if (isset($_SESSION['cetcal.data.lists'])) $listes_arrays = unserialize($_SESSION['cetcal.data.lists']);
else $listes_arrays->load(new FileReaderUtils($DOC_ROOT), $LOG_FILE);
if (!isset($_SESSION['cetcal.data.lists'])) $_SESSION['cetcal.data.lists'] = $listes_arrays;

include $PHP_CONST_PATH.'cet.qstprod.const.textes.php';
include $PHP_CONST_PATH.'cet.qstprod.const.libelles.php';
include $PHP_UTILS_PATH.'cet.qstprod.utils.filarianne.php';
?>