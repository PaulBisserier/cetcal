 <?php
Class FileReaderUtils
{
  private $PHP_FILES_PATH = "/res/data/";
  private $doc_root = "";
  public $temp = NULL;

  function __construct($DOC_ROOT) 
  {
    $this->doc_root = $DOC_ROOT;
  }

  public function read($fileName)
  {
    if (file_exists($this->doc_root.$this->PHP_FILES_PATH.$fileName))
    {
      $this->temp = array();
      $file = fopen($this->doc_root.$this->PHP_FILES_PATH.$fileName, "r");
      while(!feof($file)) array_push($this->temp, trim(fgets($file)));
      fclose($file);
      return $this->temp;
    }
  }

  public function readQAFile($fileName)
  {
    if (file_exists($this->doc_root.$this->PHP_FILES_PATH.$fileName))
    {
      $a = [];
      $q = true;
      $tmp = "";
      $this->temp = array();
      $file = fopen($this->doc_root.$this->PHP_FILES_PATH.$fileName, "r");
      while(!feof($file)) 
      {
        $tmp = trim(fgets($file));
        array_push($a, substr($tmp, 1, strlen($tmp) - 1));

        if (substr($tmp, 0, 1) == "#") 
        {
          array_push($this->temp, $a); 
          $a = [];      
        }
      }
      
      fclose($file);
      return $this->temp;
    }
  }
}
?> 