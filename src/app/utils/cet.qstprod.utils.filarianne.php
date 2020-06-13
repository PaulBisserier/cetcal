<?php
Class CetQstProdFilArianneHelper
{
  public static $prefix_fa = "<span class=\"cet-qstprod-label-text\">Fil d'Arianne :</span>";
  private static $prefix = "";
  private static $values = array(
    "signupgen.form" => "Fiche d'identité (et sondage)",
    "signuplieuxdist.form" => "Distribution",
    "signupprods.form" => "Produits",
    "signupconso.form" => "Vos consomateurs",
    "signupbesoins.form" => "Besoins, Solidarité et Résilience",
    "signuprecap.form" => "Récapitulatif du questionnaire",
  );

  private static $result = "";

  public static function update($statut)
  {
    foreach (CetQstProdFilArianneHelper::$values as $k => $v) 
    {
      if (strcmp($statut, $k) == 0) 
      {
        CetQstProdFilArianneHelper::$result .= " <span class=\"badge badge-success\" style=\"margin-bottom: 4px; font-size: 14px; font-weight: normal; padding: 6px;\">".CetQstProdFilArianneHelper::$prefix.$v."</span>";
      }
      else
      {
        CetQstProdFilArianneHelper::$result .= " <span class=\"badge badge-light\" style=\"margin-bottom: 4px; font-size: 14px; font-weight: normal; padding: 6px;\">".CetQstProdFilArianneHelper::$prefix.$v."</span>";
      }
    }

    return  CetQstProdFilArianneHelper::$result;
  }
}
?>