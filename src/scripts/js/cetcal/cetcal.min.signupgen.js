/**
 * Prevent form submit if any necessary fields are unset.
 */
 $(document).on("submit", "form", function(e) {
      /**
       * BOUCHON : décommenter ce code pour livraisons !
       *
      if ($('#qstprod-signupgen-nav').val() == 'valider' && !$("input.is-invalid").length <= 0) {
            
            e.preventDefault(e);
            $('#modal-questionaire-titre').text("La questionnaire n'est pas complet");
            $('#modal-questionaire-paragraphe').text("Certains données obligatoires ne sont pas renseignés. Veuillez vérifier toutes les zones signalées en rouge. Si certaines données sont manquantes, il faut renseigner les informations demandées et valider à nouveau ce formulaire.");
            $('#modal-questionaire-btn-primary').text("J'ai compris");
            $('#modal-questionaire-btn').click(); 
            return false;
      }
      */
});