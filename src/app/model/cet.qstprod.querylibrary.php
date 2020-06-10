<?php

/**
 * Sql query's.
 */
class CdcQueryLibrary
{

  /**
   * Accéder aux données d'un utilisateur unique qui souhaite se connecter et donc qui possède déjà (a priori) 
   * un compte sur le SI de la CDC.
   */
  const GET_USER_BY_EMAIL = "SELECT * FROM cdc_utlr WHERE email_utlr_cdc=:pEmail;";

  const GET_ALL_USER = "SELECT * FROM cdc_utlr;";

}