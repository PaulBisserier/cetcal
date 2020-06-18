<?php
$err = isset($_GET['err']) ?  htmlentities(htmlspecialchars($_GET['err'])) : "Erreure technique rencontrée.";
$cetcal_session_id = htmlentities(htmlspecialchars($_GET['sitkn']));
?>
<!-- page de validation envoyé et traité avec succés -->
<div class="cet-module row justify-content-lg-center" id="cet-qstprod_referece" style="margin-bottom: 60px;">
  <div class="col-lg-6">
    <div class="alert alert-danger" role="alert">
      <h5 class="alert-heading">Erreur rencontrée</h5>
      <h6 class="alert-heading">Nous nous excusons pour toute gêne occasionnée.</h6>

      <p><b><?= $err; ?></b></p>
      <p>Vous pouvez dès maintenant <a href="/">retourner à l'acceuil.</a></p>
      <p></p>
    </div>
  </div>
</div>