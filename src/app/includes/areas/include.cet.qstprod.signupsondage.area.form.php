<div id="cet-sondage-1-accordion">
  <div class="card cet-accordion">
    <div class="card-header" id="cet-sondage-1-heading">
      <h5 class="mb-0">
        <a class="badge badge-success cet-accordion-badge" href="#" data-toggle="collapse" data-target="#cet-sondage-1" aria-expanded="true" aria-controls="cet-sondage-1">
          Pour mieux vous connaître (ces informations sont confidentielles) - sondage.
        </a>
        <a class="align-middle" href="#" data-toggle="collapse" 
          data-target="#cet-sondage-1" aria-expanded="true" 
          aria-controls="cet-sondage-1">
          <i id="cet-accordion-icon-sondage-1" class="fa fa-hand-o-down cet-accordion-icon"></i>
        </a>
      </h5>
    </div>

    <div id="cet-sondage-1" class="collapse" aria-labelledby="cet-sondage-1-heading" data-parent="#cet-sondage-1-accordion">
      <div class="card-body">
        <label class="cet-formgroup-container-label"><small class="form-text">Sondage :</small></label>
        <label><small class="form-text">Quels sont vos besoins et difficultés ?</small></label>
        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->sondage_difficultes as $sondagedifficulte): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?= implode(';', $sondagedifficulte); ?>" id="qstprod-sondagedifficulte-<?= $counter; ?>" 
            name="qstprod-sondagedifficultes[]"
            <?= isset($currentForm['qstprod-sondagedifficultes']) && in_array(implode(';', $sondagedifficulte), $currentForm['qstprod-sondagedifficultes']) ? 
              'checked="checked"' : $neant; ?>>
          <label class="form-check-label cet-qstprod-label-text" for="qstprod-sondagedifficulte-<?= $counter; ?>"><?= $sondagedifficulte[1]; ?></label>
        </div>
        <?php ++$counter; ?>
        <?php endforeach; ?>

        <?php $counter = 0; ?>
        <?php foreach ($listes_arrays->sondage_divers as $divers): ?>
        <?php for ($i=0; $i < count($divers) - 1; $i++): ?>
          <?php if ($i == 0): ?>
            <br>
            <label><small class="form-text"><?= $divers[$i][1]; ?></small></label>
          <?php endif; ?>
          <?php if ($i > 0): ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?= implode(';', $divers[$i]); ?>" 
                id="qstprod-sondage-<?= ++$counter; ?>" 
                name="qstprod-sondage[]"
                <?= isset($currentForm['qstprod-sondage']) && in_array(implode(';', $divers[$i]), $currentForm['qstprod-sondage']) ?
                  'checked="checked"' : $neant; ?>>
              <label class="form-check-label cet-qstprod-label-text" 
                for="qstprod-sondage-<?= $counter; ?>"><?= $divers[$i][1]; ?></label>
            </div>
            <?php ++$counter; ?>
          <?php endif; ?>
        <?php endfor; ?>
        <?php endforeach; ?>
        <a href="#cet-sondage-1-accordion" style="float: right; margin-bottom: 20px; color: white;" 
          class="btn btn-success btn-sm scrolltowards" data-toggle="collapse" data-target="#cet-sondage-1">
          <i><?= CetQstprodConstLibelles::close_form_area; ?></i>
          <i class="fa fa-hand-o-up cet-accordion-icon" style="color: white;"></i>
        </a>
      </div>
    </div>
  </div>
</div>