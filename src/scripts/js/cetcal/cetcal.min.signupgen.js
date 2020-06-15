/**
 * Prevent form submit if any necessary fields are unset.
 */
  $(function(){
    $('#btn-signupgen-valider-form').on('mousedown', function(e) {
        if (document.querySelector('.is-invalid') !== null) {
        	e.preventDefault();
        	var text = 'Des informations obligatoires sont manquantes au formulaire.'
        	text += ' Pour traiter votre inscription et créer votre compte, nous avons besoins des éléments suivant :'
        	text += ' Votre mot de passe, et confirmation de ce mot de passe, nom commercial de votre ferme, votre numéro de SIRET, la commune et le code postal de la ferme.';
	        $('#modal-questionaire-titre').text('Des informations obligatoires sont manquantes');
		    $('#modal-questionaire-paragraphe').text(text);
		    $('#modal-questionaire-btn-primary').text("J'ai compris");
		    $('#modal-questionaire-btn').click(); 
		} else {
			$('#qstprod-signupgen-nav').val('valider');
		}
    });
 });