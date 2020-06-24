/**
 * Prevent form submit if any necessary fields are unset.
 */
  $(function(){
    $('#btn-signupgen-form-valider').on('mousedown', function(e) {
      if (document.querySelector('.is-invalid') !== null || !checkDataForIdGeneration()) {
        	e.preventDefault();
        	var text = 'Des informations obligatoires sont manquantes au formulaire.'
        	text += ' Pour traiter votre inscription et créer votre compte, nous avons besoin des éléments suivant :'
        	text += ' Votre mot de passe et confirmation de celui-ci, le nom de votre ferme, la commune et le code postal de la ferme.';
          text += ' Pour créer votre identifiant de connexion à l\'annuaire nous avons besoin d\'au moins l\'une des informations suivantes :';
          text += ' adresse e-mail, siret, numéro de téléphone fixe ou portable. Merci de renseigner au moins l\'une de ces informations.';
	        $('#modal-questionaire-titre').text('Des informations obligatoires sont manquantes');
		    $('#modal-questionaire-paragraphe').text(text);
		    $('#modal-questionaire-btn-primary').text("J'ai compris");
		    $('#modal-questionaire-btn').click();
  		} else {
  			$('#qstprod-signupgen-nav').val('valider');
  		}
    });
 });

function checkDataForIdGeneration() {
  if ($('#qstprod-email').val().lenght === 0 && $('#qstprod-siret').val().lenght === 0 && 
    $('#qstprod-numbtel-fix').val().lenght === 0 && $('#qstprod-numbtel-port').val().lenght === 0) {
    return false;
  } else {
    return true;
  }
}

$(document).ready(function() {
    checkFormInput(60, 'qstprod-nomferme');
    checkFormInput(60, 'qstprod-commune');
    checkFormInputInteger(9, 4, 'qstprod-cp');
});

$('#cet-infosweb').on('hidden.bs.collapse', function () {
  $('#cet-accordion-icon-infosweb').removeClass('fa-hand-o-up');
  $('#cet-accordion-icon-infosweb').addClass('fa-hand-o-down');
});

$('#cet-infosweb').on('shown.bs.collapse', function () {
  $('#cet-accordion-icon-infosweb').removeClass('fa-hand-o-down');
  $('#cet-accordion-icon-infosweb').addClass('fa-hand-o-up');
});

$('#cet-sondage-1').on('hidden.bs.collapse', function () {
  $('#cet-accordion-icon-sondage-1').removeClass('fa-hand-o-up');
  $('#cet-accordion-icon-sondage-1').addClass('fa-hand-o-down');
});

$('#cet-sondage-1').on('shown.bs.collapse', function () {
  $('#cet-accordion-icon-sondage-1').removeClass('fa-hand-o-down');
  $('#cet-accordion-icon-sondage-1').addClass('fa-hand-o-up');
});
