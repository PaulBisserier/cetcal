<?php
$insrp_validee_email = isset($_GET['ev']) ?  htmlentities(htmlspecialchars($_GET['ev'])) : "Erreure sur email";
?>
<!-- page de validation envoyé et traité avec succés -->
<div class="cet-module row justify-content-lg-center" id="cet-qstprod_referece" style="margin-bottom: 60px;">
  <div class="col-lg-6">
    <div class="alert alert-success" role="alert">
      <h5 class="alert-heading">Bienvenu.e Producteur.e.s !</h5>
      <h6 class="alert-heading">Nous avons traité votre inscription avec succès. Vous êtes maintenant référencé dans l'annuaire.<br>Merci</h6>
      <p>Un email vous a été envoyé à l'adresse <b><?= $insrp_validee_email; ?></b>, merci de cliquer sur le lien envoyé dans cet email. Cela activera votre compte et nous pourrons ainsi garantir la sécurité de vos données.<br>Une fois votre compte activé, vous pourrez administrer votre fiche producteur en cliquant sur <i>Votre page producteur</i>. Si vous n'avez pas d'adresse email, nous vous appelerons dans les plus bref délais pour activer votre compte par téléphone.</p>
      <p>Vous pouvez dès maintenant <a href="/">retourner à l'acceuil.</a></p>
      <p>
    </div>
  </div>
</div>