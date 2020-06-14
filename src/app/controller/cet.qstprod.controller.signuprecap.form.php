<?php 
// Prepare to read Session.
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.httpdataprocessor.php');
$dataProcessor = new HTTPDataProcessor();
$cetcal_session_id = $dataProcessor->processHttpFormData($_POST['cetcal_session_id']);
session_id($cetcal_session_id);
session_start();

/** ***************************************************************************
 * Time to insert it all from SESSION to DB.
 */
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupgen.dto.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupprods.dto.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signuplieuxdist.dto.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupconso.dto.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupbesoins.dto.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/cet.qstprod.qstprod.producteurs.model.php');
$model = new QSTPRODProducteurModel();
$model->createProducteur(isset($_SESSION['signupgen.form']) ? unserialize($_SESSION['signupgen.form']) : NULL,
  isset($_SESSION['signupprods.form']) ? unserialize($_SESSION['signupprods.form']) : NULL,
  isset($_SESSION['signupconso.form']) ? unserialize($_SESSION['signupconso.form']) : NULL);



/** ***************************************************************************/

// Prepare navigation :
$nav = $dataProcessor->processHttpFormData($_POST['qstprod-signuprecap-nav']);
if ($nav != 'valider' && $nav != 'retour') { /*Error de navigation TODO.*/ $nav = 'retour'; }
$statut = $nav == 'valider' ? '' : 'signupbesoins.form';

// Apply navigation :
//header('Location: /?statut='.$statut.'&sitkn='.$cetcal_session_id);
//exit();
?>