<?php
use PDO; 

/**
 *
 */
class CdcPDOConnector {

  private $DNS;
  private $LOG;
  private $PWD;

  function __construct() 
  {
    $this -> DNS = 'mysql:host=127.0.0.1;dbname=sicdc_openwifi;charset=utf8';
    $this -> LOG = 'root';
    $this -> PWD = 'root';
  }

  function getPdoConnexion() 
  {
    try
    {
      //!\ PDO with uft8 encoding is necessary.
      $pdo = new PDO(
        $this->DNS,
        $this->LOG,
        $this->PWD
      );
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_PERSISTENT, TRUE);
      
      return $pdo;
    }
    catch (PDOException $ex)
    { 
      die("SICDC - Connection failed : ".$ex -> getMessage()); 
    }
  }

}