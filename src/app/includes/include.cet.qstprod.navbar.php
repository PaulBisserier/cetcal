<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" style="margin-bottom: 20px;">
  <a class="navbar-brand" href="/?statut=">
    <img src="/res/content/cet_logo.png" width="80" height="80" alt="">
    <?= $tag_mep; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-cet-qstprod" aria-controls="navbar-cet-qstprod" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-cet-qstprod">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link cet-p" href="#" onmousedown="scrollTowards('cet-annuaire-footer');">Qui sommes nous ?</a>
      </li>
      <?php if (!in_array($statut, CetQstProdFilArianneHelper::$states)): ?>
        <li class="nav-item">
          <a class="nav-link cet-p" href="#" onmousedown="$('#cet-qstprod_intro').fadeIn(function(){ scrollTowards('cet-annuaire-body'); $('#' + 'cet-qstprod_seconnecter').hide('slow'); });">Je suis Producteur</a>
        </li>
      <?php endif; ?>
    </ul>
    <?php if (!in_array($statut, CetQstProdFilArianneHelper::$states)): ?>
      <span class="navbar-text">
        <a class="nav-link cet-p" href="#" onmousedown="$('#cet-qstprod_seconnecter').fadeIn(function(){ scrollTowards('cet-annuaire-body'); $('#cet-qstprod_intro').hide('slow'); });">Votre page producteur</a>
      </span>
    <?php endif; ?>
  </div>
</nav>