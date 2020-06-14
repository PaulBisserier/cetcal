<?php

/**
 * Sql query's.
 */
class CETCALQueryLibrary
{

  const GET_ALL_PRODUCTEURS = "SELECT * FROM cetcal.qstprod_producteur;";
  const GET_PROD_BY_PK = "SELECT * FROM cetcal.qstprod_producteur WHERE qstprod_producteur.qstprod_idpkai_producteur=:pPk;";

  const INSERT_QSTPROD_PRODUCTEUR = "INSERT INTO cetcal.qstprod_producteur (nom, prenom, email, email_bu, mdpsha, telfixe, telport, nom_ferme, siret, adrferme_numvoie, adrferme_rue, adrferme_lieudit, adrferme_commune, adrferme_cp, adrferme_compladr, pageurl_fb, pageurl_ig, pageurl_twitter, url_web, url_boutique, orgcertifbio, typesproduction, surfacehectterres, surfacesousserre, tetes_betail, hl_par_an, groupe_cagette, specificites_productions, modes_commandes, modes_paiments, modes_receptions) VALUES (:pNom, :pPrenom, :pEmail, :pEmailBu, :pMdpsha, :pTelfixe, :pTelPort, :pNomFerme, :pSiret, :pAdrNumvoie, :pAdrRue, :pAdrLieudit, :pAdrCommune, :pAdrcp, :pAdrCmpladr, :pPageFb, :pPageIg, :pPageTwitter, :pUrlWeb, :pUrlBoutique, :pOrgCertifBio, :pTypesProduction, :pSurfaceHectTerres, :pSurfaceAresSerre, :pNbrTetes, :pHLParAn, :pGroupeCagette, :pSpecificitesProductions, :pModesConsoCommandes, :pModesConsoPaiments, :pModesConsoReceptions);";

  const INSERT_QSTPROD_LIEUX = "INSERT INTO cetcal.cetcal_lieu (fk_lieu_qstprod_idpkai_producteur, nom) VALUES (:pFk, :pPointsDeVente);";

}