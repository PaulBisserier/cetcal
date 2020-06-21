<?php
/** 
 * signuplieuxdist.form html form DTO.
 */
Class QstLieuxDistributionDTO
{

  public $pointsDeVente;
  public $pointsDeVenteAutre;

  function __construct($pPointDeVente = "", $pPointsDeVenteAutre = "")
  {
    $this->pointsDeVente = $pPointDeVente;
    $this->pointsDeVenteAutre = $pPointsDeVenteAutre;
  }

}