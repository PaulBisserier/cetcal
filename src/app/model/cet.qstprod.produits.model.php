<?php
require_once('cet.qstprod.model.php');
require_once('cet.qstprod.querylibrary.php');

/**
 * Abstract MODEL class.
 */
class QSTPRODProduitsModel extends CETCALModel 
{
  
  public function createProduits($pPK, $pProduitsDto) 
  {
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupprods.dto.php');
    $dtoproduits = new QstProduitDTO();
    $dtoproduits = unserialize($pProduitsDto);
    
    if (isset($dtoproduits->legumeAutre) && strlen($dtoproduits->legumeAutre) > 0) array_push($dtoproduits->legumes, $dtoproduits->legumeAutre);
    $cat = "legume";
    foreach ($dtoproduits->legumes as $legume) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $legume, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoproduits->vianndeAutre) && strlen($dtoproduits->viandeAutre) > 0) array_push($dtoproduits->viandes, $dtoproduits->viandeAutre);
    $cat = "viande";
    foreach ($dtoproduits->viandes as $viande) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $viande, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoproduits->laitierAutre) && strlen($dtoproduits->laitierAutre) > 0) array_push($dtoproduits->laitiers, $dtoproduits->laitierAutre);
    $cat = "laitier";
    foreach ($dtoproduits->laitiers as $laitier) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $laitier, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoproduits->rucheAutre) && strlen($dtoproduits->rucheAutre) > 0) array_push($dtoproduits->ruches, $dtoproduits->rucheAutre);
    $cat = "ruche";
    foreach ($dtoproduits->ruches as $ruche) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $ruche, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoproduits->fruitAutre) && strlen($dtoproduits->fruitAutre) > 0) array_push($dtoproduits->fruits, $dtoproduits->fruitAutre);
    $cat = "fruit";
    foreach ($dtoproduits->fruits as $fruit) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $fruit, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoproduits->champignonAutre) && strlen($dtoproduits->champignonAutre) > 0) array_push($dtoproduits->champignons, $dtoproduits->champignonAutre);
    $cat = "champignon";
    foreach ($dtoproduits->champignons as $champignon) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $champignon, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoproduits->planteAutre) && strlen($dtoproduits->planteAutre) > 0) array_push($dtoproduits->plantes, $dtoproduits->planteAutre);
    $cat = "plante";
    foreach ($dtoproduits->plantes as $plante) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $plante, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoproduits->semenceAutre) && strlen($dtoproduits->semenceAutre) > 0) array_push($dtoproduits->semences, $dtoproduits->semenceAutre);
    $cat = "semence";
    foreach ($dtoproduits->semences as $semence) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $semence, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoproduits->transformeAutre) && strlen($dtoproduits->transformeAutre) > 0) array_push($dtoproduits->transformes, $dtoproduits->transformeAutre);
    $cat = "transforme";
    foreach ($dtoproduits->transformes as $transforme) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $transforme, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoproduits->cerealeAutre) && strlen($dtoproduits->cerealeAutre) > 0) array_push($dtoproduits->cereales, $dtoproduits->cerealeAutre);
    $cat = "cereal";
    foreach ($dtoproduits->cereales as $cereale) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $cereale, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoproduits->hygieneAutre) && strlen($dtoproduits->hygieneAutre) > 0) array_push($dtoproduits->hygienes, $dtoproduits->hygieneAutre);
    $cat = "hygiene";
    foreach ($dtoproduits->hygienes as $hygiene) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $hygiene, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoproduits->entretienAutre) && strlen($dtoproduits->entretienAutre) > 0) array_push($dtoproduits->entretiens, $dtoproduits->entretienAutre);
    $cat = "entretien";
    foreach ($dtoproduits->entretiens as $entretien) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $entretien, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    if (isset($dtoproduits->nourritureAnimauxAutre) && strlen($dtoproduits->nourritureAnimauxAutre) > 0) array_push($dtoproduits->nourritureAnimaux, $dtoproduits->nourritureAnimauxAutre);
    $cat = "nourriture animaux";
    foreach ($dtoproduits->nourritureAnimaux as $naniamux) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $naniamux, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

    $cat = "autre";
    if (isset($dtoproduits->autreProduitInconnu) && strlen($dtoproduits->autreProduitInconnu) > 0) 
    {
      $qLib = $this->getQuerylib();
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUIT);
      $stmt->bindParam(":pFk", $pPK, PDO::PARAM_INT);
      $stmt->bindParam(":pNomProduit", $dtoproduits->autreProduitInconnu, PDO::PARAM_STR);
      $stmt->bindParam(":pCategorie", $cat, PDO::PARAM_STR);
      $stmt->execute();
    }

  }

}