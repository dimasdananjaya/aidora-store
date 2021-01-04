$(document).ready(function() {
    $('.uangBarang').mask("000,0000,000,000", {reverse: true, maxLength:false, removeMaskOnSubmit: true});
} );  

$("#formTambahProduct").submit(function() {
    $(".uangBarang").unmask();
});
