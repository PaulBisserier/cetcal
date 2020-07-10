<?php
require_once('cet.qstprod.model.php');
require_once('cet.qstprod.querylibrary.php');

/**
 * MODEL class.
 */
class CETCALEntitesModel extends CETCALModel 
{

  public function insert($csvlines)
  {
      /**
       * CSV splitter = ¤.
       * CSV definition : 
       Associations/distributeurs;territoire;Activité;adresse;tel;Contacts;Email;site internet;adresse distribution paniers ou commandes;jour/horaire;  éthique produits fournis
       */
      foreach ($csvlines as $csvline)
      {
        $data = explode("¤", $csvline);
        if (!is_array($data) || count($data) !== 11) continue;
        
        for ($i=0; $i < count($data); $i++) 
        { 
          if (!is_string($data[$i])) $data[$i] = '';
          if (is_string($data[$i]) && $data[$i] == 'null') $data[$i] = '';
        } 

        $denomination = $data[0];
        $territoire = $data[1];
        $activite = $data[2];
        $adr = $data[3];
        $tels = $data[4];
        $personne = $data[5];
        $email = $data[6];
        $urlwww = $data[7];
        $infoscmd = $data[8];
        $jourh = $data[9];
        $specificite = $data[10];

        /**
         * uncoment for use.
        $qLib = $this->getQuerylib();
        $stmt = $this->getCnxdb()->prepare($qLib::INSERT_INTO_CETCAL_ENTITES);
        $stmt->bindParam(":pDenomination", $denomination, PDO::PARAM_STR);
        $stmt->bindParam(":pTerritoire", $territoire, PDO::PARAM_STR);
        $stmt->bindParam(":pActivite", $activite, PDO::PARAM_STR);
        $stmt->bindParam(":pAdrliterale", $adr, PDO::PARAM_STR);
        $stmt->bindParam(":pTels", $tels, PDO::PARAM_STR);
        $stmt->bindParam(":pContactPersonne", $personne, PDO::PARAM_STR);
        $stmt->bindParam(":pEmail", $email, PDO::PARAM_STR);
        $stmt->bindParam(":pUrlwww", $urlwww, PDO::PARAM_STR);
        $stmt->bindParam(":pInfoCommande", $infoscmd, PDO::PARAM_STR);
        $stmt->bindParam(":pJourHoraire", $jourh, PDO::PARAM_STR);
        $stmt->bindParam(":pSpecificite", $specificite, PDO::PARAM_STR);
        $stmt->execute();
        */
      }
  }

}