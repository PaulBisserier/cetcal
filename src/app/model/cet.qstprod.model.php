<?php

/**
 * Abstract MODEL class.
 */
class CdcModel 
{

  /*
  * Connection returned by PDO.
  */
  private $cnxdb;

  /**
   * SQL query library.
   */
  private $querylib;
  
  function __construct() 
  {
    $this->setConnection();
    require_once('cdc.querylibrary.php');
    $this->querylib = new CdcQueryLibrary();
  }

  /*
   * 
   */
  private function setConnection() 
  {
    require_once('cdc.pdoconnector.php');
    $pdo = new CdcPDOConnector();
    $this->cnxdb = $pdo->getPdoConnexion();
  }

  public function closeCnxdb()
  {
    $this->cnxdb = null;
  }

  /*
   *
   */
  public function getCnxdb() 
  {
    return $this->cnxdb;
  }

  public function getQueryLib()
  {
    return $this->querylib;
  }

}