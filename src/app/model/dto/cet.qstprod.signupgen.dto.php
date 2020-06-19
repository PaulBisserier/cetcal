<?php
/** 
 * signupgen.form html form DTO.
 */
Class QstProdGeneraleDTO
{

  public $nom;
  public $prenom;
  public $email;
  public $motdepasseMD5;
  public $telfix;
  public $telport;
  public $nomferme;
  public $siret;
  public $adrNumvoie;
  public $adrRue;
  public $adrLieudit;
  public $adrCommune;
  public $adrCodePostal;
  public $adrComplementAdr;
  public $pageFB;
  public $pageIG;
  public $pageTwitter;
  public $siteWebUrl;
  public $boutiqueEnLigneUrl;
  public $organismeCertificateurBIO;
  public $typeDeProduction;
  public $surfaceHectTerres;
  public $surfaceHectSousSerre;
  public $nbrTetesBetail;
  public $hectolitresParAn;
  public $sondageDifficultes;
  public $sondage;
  public $groupeCagette;
  public $identifiant_cet;

  function __construct($pNom = "", $pPrenom = "", $pEmail = "", $pMotDePasseMD5 = "", $pTelFix = "", 
    $pTelPort = "", $pNomFerme = "", $pSiret = "", $pAdrNumvoie = "", $pAdrRue = "", $pAdrLieudit = "", 
    $pAdrCommune = "", $pAdrCodePostal = "", $pAdrComplementAdr = "", $pPageFB = "", $pPageIG = "", 
    $pPageTwitter = "", $pPUrlWeb = "", $pUrlBoutiqueWww = "", $pOrgCertifBIO = "", $pTypeProd = "", 
    $pSurfaceHTerres = 0, $pSurfaceHSerre = 0, $pNbrTetesBetail = 0, $pHectolitresParAn = 0,
    $pSondageDifficultes = "", $pSondage = "", $pGroupeCagette = "", $pIdentifiant_cet= "")
  {
      $this->nom = $pNom;
      $this->prenom = $pPrenom;
      $this->email = $pEmail;
      $this->motdepasseMD5 = $pMotDePasseMD5;
      $this->telfix = $pTelFix;
      $this->telport = $pTelPort;
      $this->nomferme = $pNomFerme;
      $this->siret = $pSiret;
      $this->adrNumvoie = $pAdrNumvoie;
      $this->adrRue = $pAdrRue;
      $this->adrLieudit = $pAdrLieudit;
      $this->adrCommune = $pAdrCommune;
      $this->adrCodePostal = $pAdrCodePostal;
      $this->adrComplementAdr = $pAdrComplementAdr;
      $this->pageFB = $pPageFB;
      $this->pageIG = $pPageIG;
      $this->pageTwitter = $pPageTwitter;
      $this->siteWebUrl = $pPUrlWeb;
      $this->boutiqueEnLigneUrl = $pUrlBoutiqueWww;
      $this->organismeCertificateurBIO = $pOrgCertifBIO;
      $this->typeDeProduction = $pTypeProd;
      $this->surfaceHectTerres = $pSurfaceHTerres;
      $this->surfaceHectSousSerre = $pSurfaceHSerre;
      $this->nbrTetesBetail = $pNbrTetesBetail;
      $this->hectolitresParAn = $pHectolitresParAn;
      $this->sondageDifficultes = $pSondageDifficultes;
      $this->sondage = $pSondage;
      $this->groupeCagette = $pGroupeCagette;
      $this->identifiant_cet = $pIdentifiant_cet;
  }  

}
?>