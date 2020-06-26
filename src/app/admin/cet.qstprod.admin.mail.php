<?php
// http://127.0.0.4/src/app/admin/cet.qstprod.admin.mail.php?mhtmlfl=cet.qstprod.inscription.html.mail.content.html&mplainfl=cet.qstprod.inscription.plain.mail.content&mlstfl=cet.qstprod.maillist.equipe.cet&msbj=cet.qstprod.inscription.mail.subject

$DOC_ROOT = $_SERVER['DOCUMENT_ROOT'];
$errparamsget = (isset($_GET['mhtmlfl']) && isset($_GET['mplainfl']) && 
  isset($_GET['mlstfl']) && isset($_GET['msbj']));
$errsending = false;
include $DOC_ROOT.'/src/app/utils/cet.qstprod.utils.mail.php';
include $DOC_ROOT.'/src/app/utils/cet.qstprod.utils.filereader.php';

try
{
  $mailUtils = new CETQstprodMailUtils();
  $mailHtmlFile = $_GET['mhtmlfl'];
  $mailPlainFile = $_GET['mplainfl'];
  $mailList = $_GET['mlstfl'];
  $mailSubject = $_GET['msbj'];
  $mailUtils->send($mailHtmlFile, $mailPlainFile, $mailList, 
    $mailSubject, new FileReaderUtils($DOC_ROOT));
}
catch (Exception $e) 
{
  $errsending = true;
  var_dump($e);
}
?>