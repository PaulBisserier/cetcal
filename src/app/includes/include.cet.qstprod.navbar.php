<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" style="margin-bottom: 20px;">
  <a class="navbar-brand" href="/?statut=">
    <!--<img src="" width="30" height="30" class="d-inline-block align-top" alt="">-->
    <?= $tag_mep; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-cet-qstprod" aria-controls="navbar-cet-qstprod" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-cet-qstprod">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="$('#cet-qstprod_seconnecter').hide(function(){ $('#' + 'cet-qstprod_intro').fadeIn('slow'); });">Je suis Producteur</a>
      </li>
    </ul>
    <span class="navbar-text">
      <a class="nav-link" href="#" onclick="$('#cet-qstprod_intro').hide(function(){ $('#cet-qstprod_seconnecter').fadeIn('slow'); });">Votre page producteur</a>
    </span>
  </div>
</nav>