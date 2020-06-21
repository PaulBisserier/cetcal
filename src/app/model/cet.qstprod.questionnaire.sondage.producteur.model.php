<?php
require_once('cet.qstprod.model.php');
require_once('cet.qstprod.querylibrary.php');

/**
 * Abstract MODEL class.
 */
class QSTPRODSondageProducteurModel extends CETCALModel 
{
  
  public function createSondages($pPK, $pInfoGeneralesDto) 
  {
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupgen.dto.php');
    $dtoinfos = new QstProdGeneraleDTO();
    $dtoinfos = unserialize($pInfoGeneralesDto);
    
    foreach ($dtoinfos->sondageDifficultes as $difficulte) 
    {
      $qrsondage = explode(";", $difficulte);
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_SONDAGE);
      $stmt->bindParam(":pPkProducteur", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pClefQuestion", $qrsondage[0], PDO::PARAM_STR);
      $stmt->bindParam(":pReponse", $qrsondage[1], PDO::PARAM_STR);
      $stmt->execute();
    }

    foreach ($dtoinfos->sondage as $reponse) 
    {
      $qrsondage = explode(";", $reponse);
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_SONDAGE);
      $stmt->bindParam(":pPkProducteur", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pClefQuestion", $qrsondage[0], PDO::PARAM_STR);
      $stmt->bindParam(":pReponse", $qrsondage[1], PDO::PARAM_STR);
      $stmt->execute();
    }
  }

}