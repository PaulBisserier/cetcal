<?php
/** 
 * signupprods.form html form DTO.
 */
Class QstProduitDTO
{

  public $specificite;
  public $specificiteAutre;
  public $legumes;
  public $legumeAutre;
  public $viandes;
  public $viandeAutre;
  public $laitiers;
  public $laitierAutre;
  public $ruches;
  public $rucheAutre;
  public $fruits;
  public $fruitAutre;
  public $champignons;
  public $champignonAutre;
  public $plantes;
  public $planteAutre;
  public $semences;
  public $semenceAutre;
  public $transformes;
  public $transformeAutre;
  public $cereales;
  public $cerealeAutre;
  public $hygienes;
  public $hygieneAutre;
  public $entretiens;
  public $entretienAutre;
  public $nourritureAnimaux;
  public $nourritureAnimauxAutre;
  public $autreProduitInconnu;

  function __construct($pSpecificite = "", $pSpecificiteAutre = "", 
    $pLegumes = "", $pLegumeAutre = "", $pViandes = "",
    $pViandeAutre, $pLaitiers = "", $pLaitiersAutre = "", $pRuches = "",
    $pRucheAutre = "", $pFruits = "", $pFruitAutre = "",
    $pChampignons = "", $pChampignonAutre = "", $pPlantes = "", $pPlanteAutre = "",
    $pSemences = "", $pSemenceAutre = "", $pTransformes = "", $pTransformeAutre = "",
    $pCereales = "", $pCerealeAutre = "", $pHygienes = "", $pHygieneAutre = "",
    $pEntretiens = "", $pEntretienAutre = "", $pNourritureAnimaux = "", 
    $pNourritureAnimauxAutre = "", $pAutreInconnu = "")
  {
    $this->specificite = $pSpecificite;
    $this->specificiteAutre = $pSpecificiteAutre;
    $this->legumes = $pLegumes;
    $this->legumeAutre = $pLegumeAutre;
    $this->viandes = $pViandes;
    $this->viandeAutre = $pViandeAutre;
    $this->laitiers = $pLaitiers;
    $this->laitierAutre = $pLaitiersAutre;
    $this->ruches = $pRuches;
    $this->rucheAutre = $pRucheAutre;
    $this->fruits = $pFruits;
    $this->fruitAutre = $pFruitAutre;
    $this->champignons = $pChampignons;
    $this->champignonAutre = $pChampignonAutre;
    $this->plantes = $pPlantes;
    $this->pPlanteAutre = $pPlanteAutre;
    $this->semences = $pSemences;
    $this->semenceAutre = $pSemenceAutre;
    $this->transformes = $pTransformes;
    $this->transformeAutre = $pTransformeAutre;
    $this->cereales = $pCereales;
    $this->cerealeAutre =$pCerealeAutre;
    $this->hygienes = $pHygienes;
    $this->hygieneAutre = $pHygieneAutre;
    $this->entretiens = $pEntretiens;
    $this->entretienAutre = $pEntretienAutre;
    $this->nourritureAnimaux = $pNourritureAnimaux;
    $this->nourritureAnimauxAutre = $pNourritureAnimauxAutre;
    $this->autreProduitInconnu = $pAutreInconnu;
  }

}