<?php
require_once('cet.qstprod.model.php');
require_once('cet.qstprod.querylibrary.php');

/**
 * Abstract MODEL class.
 */
class QSTPRODLieuxModel extends CETCALModel 
{
  
  public function createLieu($pPK, $pLieuDto) 
  {
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signuplieuxdist.dto.php');
    $dtoLieux = new QstLieuxDistributionDTO();
    $dtoLieux = unserialize($pLieuDto);
    $null = "";
    $pks_lieux = array();

    foreach ($dtoLieux->pointsDeVente as $point) 
    {
      $pointvente = explode(';', $point);
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_CETCAL_LIEU);
      $stmt->bindParam(":pNom", $pointvente[1], PDO::PARAM_STR);
      $stmt->bindParam(":pAdrLit", $null, PDO::PARAM_STR);
      $stmt->bindParam(":pJoursProducteur", $null, PDO::PARAM_STR);
      $stmt->bindParam(":pJourCollecteConso", $null, PDO::PARAM_STR);
      $stmt->execute();
      array_push($pks_lieux, $this->getCnxdb()->lastInsertId());
    }     

    if (strlen($dtoLieux->pointsDeVenteAutre) > 0) 
    {
      $nullClef = "0003";
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_CETCAL_LIEU);
      $stmt->bindParam(":pNom", $dtoLieux->pointsDeVenteAutre, PDO::PARAM_STR);
      $stmt->bindParam(":pAdrLit", $null, PDO::PARAM_STR);
      $stmt->bindParam(":pJoursProducteur", $null, PDO::PARAM_STR);
      $stmt->bindParam(":pJourCollecteConso", $null, PDO::PARAM_STR);
      $stmt->execute();
      array_push($pks_lieux, $this->getCnxdb()->lastInsertId());
    }

    foreach ($pks_lieux as $pklieu)
    {
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_PRODUCTEUR_JOIN_LIEU);
      $stmt->bindParam(":pFkProducteur", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pFkLieu", $pklieu, PDO::PARAM_INT);
      $stmt->execute();
    }
  }

}