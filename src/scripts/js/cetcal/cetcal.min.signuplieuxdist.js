/**
 * Prevent form submit if any necessary fields are unset.
 */
$(document).on("submit", "form", function(e) {
    
    if ($('#qstprod-signuplieuxdist-nav').val() == 'ajouter' && !$("input.is-invalid").length <= 0) {
      
      e.preventDefault(e);
      $('#modal-questionaire-titre').text("La fiche du lieu de distribution n'est pas complète");
      $('#modal-questionaire-paragraphe').text("Pour compléter une fiche il faut renseigner les champs obligatoires.");
      $('#modal-questionaire-btn-primary').text("J'ai compris");
      $('#modal-questionaire-btn').click(); 
      return false;
    }
});

/**
 * Specific to removal navigation.
 * Prepare form for submit in a delete array entry context.
 */
function removePlaceFromTable(lIndex) {
    $('#qstprod-signuplieuxdist-nav').val('supprimer');
    $('#qstprod-signuplieuxdist-nav-lindex').val(lIndex);
}