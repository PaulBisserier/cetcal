<?php
Class HTTPDataProcessor 
{

  /**
   * Contains all error messages.
   */
  private $errors = Array();

  public function __construct()
  {}

  /**
   * Control/check input. When data is unset, appends to error message array for View layer purposes.
   * param0  : the data to check.
   * param1  : the label to add to a generic Error (thrown to code using this).
   * returns : the param0 data processed and safe for database.
   */
  public function processHttpFormData($data)
  {
    if (!isset($data)) array_push($this->errors, "Le champ /// est obligatoire et n'est pas renseigné.");
    else return htmlspecialchars($data);
  }

  public function processHttpFormArrayData($array)
  {
    $data = [];
    return !isset($array) || !is_array($array) || count($array) < 1 ? $data : $array;
  }

  public function scanForErrors()
  {
    if (count($this->errors) > 0) 
    {
      // Prepare to sendback to View layers.
    }
  }

}
?>