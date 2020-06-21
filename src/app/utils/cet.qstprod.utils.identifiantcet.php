 <?php
Class IdentifiantCETHelper
{

  public $identifiant;

  function __construct($pEmail, $pTelFixe, $pTelMobil, $pSiret) 
  {
    $this->identifiant = $this->generateId($pEmail, $pTelFixe, $pTelMobil, $pSiret);
  }

  private function generateId($pEmail, $pTelFixe, $pTelMobil, $pSiret)
  {
    if (isset($pEmail) && strlen($pEmail) > 0) return $pEmail;
    else if (isset($pSiret) && strlen($pSiret) == 14) return $pSiret;
    else if (isset($pTelMobil) && strlen($pTelMobil) >= 10) return $pTelMobil;
    else if (isset($pTelFixe) && strlen($pTelFixe) >= 10) return $pTelFixe;
    else throw new Exception("Il nous est impossible de generer un identifiant de connexion car ni l'email, le siret, le numero de telephone mobile ou fixe ne sont renseignes.");
  }

}