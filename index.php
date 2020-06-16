<?php
$tag_mep = "CETCAL v4";
$DOC_ROOT = $_SERVER['DOCUMENT_ROOT'];
$PHP_INCLUDES_PATH = $DOC_ROOT.'/src/app/includes/';
$PHP_CONST_PATH = $DOC_ROOT.'/src/app/const/';
$PHP_CONTROLLER_PATH = $DOC_ROOT.'/src/app/controller/';
$PHP_UTILS_PATH = $DOC_ROOT.'/src/app/utils/';
include $PHP_CONTROLLER_PATH.'cet.qstprod.controller.index.php';
$statut = htmlspecialchars(isset($_GET['statut']) && !empty($_GET['statut']) ? $_GET['statut'] : 'login.form');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <!--<base href="http://http://82.65.74.33/"/>-->
  <title>Annuaire des producteurs bio de la région castillon</title>
  <meta name="description" content="............"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
  <META HTTP-EQUIV="Expires" CONTENT="-1">
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <link rel="stylesheet" href="/src/scripts/css/bootstrap.min.css">
  <script src="/src/scripts/js/jquery/jquery-3.4.1.min.js"></script>
  <script src="/src/scripts/js/bootstrap.min.js"></script>
  <script src="/src/scripts/js/cetcal/cetcal.min.js"></script>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v7.0" nonce="XVrFhpSY"></script>
</head>
<body>
  <?php 
    include $PHP_CONST_PATH.'cet.qstprod.const.textes.php';
    include $PHP_CONST_PATH.'cet.qstprod.const.listes.php';
    include $PHP_UTILS_PATH.'cet.qstprod.utils.filereader.php';
    include $PHP_UTILS_PATH.'cet.qstprod.utils.filarianne.php';
    $listes_arrays = new CetQstprodConstListes(new FileReaderUtils($DOC_ROOT));
    include $PHP_INCLUDES_PATH.'include.cet.qstprod.navbar.php'; 

    if (in_array($statut, CetQstProdFilArianneHelper::$states)) include $PHP_INCLUDES_PATH.'include.cet.qstprod.filarianne.php'; 
    $module = $PHP_INCLUDES_PATH.'include.cet.qstprod.'.$statut.'.php';
    include file_exists($module) ? $module : $PHP_INCLUDES_PATH.'include.cet.qstprod.login.form.php'; 

    include $PHP_INCLUDES_PATH.'include.cet.qstprod.modal1.php';
    include $PHP_INCLUDES_PATH.'include.cet.qstprod.footer.php';
  ?>
</body>
</html>
<style type="text/css">
  .cet-formgroup-container { background-color: rgb(250, 250, 250); border: 1px solid lightgrey; border-radius: 4px; padding: 16px; margin-bottom: 20px; }
  .cet-formgroup-inner-container { background-color: rgb(255, 255, 255) !important; }
  /** libellés de block : **/
  label.cet-formgroup-container-label { color: rgb(30, 40, 30); font-size: 18px; }
  button.cet-recherche-produit-element-btn { margin-left: 2px; }
  .cet-qstprod-label-text { color: rgb(70, 80, 40); }
  .cet-input-label { margin-left: 8px; }
  .cet-qstprod-btnnav { margin-top: 20px; }
  .form { margin-bottom: 60px; }
  label { margin-left: 4px !important; }
  .table { border-style: 1px solid black !important; }
  .carousel-inner p, h5, span, li, ol { color: black; }
  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    height: 100px;
    width: 100px;
    background-image: none;
  }
  .carousel-control-next-icon:after
  {
    content: '>';
    font-size: 30px;
    color: rgb(34, 139, 34);
  }
  .carousel-control-prev-icon:after {
    content: '<';
    font-size: 30px;
    color: rgb(34, 139, 34);
  }
  .cet-footer {
    padding: 2.5rem 0;
    color: #999;
    background-color: #f9f9f9;
  }
  .cet-footer p:last-child {
    margin-bottom: 0;
  }
  p.cet-p, a.cet-p { color: rgb(34, 139, 34) !important; }
  a.cet-p:hover { color: rgb(34, 100, 34) !important; }
  li.cet-footer-li { background-color: #f9f9f9; }
</style>