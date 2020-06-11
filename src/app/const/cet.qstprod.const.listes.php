<?php
/** 
 * Arrays contenant toutes les entrées pour alimenter radios boutons ou checkboxs dans 
 * la couche vue. Données chargées depuis $_SERVER['DOCUMENT_ROOT']/res/data/
 */
 Class CetQstprodConstListes
 {       
    public $fromages = NULL;
    public $fruits = NULL;
    public $legumes = NULL;
    public $fleurs = NULL;

    public $activites = NULL;
    public $besoins = NULL;
    public $type_culture = NULL;

    public $produits_frais = NULL;
    public $produits_secs = NULL;
    public $produits_boissons = NULL;
    public $produits_autres = NULL;

    public $recherche_fruits_legumes = NULL;

    public $points_vente_producteurs = NULL;
    public $solidaires_producteurs = NULL;
    public $solidaires_consomateurs = NULL;

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

    function __construct($fileReader)
    {
      $this->activites = $fileReader->read('cet.qstprod.liste.activites');
      $this->besoins = $fileReader->read('cet.qstprod.liste.besoins');
      $this->produits_frais = $fileReader->read('cet.qstprod.liste.produits.frais');
      $this->produits_secs = $fileReader->read('cet.qstprod.liste.produits.secs');
      $this->produits_boissons = $fileReader->read('cet.qstprod.liste.produits.boissons');
      $this->produits_autres = $fileReader->read('cet.qstprod.liste.produits.autres');
      $this->type_culture = $fileReader->read('cet.qstprod.liste.typeculture');
      $this->recherche_fruits_legumes = $fileReader->read('cet.qstprod.liste.fruitslegumes');
      $this->solidaires_producteurs = $fileReader->read('cet.qstprod.liste.solidarite.producteurs');
      $this->solidaires_consomateurs = $fileReader->read('cet.qstprod.liste.solidarite.consomateurs');
      $this->points_vente_producteurs = $fileReader->read('cet.qstprod.liste.pointdevente');
      
      $this->fruits = $fileReader->read('fruits');
      $this->fromages = $fileReader->read('fromages');
      $this->legumes = $fileReader->read('legumes');
      $this->fleurs = $fileReader->read('fleurs');

      $this->sondage_difficultes = $fileReader->read('cet.qstprod.liste.sondage.difficultes');
      $this->sondage_divers = $fileReader->readQAFile('cet.qstprod.liste.sondage.divers');
      $this->produits_v4_legumes = $fileReader->read('cet.qstprod.liste.produits.v4.legumes');
      $this->produits_v4_viandes = $fileReader->read('cet.qstprod.liste.produits.v4.viandes');
      $this->produits_v4_laitiers = $fileReader->read('cet.qstprod.liste.produits.v4.laitiers');
      $this->produits_v4_mielruche = $fileReader->read('cet.qstprod.liste.produits.v4.mielruche');
      $this->produits_v4_fruits = $fileReader->read('cet.qstprod.liste.produits.v4.fruits');
      $this->produits_v4_champignons = $fileReader->read('cet.qstprod.liste.produits.v4.champignons');
      $this->produits_v4_plantes = $fileReader->read('cet.qstprod.liste.produits.v4.plantes');
      $this->produits_v4_semences = $fileReader->read('cet.qstprod.liste.produits.v4.semences');
      $this->produits_v4_transformes = $fileReader->read('cet.qstprod.liste.produits.v4.transformes');
      $this->produits_v4_cereales = $fileReader->read('cet.qstprod.liste.produits.v4.cereales');
      $this->produits_v4_hygienes = $fileReader->read('cet.qstprod.liste.produits.v4.hygiene');
      $this->produits_v4_entretiens = $fileReader->read('cet.qstprod.liste.produits.v4.entretien');
      $this->produits_v4_animaux = $fileReader->read('cet.qstprod.liste.produits.v4.animaux');
    }
 }
 ?>