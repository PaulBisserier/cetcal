<?php
/** 
 * Arrays contenant toutes les entrées pour alimenter radios boutons ou checkboxs dans 
 * la couche vue. Données chargées depuis $_SERVER['DOCUMENT_ROOT']/res/data/
 */
 Class CetQstprodConstListes
 {       
    //public $fromages = NULL;
    //public $fruits = NULL;
    //public $legumes = NULL;
    //public $fleurs = NULL;

    public $activites = NULL;
    public $besoins = NULL;
    public $type_culture = NULL;

    //public $produits_frais = NULL;
    //public $produits_secs = NULL;
    public $produits_boissons = NULL;
    //public $produits_autres = NULL;

    //public $recherche_fruits_legumes = NULL;

    public $points_vente_producteurs = NULL;
    public $solidaires_producteurs = NULL;
    public $solidaires_consomateurs = NULL;
    public $solidaires_actions = NULL;
    public $solidaires_groupe_resilience = NULL;

    public $sondage_difficultes = NULL;
    public $sondage_divers = NULL;

    public $produits_v4_legumes = NULL;
    public $produits_v4_viandes = NULL;
    public $produits_v4_laitiers = NULL;
    public $produits_v4_mielruche = NULL;
    public $produits_v4_fruits = NULL;
    public $produits_v4_champignons = NULL;
    public $produits_v4_plantes = NULL;
    public $produits_v4_semences = NULL;
    public $produits_v4_transformes = NULL;
    public $produits_v4_cereales = NULL;
    public $produits_v4_hygienes = NULL;
    public $produits_v4_entretiens = NULL;
    public $produits_v4_animaux = NULL;

    public $consomateurs_achats = NULL;
    public $consomateurs_receptions = NULL;
    public $consomateurs_paiements = NULL;
    public $consomateurs_drive_jours = NULL;

    function __construct($fileReader)
    {      
      $this->activites = $fileReader->readWithKV('cet.qstprod.liste.activites');
      $this->besoins = $fileReader->read('cet.qstprod.liste.besoins');
      //$this->produits_frais = $fileReader->read('cet.qstprod.liste.produits.frais');
      //$this->produits_secs = $fileReader->read('cet.qstprod.liste.produits.secs');
      $this->produits_boissons = $fileReader->readWithKV('cet.qstprod.liste.produits.boissons');
      //$this->produits_autres = $fileReader->read('cet.qstprod.liste.produits.autres');
      $this->type_culture = $fileReader->readWithKV('cet.qstprod.liste.typeculture');
      //$this->recherche_fruits_legumes = $fileReader->read('cet.qstprod.liste.fruitslegumes');
      $this->solidaires_producteurs = $fileReader->readWithKV('cet.qstprod.liste.solidarite.producteurs');
      $this->solidaires_consomateurs = $fileReader->readWithKV('cet.qstprod.liste.solidarite.consomateurs');
      $this->solidaires_actions = $fileReader->readWithKV('cet.qstprod.liste.solidarite.actions');
      $this->solidaires_groupe_resilience = $fileReader->readWithKV('cet.qstprod.liste.groupe.resilience');

      $this->points_vente_producteurs = $fileReader->readWithKV('cet.qstprod.liste.pointdevente');
      
      /*$this->fruits = $fileReader->read('fruits');
      $this->fromages = $fileReader->read('fromages');
      $this->legumes = $fileReader->read('legumes');
      $this->fleurs = $fileReader->read('fleurs');*/

      $this->sondage_difficultes = $fileReader->readWithKV('cet.qstprod.liste.sondage.difficultes');
      $this->sondage_divers = $fileReader->readQAFile('cet.qstprod.liste.sondage.divers');
      $this->produits_v4_legumes = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.legumes');
      $this->produits_v4_viandes = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.viandes');
      $this->produits_v4_laitiers = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.laitiers');
      $this->produits_v4_mielruche = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.mielruche');
      $this->produits_v4_fruits = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.fruits');
      $this->produits_v4_champignons = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.champignons');
      $this->produits_v4_plantes = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.plantes');
      $this->produits_v4_semences = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.semences');
      $this->produits_v4_transformes = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.transformes');
      $this->produits_v4_cereales = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.cereales');
      $this->produits_v4_hygienes = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.hygiene');
      $this->produits_v4_entretiens = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.entretien');
      $this->produits_v4_animaux = $fileReader->readWithKV('cet.qstprod.liste.produits.v4.animaux');
      $this->consomateurs_achats = $fileReader->readWithKV('cet.qstprod.liste.v4.consoachats');
      $this->consomateurs_receptions = $fileReader->readWithKV('cet.qstprod.liste.v4.consoreception');
      $this->consomateurs_paiements = $fileReader->readWithKV('cet.qstprod.liste.v4.consopaiements');
      $this->consomateurs_drive_jours = $fileReader->readWithKV('cet.qstprod.liste.jourssemaine');

      error_log(CET_LOG::TAG."files loaded today}", 3, $LOG_FILE);
    }
 }
 ?>