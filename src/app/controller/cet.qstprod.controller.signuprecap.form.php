<?php 
// Prepare to read Session.
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.httpdataprocessor.php');
$dataProcessor = new HTTPDataProcessor();
$cetcal_session_id = $dataProcessor->processHttpFormData($_POST['cetcal_session_id']);
session_id($cetcal_session_id);
session_start();

/** ***************************************************************************
 * Time to insert it all from SESSION to DB.
 *
require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/cet.qstprod.qstprod.producteurs.model.php');
$model = new QSTPRODProducteurModel();
$data = $model->createProducteur(isset($_SESSION['signupgen.form']) ? $_SESSION['signupgen.form'] : NULL,
  isset($_SESSION['signupprods.form']) ? $_SESSION['signupprods.form'] : NULL,
  isset($_SESSION['signupconso.form']) ? $_SESSION['signupconso.form'] : NULL);

require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/cet.qstprod.qstprod.lieuxdist.model.php');
$model = new QSTPRODLieuxModel();
$model->createLieu($data['pk'], isset($_SESSION['signuplieuxdist.form']) ? $_SESSION['signuplieuxdist.form'] : NULL);
// Do the same for Produits, sondage, information prod.
** ***************************************************************************/

// Prepare navigation :
$nav = $dataProcessor->processHttpFormData($_POST['qstprod-signuprecap-nav']);
if ($nav != 'valider' && $nav != 'retour') { /*Error de navigation TODO.*/ $nav = 'retour'; }
$statut = $nav == 'valider' ? 'signupeffectue.form' : 'signupbesoins.form';

// Apply navigation :
header('Location: /?statut='.$statut.'&sitkn='.$cetcal_session_id.'&ev='.(isset($data['ev']) ? $data['ev'] : ""));
exit();
?>