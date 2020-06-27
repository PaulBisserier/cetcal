<?php

/**
 *
 */
class CnxDB {

	private $DNS;
	private $LOG;
	private $PWD;
	private $DEV_MODE = true;

	function __construct() {

		if ($this->DEV_MODE) 
		{
			$this -> DNS = '';
			$this -> LOG = 'root';
			$this -> PWD = '';
		} 
		else 
		{
			$this -> DNS = '';
			$this -> LOG = '';
			$this -> PWD = '';
		}
	}

	function getCnx() 
	{
		try
		{ 
			// PDO with uft8 encoding is necessary.
			$pdo = new PDO(
				$this -> DNS, $this -> LOG, $this -> PWD,
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
			);
			return $pdo;
		}
		catch (PDOException $ex)
		{ 
			die("Connection failed : ".$ex -> getMessage()); 
		}
	}
}