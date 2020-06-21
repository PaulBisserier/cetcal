<?php
$tag_mep = "CETCAL v4";
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

session_start();
$listes_arrays = isset($_SESSION['cetcal.listes']) ? $_SESSION['cetcal.listes'] : new CetQstprodConstListes(new FileReaderUtils($DOC_ROOT), $LOG_FILE);
$_SESSION['cetcal.listes'] = $listes_arrays;
session_write_close();

include $PHP_CONST_PATH.'cet.qstprod.const.textes.php';
include $PHP_CONST_PATH.'cet.qstprod.const.libelles.php';
include $PHP_UTILS_PATH.'cet.qstprod.utils.filarianne.php';
?>