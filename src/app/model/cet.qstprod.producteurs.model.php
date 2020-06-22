<?php
require_once('cet.qstprod.model.php');
require_once('cet.qstprod.querylibrary.php');

/**
 * Abstract MODEL class.
 */
class QSTPRODProducteurModel extends CETCALModel 
{
  
  public function createProducteur($pProducteurDto, $pProduitsDto, $pConsoDto) 
  {
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupgen.dto.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupprods.dto.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupconso.dto.php');
    $nullClef= '0000';
    $dtoGenerale = new QstProdGeneraleDTO();
    $dtoGenerale = unserialize($pProducteurDto);
    $dtoProduits = new QstProduitDTO();
    $dtoProduits = unserialize($pProduitsDto);
    $dtoConsomation = new QstConsomateursDTO();
    $dtoConsomation = unserialize($pConsoDto);
    $ZERO_DECIMAL = "0";
    $surface_hect = empty(strval($dtoGenerale->surfaceHectTerres)) ? $ZERO_DECIMAL : strval($dtoGenerale->surfaceHectTerres);
    $surface_serre = empty(strval($dtoGenerale->surfaceHectSousSerre)) ? $ZERO_DECIMAL : strval($dtoGenerale->surfaceHectSousSerre);
    $nombre_tetes_betail = empty(strval($dtoGenerale->nbrTetesBetail)) ? $ZERO_DECIMAL : strval($dtoGenerale->nbrTetesBetail);
    $hectolitres_an = empty(strval($dtoGenerale->hectolitresParAn)) ? $ZERO_DECIMAL : strval($dtoGenerale->hectolitresParAn);

    $qLib = $this->getQuerylib();
    $stmt = $this->getCnxdb()->prepare($qLib::INSERT_QSTPROD_PRODUCTEUR);
    $stmt->bindParam(":pNom", $dtoGenerale->nom, PDO::PARAM_STR);
    $stmt->bindParam(":pPrenom", $dtoGenerale->prenom, PDO::PARAM_STR);
    $stmt->bindParam(":pEmail", $dtoGenerale->email, PDO::PARAM_STR);
    $stmt->bindParam(":pEmailBu", $dtoGenerale->email, PDO::PARAM_STR);
    $stmt->bindParam(":pMdpsha", $dtoGenerale->motdepasseMD5, PDO::PARAM_STR);
    $stmt->bindParam(":pTelfixe", $dtoGenerale->telfix, PDO::PARAM_STR);
    $stmt->bindParam(":pTelPort", $dtoGenerale->telport, PDO::PARAM_STR);
    $stmt->bindParam(":pNomFerme", $dtoGenerale->nomferme, PDO::PARAM_STR);
    $stmt->bindParam(":pSiret", $dtoGenerale->siret, PDO::PARAM_STR);
    $stmt->bindParam(":pAdrNumvoie", $dtoGenerale->adrNumvoie, PDO::PARAM_STR);
    $stmt->bindParam(":pAdrRue", $dtoGenerale->adrRue, PDO::PARAM_STR);
    $stmt->bindParam(":pAdrLieudit", $dtoGenerale->adrLieudit, PDO::PARAM_STR);
    $stmt->bindParam(":pAdrCommune", $dtoGenerale->adrCommune, PDO::PARAM_STR);
    $stmt->bindParam(":pAdrcp", $dtoGenerale->adrCodePostal, PDO::PARAM_STR);
    $stmt->bindParam(":pAdrCmpladr", $dtoGenerale->adrComplementAdr, PDO::PARAM_STR);
    $stmt->bindParam(":pPageFb", $dtoGenerale->pageFB, PDO::PARAM_STR);
    $stmt->bindParam(":pPageIg", $dtoGenerale->pageIG, PDO::PARAM_STR);
    $stmt->bindParam(":pPageTwitter", $dtoGenerale->pageTwitter, PDO::PARAM_STR);
    $stmt->bindParam(":pUrlWeb", $dtoGenerale->siteWebUrl, PDO::PARAM_STR);
    $stmt->bindParam(":pUrlBoutique", $dtoGenerale->boutiqueEnLigneUrl, PDO::PARAM_STR);
    $stmt->bindParam(":pOrgCertifBio", $dtoGenerale->organismeCertificateurBIO, PDO::PARAM_STR);
    $stmt->bindParam(":pSurfaceHectTerres", $surface_hect, PDO::PARAM_STR);
    $stmt->bindParam(":pSurfaceAresSerre", $surface_serre, PDO::PARAM_STR);
    $stmt->bindParam(":pNbrTetes", $nombre_tetes_betail, PDO::PARAM_STR);
    $stmt->bindParam(":pHLParAn", $hectolitres_an, PDO::PARAM_STR);
    $stmt->bindParam(":pGroupeCagette", $dtoGenerale->groupeCagette, PDO::PARAM_STR);
    $stmt->bindParam(":pIndentifiantCet", $dtoGenerale->identifiant_cet, PDO::PARAM_STR);
    $stmt->execute();
    $pk = $this->getCnxdb()->lastInsertId();

    foreach ($dtoGenerale->typeDeProduction as $type) 
    {
      $typeprod = explode(';', $type);
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_CETCAL_TYPEPRODUCTION);
      $stmt->bindParam(":pClef", $typeprod[0], PDO::PARAM_STR);
      $stmt->bindParam(":pVal", $typeprod[1], PDO::PARAM_STR);
      $stmt->bindParam(":pPkProducteur", $pk, PDO::PARAM_INT);
      $stmt->execute();
    }

