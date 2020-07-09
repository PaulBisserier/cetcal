<?php
/**
 * 
 */
class CETCALCartographieController
{

  function __construct() { }

  public function fetchDataCartographie() 
  {
    $result = array();
    require_once($_SERVER['DOCUMENT_ROOT'].'/src/app/model/cet.qstprod.producteurs.model.php');
    $model = new QSTPRODProducteurModel();
    $result = $model->fetchAllDataToDTOArray();

    return $result;
  }

}