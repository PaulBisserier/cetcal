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
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_SONDAGE_DIFFICULTES);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pReponse", $difficulte, PDO::PARAM_STR);
      $stmt->execute();
    }

    $counter = 0;
    $cat = "";
    foreach ($dtoinfos->sondage as $reponse) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_SONDAGE);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $cat = "sondage_producteur_q".strval(++$counter);
      $stmt->bindParam(":pQuestion", $cat, PDO::PARAM_STR);
      $stmt->bindParam(":pReponse", $reponse, PDO::PARAM_STR);
      $stmt->execute();
    }
  }

}