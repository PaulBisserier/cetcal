<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/?">
    <img src="/res/content/logo-annuaire_text-only.png" height="80" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-cet-qstprod" aria-controls="navbar-cet-qstprod" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-cet-qstprod">
    <ul class="navbar-nav mr-auto">
      <?php if (!in_array($statut, CetQstProdFilArianneHelper::$states)): ?>
        <li class="nav-item dropdown">
          <?php include $PHP_INCLUDES_PATH.'navbar-entities/include.cet.qstprod.nav.leftpanel.php'; ?>
        </li>
        <?php if (!$anr): ?>
          <li class="nav-item">
            <a id="cet-inscription-producteur" class="btn btn-info btn-sm cet-navbar-btn-small" 
              href="#">Je suis Producteur.e.s</a>
          </li>
        <?php endif; ?>
      <?php endif; ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle cet-p" href="#" 
          id="navbar-qui-nous-sommes-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Qui sommes nous ? </a>
        <div class="dropdown-menu" aria-labelledby="navbar-qui-nous-sommes-dropdown">
          <a class="dropdown-item" href="#" 
            onmousedown="scrollTowards('cet-annuaire-footer');">L'association Castillonnais en Transition
          </a>
          <a class="dropdown-item align-middle" href="https://github.com/j-fish/cetcal" target="_blank">
              Notre projet sur GitHub <img src="/res/content/github-logo.png" height="40" alt="" style="float: right !important;">
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a id="cet-notre-projet" class="nav-link cet-p" href="#">Notre projet, <i>Circuits Alimentaires Locaux</i></a>
      </li>
    </ul>
    <?php if (!$anr && !in_array($statut, CetQstProdFilArianneHelper::$states)): ?>
      <span class="navbar-text">
        <a id="cet-annuaire-crt-recherche-btn" class="btn btn-success cet-navbar-btn" href="#">Rechercher  <i class="fa fa-search" aria-hidden="true"></i></a>
      </span>
    <?php elseif (in_array($statut, CetQstProdFilArianneHelper::$states)): ?>
      <span class="navbar-text">
        <a id="cet-notre-projet-union-eu" class="nav-link" href="#"><img src="/res/content/Logo-UE-FEDER-web.jpg" height="60" alt=""></a>
      </span>
      <span class="navbar-text">
        <a id="cet-notre-projet-region" class="nav-link" href="#"><img src="/res/content/logo_region-aquitaine.jpg" height="60" alt=""></a>
      </span>
    <?php endif; ?>
  </div>
</nav>