<?php
require_once('cet.qstprod.model.php');
require_once('cet.qstprod.querylibrary.php');

/**
 * Abstract MODEL class.
 */
class QSTPRODInformationsModel extends CETCALModel 
{
  
  public function createInformations($pPK, $pBesoinsDto) 
  {
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupbesoins.dto.php');
    $dtoBesoins = new QstBesoinsDTO();
    $dtoBesoins = unserialize($pBesoinsDto);
    
    if (isset($dtoBesoins->reseauxSolidariteAutre) && strlen($dtoBesoins->reseauxSolidariteAutre) > 0) array_push($dtoBesoins->reseauxSolidarite, $dtoBesoins->reseauxSolidariteAutre);
    $cat = 'réseaux et solidarité';
    foreach ($dtoBesoins->reseauxSolidarite as $ressol) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_INFORMATION);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pK", $cat, PDO::PARAM_STR);
      $stmt->bindParam(":pV", $ressol, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoBesoins->actionBesoinAutre) && strlen($dtoBesoins->actionBesoinAutre) > 0) array_push($dtoBesoins->actionsBesoins, $dtoBesoins->actionBesoinAutre);
    $cat = 'actions et besoins';
    foreach ($dtoBesoins->actionsBesoins as $actbesoin) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_INFORMATION);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pK", $cat, PDO::PARAM_STR);
      $stmt->bindParam(":pV", $actbesoin, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoBesoins->groupeReflexionAutre) && strlen($dtoBesoins->groupeReflexionAutre) > 0) array_push($dtoBesoins->groupesReflexion, $dtoBesoins->groupeReflexionAutre);
    $cat = 'groupe réflexion';
    foreach ($dtoBesoins->groupesReflexion as $grpreflx) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_INFORMATION);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pK", $cat, PDO::PARAM_STR);
      $stmt->bindParam(":pV", $grpreflx, PDO::PARAM_STR);
      $stmt->execute();
    }

    $cat = 'souhaite participer groupe réflexion';
    if (isset($dtoBesoins->souhaiteParticiper) && strlen($dtoBesoins->souhaiteParticiper) > 0) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_INFORMATION);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pK", $cat, PDO::PARAM_STR);
      $stmt->bindParam(":pV", $dtoBesoins->souhaiteParticiper, PDO::PARAM_STR);
      $stmt->execute();
    }

  }

}