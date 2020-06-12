<?php
/** 
 * signupconso.form html form DTO.
 */
Class QstConsomateursDTO
{

  public $consoachats;
  public $consoachatsAutre;
  public $receptions;
  public $receptionAutre;
  public $paiments;
  public $paimentAutre;

  function __construct($pConsoachats = "", $pConsoachatsAutre = "",
    $pReceptions = "", $pReceptionAutre = "", $pPaiments = "", 
    $pPaimentAutre = "")
  {
    $this->consoachats = $pConsoachats;
    $this->consoachatsAutre = $pConsoachatsAutre;
    $this->receptions = $pReceptions;
    $this->receptionAutre = $pReceptionAutre;
    $this->paiments = $pPaiments;
    $this->paimentAutre = $pPaimentAutre;
  }

}