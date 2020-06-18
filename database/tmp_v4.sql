INSERT INTO cetcal.cetcal_produits 
(fk_produits_qstprod_idpkai_producteur, nom, quantite_uni, quantite_mesure, categorie, description) 
VALUES (:pPk, :pNomProduit, :pQuantite, :pQuantiteMesure, :pCategorie, :pDesc);

INSERT INTO `cetcal`.`cet_sondage` (`cet_sondage_idpkai`, `fk_sondage_qstprod_idpkai_producteur`, `question`, `reponse`) VALUES (NULL, NULL, NULL, NULL);
INSERT INTO cetcal.cet_sondage (fk_sondage_qstprod_idpkai_producteur, question, reponse) VALUES (:pFk, "besoins et difficultés", :pReponse);

INSERT INTO cetcal.cetcal_information_producteur 
(fk_infop_qstprod_idpkai_producteur, clef_information, valeure_information) VALUES (:pFk, :pK, :pV);