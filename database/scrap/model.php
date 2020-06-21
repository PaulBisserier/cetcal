<?php

/**
 * Abstract MODEL class.
 */
class Model 
{

	/*
	* Connection returned by PDO.
	*/
	private $cnxdb;
	
	/*
	*
	*/
	private $querylib;

	function __construct() 
	{
		require_once('../../const/querylib.php');
		$this->querylib = new QueryLib();
		$this->setConnection();
	}

	/*
	 * 
	 */
	function setConnection() 
	{
		require_once('cnx.php');
		$cnx = new CnxDB();
		$this->cnxdb = $cnx->getCnx();
		$this->cnxdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function getFirstId($table) 
	{
		$qLib = $this->getQuerylib();
		$stmt = $this->getCnxdb()->prepare($qLib::GET_FIRST_ID);
		$stmt->bindParam(":pTable", $table, PDO::PARAM_STR);
		return $stmt->fetch();
	}

	public function getIds($table) 
	{
		$qLib = $this->getQuerylib();
		$stmt = $this->getCnxdb()->prepare($qLib::GET_IDS);
        $stmt->execute();
        $result = $stmt->fetchAll();
		return $result;
	}

	public function insertError($clientIP, $pk, $page, $httpErrCode = "404")
	{
		$date = new DateTime();
		$dateTimeStamp = $date->format('Y-m-d H:i:s');
		$qLib = $this->getQuerylib();
        $stmt = $this->getCnxdb()->prepare($qLib::INSERT_ERROR);
        $stmt->bindParam(":pPk", $pk, PDO::PARAM_STR); // TODO str length.
        $stmt->bindParam(":pClientIP", $clientIP, PDO::PARAM_STR);
        $stmt->bindParam(":pPage", $page, PDO::PARAM_STR);
        $stmt->bindParam(":pDateTime", $dateTimeStamp, PDO::PARAM_STR);
        $stmt->bindParam(":pHttpError", $httpErrCode, PDO::PARAM_STR);
        $stmt->execute();
	}

	function getCnxdb() 
	{
		return $this->cnxdb;
	}

	function getQuerylib() 
	{
		return $this->querylib;
	}

}