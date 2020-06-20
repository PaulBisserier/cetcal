<?php 
include $_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.exceptions.php';  
$cetcal_session_id = "";
try 
{
  require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/utils/cet.qstprod.utils.httpdataprocessor.php');
  $dataProcessor = new HTTPDataProcessor();
  $nav = $dataProcessor->processHttpFormData($_POST['qstprod-signuprecap-nav']);
  if ($nav == 'valider')
  {
    // Prepare to read Session.
    $cetcal_session_id = $dataProcessor->processHttpFormData($_POST['cetcal_session_id']);
    session_id($cetcal_session_id);
    session_start();

    /** ***************************************************************************
     * Time to insert it all from SESSION to DB.
     */
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/cet.qstprod.producteurs.model.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/cet.qstprod.lieuxdist.model.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/cet.qstprod.produits.model.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/cet.qstprod.questionnaire.sondage.producteur.model.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/cet.qstprod.informations.model.php');

    $model = new QSTPRODProducteurModel();
    $data = $model->createProducteur(isset($_SESSION['signupgen.form']) ? $_SESSION['signupgen.form'] : NULL,
      isset($_SESSION['signupprods.form']) ? $_SESSION['signupprods.form'] : NULL,
      isset($_SESSION['signupconso.form']) ? $_SESSION['signupconso.form'] : NULL);
    /*$model = new QSTPRODLieuxModel();
    $model->createLieu($data['pk'], isset($_SESSION['signuplieuxdist.form']) ? $_SESSION['signuplieuxdist.form'] : NULL);
    $model = new QSTPRODProduitsModel();
    $model->createProduits($data['pk'], isset($_SESSION['signupprods.form']) ? $_SESSION['signupprods.form'] : NULL);
    $model = new QSTPRODSondageProducteurModel();
    $model->createSondages($data['pk'], isset($_SESSION['signupgen.form']) ? $_SESSION['signupgen.form'] : NULL);
    $model = new QSTPRODInformationsModel();
    $model->createInformations($data['pk'], isset($_SESSION['signupbesoins.form']) ? $_SESSION['signupbesoins.form'] : NULL);*/
    
    /** ***************************************************************************/
  }

  // Prepare navigation :
  if ($nav != 'valider' && $nav != 'retour') { /*Error de navigation TODO.*/ $nav = 'retour'; }
  $statut = $nav == 'valider' ? 'signupeffectue.form' : 'signupbesoins.form';

  // Apply navigation :
  header('Location: /?statut='.$statut.'&sitkn='.$cetcal_session_id.'&ev='.(isset($data['ev']) ? $data['ev'] : ""));
  exit();
}
catch (Exception $e) 
{
  header('Location: /src/app/controller/cet.qstprod.controller.generique.erreure.php/?err='.$e->getMessage().'&sitkn='.$cetcal_session_id);
  exit();
  var_dump($e);
}
?>