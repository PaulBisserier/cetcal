<?php
/** 
 * signupprods.form html form DTO.
 */
Class QstProduitDTO
{

  public $produitNom;
  public $produitType;
  public $produitDateDebut;
  public $produitDateFin;
  public $produitAnneesExperience;
  public $produitAupresConsomateurs;
  public $pid;

  function __construct($pProduitNom = "", $pProduitType = "", $pProduitDateDebut = "", $pProduitDateFin = "", $pProduitAnneesExperience = "", $pProduitAupresConsomateurs = "", $pPid = "")
  {
    $this->produitNom = $pProduitNom;
    $this->produitType = $pProduitType;
    $this->produitDateDebut = $pProduitDateDebut;
    $this->produitDateFin = $pProduitDateFin;
    $this->produitAnneesExperience = $pProduitAnneesExperience;
    $this->produitAupresConsomateurs = $pProduitAupresConsomateurs;
    $this->pid = $pPid;
  }

}