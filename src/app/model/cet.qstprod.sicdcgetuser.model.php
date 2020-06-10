<?php
require_once('cdc.model.php');
require_once('cdc.querylibrary.php');

/**
 * 
 */
class SiCdcGetUser extends CdcModel
{
  
  public function getUser($email, $motdepasse)
  {
    $data = $this->getUserByEmail($email); 
    $this->closeCnxdb();
    return $data;
  }

  public function getUserByEmail($email) 
  {
    $qLib = $this->getQuerylib();
    $stmt = $this->getCnxdb()->prepare($qLib::GET_USER_BY_EMAIL);
    $stmt->bindParam(":pEmail", $email, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  private function getUserByPhoneNumber($phoneNumber)
  {

  }

  private function getUserByRefKey($refkey)
  {

  }

}