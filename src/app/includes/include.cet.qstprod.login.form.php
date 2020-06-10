<!-- login html form -->
<div class="row justify-content-lg-center">
  <div class="col-lg-6">
    <div class="alert alert-info fade show" role="alert">
      <p><?= CetQstprodConstTextes::login_intro_block_textinf_a; ?></p>
      <p><?= CetQstprodConstTextes::login_intro_block_textinf_b; ?></p>
      <p><?= CetQstprodConstTextes::login_intro_block_textinf_c; ?></p>
      <p><b><?= CetQstprodConstTextes::login_intro_block_textinf_d; ?></b></p>
      <p><?= CetQstprodConstTextes::login_intro_block_textinf_f; ?></p>
      <p><b><?= CetQstprodConstTextes::login_intro_block_textinf_e; ?></b></p>
      <a class="btn btn-success btn-block" href="/src/app/controller/cet.qstprod.controller.login.form.php" style="margin-top: 8px;">S'inscrire sur l'annuaire cetcal !</a>
    </div>
  </div>
</div>
<div class="row justify-content-lg-center">
  <div class="col-lg-6"> 
    <form class="form" action="/src/app/controller/cet.qstprod.controller.login.form.php" method="post">
      <label for="qstprod-email"> - Veuillez renseigner votre identifiant et mot de passe :
        <small class="form-text text-muted" style="margin-top: 2px;">Cet annuaire garantie la confidentialité de vos données numériques.<br>
          <a href="#">Prendre connaissance de notre politique relative aux données numériques.</a>
        </small>
      </label>
      <div class="cet-formgroup-container">
        <div class="input-group mb-3">
          <input class="form-control" name="qstprod-email" id="qstprod-email" type="text" placeholder="Email, n°de téléphone ou identifiant" aria-label="email ou identifiant">
        </div>
        <div class="input-group mb-3">
          <input class="form-control" name="qstprod-motdepasse" id="qstprod-motdepasse" type="password" placeholder="Mot de passe" aria-label="Mot de passe">
        </div>
        <button class="btn btn-primary btn-block" type="submit" style="margin-top: 8px;">Se connecter</button>
      </div>
      <small class="form-text text-muted" style="margin-top: 12px;">
        <a href="#"> - J'ai oublié mon mot de passe.</a><br>
        <a href="#"> - J'ai perdu mon identifiant de connexion.</a><br>
        <a href="/src/app/controller/cet.qstprod.controller.login.form.php"> - Producteur, je souhaite m'inscrire et être référencé.</a></small>  
    </form>
  </div>
</div>