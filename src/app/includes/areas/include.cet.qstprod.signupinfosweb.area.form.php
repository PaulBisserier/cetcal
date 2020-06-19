<div id="cet-infosweb-accordion">
  <div class="card cet-accordion">
    <div class="card-header" id="cet-infosweb-accordion-heading">
      <h5 class="mb-0">
        <a class="badge badge-success cet-accordion-badge" href="#" data-toggle="collapse" data-target="#cet-infosweb" aria-expanded="true" aria-controls="cet-infosweb">
          Vos informations Réseaux Sociaux et Web
        </a>
        <a class="align-middle" href="#" data-toggle="collapse" 
          data-target="#cet-infosweb" aria-expanded="true" 
          aria-controls="cet-infosweb">
          <i id="cet-accordion-icon-infosweb" class="fa fa-hand-o-down cet-accordion-icon"></i>
        </a>
      </h5>
    </div>

    <div id="cet-infosweb" class="collapse" aria-labelledby="cet-infosweb-accordion-heading" data-parent="#cet-infosweb-accordion">
      <div class="card-body">
        <label class="cet-formgroup-container-label" for="qstprod-www"><small class="form-text">Informations web et réseaux sociaux :</small></label>
        <div class="form-group mb-3"> 
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Page Facebook de la ferme :</small></label>
          <input class="form-control" id="qstprod-fb" name="qstprod-fb" type="text" 
          placeholder="Page Facebook de la ferme (si existant)"
          value="<?= isset($currentForm['qstprod-fb']) ? $currentForm['qstprod-fb'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">   
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Page Instagram de la ferme :</small></label>
          <input class="form-control" id="qstprod-ig" name="qstprod-ig" type="text" 
          placeholder="Page Instagram de la ferme (si existant)"
          value="<?= isset($currentForm['qstprod-ig']) ? $currentForm['qstprod-ig'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Compte Twitter de la ferme :</small></label>   
          <input class="form-control" id="qstprod-twitter" name="qstprod-twitter" type="text" 
          placeholder="Compte Twitter de la ferme (si existant)"
          value="<?= isset($currentForm['qstprod-twitter']) ? $currentForm['qstprod-twitter'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Site internet de votre exploitation :</small></label>
          <input class="form-control" id="qstprod-www" name="qstprod-www" type="text" 
          placeholder="Site internet de votre exploitation (si existant)"
          value="<?= isset($currentForm['qstprod-www']) ? $currentForm['qstprod-www'] : $neant; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="cet-input-label"><small class="cet-qstprod-label-text">Adresse web de votre boutique ligne :</small></label>
          <input class="form-control" id="qstprod-adrwebboutiqueenligne" name="qstprod-adrwebboutiqueenligne" 
          type="text" placeholder="Adresse web de boutique en ligne"
          value="<?= isset($currentForm['qstprod-adrwebboutiqueenligne']) ? $currentForm['qstprod-adrwebboutiqueenligne'] : $neant; ?>">
        </div>
        <a href="#cet-infosweb-accordion" style="float: right; margin-bottom: 20px; color: white;" 
          class="btn btn-success btn-sm scrolltowards" data-toggle="collapse" data-target="#cet-infosweb">
          <i><?= CetQstprodConstLibelles::close_form_area; ?></i>
          <i class="fa fa-hand-o-up cet-accordion-icon" style="color: white;"></i>
        </a>
      </div>
    </div>
  </div>
</div>