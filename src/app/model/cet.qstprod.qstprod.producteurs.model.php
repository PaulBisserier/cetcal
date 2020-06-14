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
    $dtoGenerale = new QstProdGeneraleDTO();
    $dtoGenerale = unserialize($pProducteurDto);
    $typeProd = "";
    foreach ($dtoGenerale->typeDeProduction as $type) $typeProd = $typeProd."[".$type."]";
    $dtoProduits = new QstProduitDTO();
    $dtoProduits = unserialize($pProduitsDto);
    $specProduits = "";
    foreach ($dtoProduits->specificite as $spec) $specProduits = $specProduits."[".$spec."]";
    $specProduits = $specProduits.(strlen($dtoProduits->specificiteAutre) <= 0 ? "" : "[".$dtoProduits->specificiteAutre."]");
    $dtoConsomation = new QstConsomateursDTO();
    $dtoConsomation = unserialize($pConsoDto);
    $commandes = "";
    foreach ($dtoConsomation->consoachats as $achat) $commandes = $commandes."[".$achat."]";
    $commandes = $commandes.(
      strlen($dtoConsomation->consoachatsAutre) <= 0 ? "" : "[".$dtoConsomation->consoachatsAutre."]");
    $paimentsModes = "";
    foreach ($dtoConsomation->paiments as $paiment) $paimentsModes = $paimentsModes."[".$paiment."]";
    $paimentsModes = $paimentsModes.(strlen($dtoConsomation->paimentAutre) <= 0 ? "" : "[".$dtoConsomation->paimentAutre."]");
    $receps = "";
    foreach ($dtoConsomation->receptions as $recep) $receps = $receps."[".$recep."]";
    $receps = $receps.(strlen($dtoConsomation->receptionAutre) <= 0 ? "" : "[".$dtoConsomation->receptionAutre."]");

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
    $stmt->bindParam(":pTypesProduction", $typeProd, PDO::PARAM_STR);
    $stmt->bindParam(":pSurfaceHectTerres", strval($dtoGenerale->surfaceHectTerres), PDO::PARAM_STR);
    $stmt->bindParam(":pSurfaceAresSerre", strval($dtoGenerale->surfaceHectSousSerre), PDO::PARAM_STR);
    $stmt->bindParam(":pNbrTetes", strval($dtoGenerale->nbrTetesBetail), PDO::PARAM_STR);
    $stmt->bindParam(":pHLParAn", strval($dtoGenerale->hectolitresParAn), PDO::PARAM_STR);
    $stmt->bindParam(":pGroupeCagette", $dtoGenerale->groupeCagette, PDO::PARAM_STR);
    $stmt->bindParam(":pSpecificitesProductions", $specProduits, PDO::PARAM_STR);
    $stmt->bindParam(":pModesConsoCommandes", $commandes, PDO::PARAM_STR);
    $stmt->bindParam(":pModesConsoPaiments", $paimentsModes, PDO::PARAM_STR);
    $stmt->bindParam(":pModesConsoReceptions", $receps, PDO::PARAM_STR);

    $stmt->execute();

    return $this->getCnxdb()->lastInsertId();
  }

}