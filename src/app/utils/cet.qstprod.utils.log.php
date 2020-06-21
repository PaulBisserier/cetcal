<?php
Class CETLogUtils
{

  private $logpath;
  public $file;

  public function __construct($DOC_ROOT)
  {
    $now = getdate();
    $stamp = $now['mday']."-".$now['mon']."-".$now['year'];
    $this->logpath = $DOC_ROOT."/logs/cetcal.annuaire.".$stamp.".log";
    $logfile = $this->logpath;
    if (!file_exists($this->logpath)) 
    {
      $this->logpath = fopen($this->logpath, "w");
    } 
    $this->file = $logfile;
  }

}
?>