<?php
/** 
 * signuplieuxdist.form html form DTO.
 */
Class QstLieuxDistributionDTO
{

  public $pointsDeVente;
  public $pointsDeVenteAutre;
  public $marcheAdr;
  public $marcheJours;

  function __construct($pPointDeVente = "", $pPointsDeVenteAutre = "", $pMarcheAdr = "",
    $pMarcheJours = "")
  {
    $this->pointsDeVente = $pPointDeVente;
    $this->pointsDeVenteAutre = $pPointsDeVenteAutre;
    $this->marcheAdr = $pMarcheAdr;
    $this->marcheJours = $pMarcheJours;
  }

}