    foreach ($dtoProduits->specificite as $spec)
    {
      $speci = explode(';', $spec);
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_CETCAL_SPECIFICITE_PRODUITS);
      $stmt->bindParam(":pClef", $speci[0], PDO::PARAM_STR);
      $stmt->bindParam(":pVal", $speci[1], PDO::PARAM_STR);
      $stmt->bindParam(":pPkProducteur", $pk, PDO::PARAM_INT);
      $stmt->execute();
    }
    if (strlen($dtoProduits->specificiteAutre) > 0) 
    {
      $nullClef = "0002";
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_CETCAL_SPECIFICITE_PRODUITS);
      $stmt->bindParam(":pClef", $nullClef, PDO::PARAM_STR);
      $stmt->bindParam(":pVal", $dtoProduits->specificiteAutre, PDO::PARAM_STR);
      $stmt->bindParam(":pPkProducteur", $pk, PDO::PARAM_INT);
      $stmt->execute();
    }

    foreach ($dtoConsomation->consoachats as $achat) 
    {
      $cachat = explode(';', $achat);
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_CETCAL_MODE_CONSO);
      $stmt->bindParam(":pClef", $cachat[0], PDO::PARAM_STR);
      $stmt->bindParam(":pVal", $cachat[1], PDO::PARAM_STR);
      $stmt->bindParam(":pPkProducteur", $pk, PDO::PARAM_INT);
      $stmt->execute();
    }
    if (strlen($dtoConsomation->consoachatsAutre) > 0) 
    {
      $nullClef = "c001";
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_CETCAL_MODE_CONSO);
      $stmt->bindParam(":pClef", $nullClef, PDO::PARAM_STR);
      $stmt->bindParam(":pVal", $dtoConsomation->consoachatsAutre, PDO::PARAM_STR);
      $stmt->bindParam(":pPkProducteur", $pk, PDO::PARAM_INT);
      $stmt->execute();
    }
    
    foreach ($dtoConsomation->paiments as $paiment) 
    {
      $cpaie = explode(';', $paiment);
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_CETCAL_MODE_CONSO);
      $stmt->bindParam(":pClef", $cpaie[0], PDO::PARAM_STR);
      $stmt->bindParam(":pVal", $cpaie[1], PDO::PARAM_STR);
      $stmt->bindParam(":pPkProducteur", $pk, PDO::PARAM_INT);
      $stmt->execute();
    }
    if (strlen($dtoConsomation->paimentAutre) > 0) 
    {
      $nullClef = "c003";
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_CETCAL_MODE_CONSO);
      $stmt->bindParam(":pClef", $nullClef, PDO::PARAM_STR);
      $stmt->bindParam(":pVal", $dtoConsomation->paimentAutre, PDO::PARAM_STR);
      $stmt->bindParam(":pPkProducteur", $pk, PDO::PARAM_INT);
      $stmt->execute();
    }

    foreach ($dtoConsomation->receptions as $recep)
    {
      $crecep = explode(';', $recep);
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_CETCAL_MODE_CONSO);
      $stmt->bindParam(":pClef", $crecep[0], PDO::PARAM_STR);
      $stmt->bindParam(":pVal", $crecep[1], PDO::PARAM_STR);
      $stmt->bindParam(":pPkProducteur", $pk, PDO::PARAM_INT);
      $stmt->execute();
    }
    if (strlen($dtoConsomation->receptionAutre) > 0) 
    {
      $nullClef = "c003";
      $stmt = $this->getCnxdb()->prepare($qLib::INSERT_CETCAL_MODE_CONSO);
      $stmt->bindParam(":pClef", $nullClef, PDO::PARAM_STR);
      $stmt->bindParam(":pVal", $dtoConsomation->receptionAutre, PDO::PARAM_STR);
      $stmt->bindParam(":pPkProducteur", $pk, PDO::PARAM_INT);
      $stmt->execute();
    }

    return array("pk" => $pk, "ev" => $dtoGenerale->email);
  }

  public function exists($pProducteurDto) 
  {
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/dto/cet.qstprod.signupgen.dto.php');
    $dtoGenerale = new QstProdGeneraleDTO();
    $dtoGenerale = unserialize($pProducteurDto);

    $qLib = $this->getQuerylib();
    $stmt = $this->getCnxdb()->prepare($qLib::SELECT_SIRET_PRODUCTEUR_PAR_SIRET);
    $stmt->execute(['pSiret' => $dtoGenerale->siret]);
    $data = $stmt->fetchAll();

    foreach ($data as $row) 
    {
      if (isset($row['siret']) && strcmp($row['siret'], $dtoGenerale->siret) === 0) return true;
    }
    return $false;
  }

}