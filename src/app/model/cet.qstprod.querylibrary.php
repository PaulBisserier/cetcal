<?php

/**
 * Sql query's.
 */
class CETCALQueryLibrary
{

  const GET_ALL_PRODUCTEURS = "SELECT * FROM cetcal.cetcal_producteur;";
  const GET_PROD_BY_PK = "SELECT * FROM cetcal.cetcal_producteur WHERE cetcal_producteur.pk_producteur=:pPk;";

  const INSERT_QSTPROD_PRODUCTEUR = "INSERT INTO cetcal.cetcal_producteur (nom, prenom, email, email_bu, mdpsha, telfixe, telport, nom_ferme, siret, adrferme_numvoie, adrferme_rue, adrferme_lieudit, adrferme_commune, adrferme_cp, adrferme_compladr, pageurl_fb, pageurl_ig, pageurl_twitter, url_web, url_boutique, orgcertifbio, surfacehectterres, surfacesousserre, tetes_betail, hl_par_an, groupe_cagette, identifiant_cet) VALUES (:pNom, :pPrenom, :pEmail, :pEmailBu, :pMdpsha, :pTelfixe, :pTelPort, :pNomFerme, :pSiret, :pAdrNumvoie, :pAdrRue, :pAdrLieudit, :pAdrCommune, :pAdrcp, :pAdrCmpladr, :pPageFb, :pPageIg, :pPageTwitter, :pUrlWeb, :pUrlBoutique, :pOrgCertifBio, :pSurfaceHectTerres, :pSurfaceAresSerre, :pNbrTetes, :pHLParAn, :pGroupeCagette, :pIndentifiantCet);";

  const INSERT_CETCAL_TYPEPRODUCTION = "INSERT INTO cetcal.cetcal_type_production (clef_type_production, val_type_production, fk_producteur_type_production) VALUES (:pClef, :pVal, :pPkProducteur);";

  const INSERT_CETCAL_SPECIFICITE_PRODUITS = "INSERT INTO cetcal.cetcal_specificite_produits (clef_specificite, val_specificite, fk_producteur_specificites_produits) VALUES (:pClef, :pVal, :pPkProducteur);";

  const INSERT_CETCAL_MODE_CONSO = "INSERT INTO cetcal.cetcal_mode_conso (clef_mode_conso, val_mode_conso, fk_producteur_mode_conso) VALUES (:pClef, :pVal, :pPkProducteur);";

  const INSERT_QSTPROD_LIEUX = "INSERT INTO cetcal.cetcal_lieu (fk_lieu_qstprod_idpkai_producteur, nom) VALUES (:pFk, :pPointsDeVente);";

  const INSERT_QSTPROD_PRODUIT = "INSERT INTO cetcal.cetcal_produits (fk_produits_qstprod_idpkai_producteur, nom, categorie) VALUES (:pFk, :pNomProduit, :pCategorie);";

  const INSERT_SONDAGE_DIFFICULTES = "INSERT INTO cetcal.cet_sondage (fk_sondage_qstprod_idpkai_producteur, question, reponse) VALUES (:pFk, \"besoins et difficultés\", :pReponse);";

  const INSERT_SONDAGE = "INSERT INTO cetcal.cet_sondage (fk_sondage_qstprod_idpkai_producteur, question, reponse) VALUES (:pFk, :pQuestion, :pReponse);";

  const INSERT_INFORMATION = "INSERT INTO cetcal.cetcal_information_producteur (fk_infop_qstprod_idpkai_producteur, clef_information, valeure_information) VALUES (:pFk, :pK, :pV);";

  const SELECT_SIRET_PRODUCTEUR_PAR_SIRET = "SELECT siret FROM cetcal.cetcal_producteur WHERE siret=:pSiret;";
}