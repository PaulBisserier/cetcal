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

    if (isset($dtoLieux->pointsDeVenteAutre) && strlen($dtoLieux->pointsDeVenteAutre) > 0) array_push($dtoLieux->pointsDeVente, $dtoLieux->pointsDeVenteAutre);
    foreach ($dtoLieux->pointsDeVente as $point) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_LIEUX);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pPointsDeVente", $point, PDO::PARAM_STR);
      $stmt->execute();
    }     
  }

}