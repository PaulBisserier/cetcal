<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" style="margin-bottom: 20px;">
  <a class="navbar-brand" href="#">
    <!--<img src="" width="30" height="30" class="d-inline-block align-top" alt="">-->
    <?= $tag_mep; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-cet-qstprod" aria-controls="navbar-cet-qstprod" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-cet-qstprod">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Un lien CET</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbar-cet-qstprodDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Des actions
        </a>
        <div class="dropdown-menu" aria-labelledby="navbar-cet-qstprodDropdown">
          <a class="dropdown-item" href="#">Item de type lien</a>
          <a class="dropdown-item" href="#">Un deuxième lien</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Encore un lien de plus</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Lien inactif</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher par mots clefs" aria-label="Rechercher par mots clefs">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
    </form>
  </div>
</nav>