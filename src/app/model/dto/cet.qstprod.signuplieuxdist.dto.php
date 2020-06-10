<?php
/** 
 * signuplieuxdist.form html form DTO.
 */
Class QstLieuxDistributionDTO
{

  public $lieuNom;
  public $lieuSaisie;
  public $jourLivraison;
  public $periodiciteLivraison;
  public $lid;

  function __construct($pLieuNom = "", $pLieuSaisie = "", $pJourLivraison = "", $pPeriodiciteLivraison = "",
    $pLid = "")
  {
    $this->lieuNom = $pLieuNom;
    $this->lieuSaisie = $pLieuSaisie;
    $this->jourLivraison= $pJourLivraison;
    $this->periodiciteLivraison = $pPeriodiciteLivraison;
    $this->lid = $pLid;
  }

}