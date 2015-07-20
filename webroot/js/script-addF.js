$('#FactureIsClient').change(function() {
    if ($('#FactureIsClient option:selected').val() === 1) {
        $('#clients').removeAttr('style');
    } else {
        $('#clients').attr('style', 'display:none;');
    }
});
var i = 1;
$("#addItem").on('click', function(e) {
    e.preventDefault();
    if (($("#FactureCount").val() === "") || ($("#FactureRemise").val() === "")) {
        alert("Veuillez choisir une designation avec la quantité et la remise en 0 si y a pas de remise, merci.");
    } else {
        $('#postList').append('<input class="productR" id="label' + $('#FactureProductId option:selected').val() + '" type="text" name="data[Product][' + $("#FactureRemise").val() + '][' + $("#FactureProductId option:selected").val() + ']" value="' + $("#FactureCount").val() + '" >');
        $("#listeAchat ul").append("<li  style='margin-top: 12px;'><label class='label label-info'>" + $("#FactureProductId option:selected").text() + "[Qte = " + $("#FactureCount").val() + " | Remise à " + $("#FactureRemise").val() + " ]</label>&nbsp;<i style='cursor: pointer;margin-top: -6px;' id='removeItem' class='btn btn-danger btn-xs glyphicon glyphicon-remove' data-value='label" + $("#FactureProductId option:selected").val() + "'></i></li>");
    }
});
$(document).ready(function() {
    $(".nav").on('click', '#removeItem', function() {
        $(this).parent('li').remove();
//alert($(this).attr('data-value'));
        var id = $(this).attr('data-value');
        $("#" + id).remove();

    });
});