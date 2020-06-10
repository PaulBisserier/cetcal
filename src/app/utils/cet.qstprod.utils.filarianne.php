<?php
Class CetQstProdFilArianneHelper
{
  public static $prefix_fa = "<span class=\"cet-qstprod-label-text\">Fil d'Arianne :</span>";
  private static $prefix = "";
  private static $values = array(
    "signupgen.form" => "Fiche d'identité (et sondage)",
    "signupbesoins.form" => "Votre activité, vos besoins",
    "signupprods.form" => "Produits",
    "signuplieuxdist.form" => "Distribution",
    "signuprecap.form" => "Récapitulatif",
  );

  private static $result = "";

  public static function update($statut)
  {
    foreach (CetQstProdFilArianneHelper::$values as $k => $v) 
    {
      if (strcmp($statut, $k) == 0) 
      {
        CetQstProdFilArianneHelper::$result .= " <span class=\"badge badge-success\">".CetQstProdFilArianneHelper::$prefix.$v."</span>";
      }
      else
      {
        CetQstProdFilArianneHelper::$result .= " <span class=\"badge badge-info\">".CetQstProdFilArianneHelper::$prefix.$v."</span>";
      }
    }

    return  CetQstProdFilArianneHelper::$result;
  }
}
?>