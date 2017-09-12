/**
 * Created by Melaine on 22/08/2017.
 */

//alert('ok');
var old_nom="";
var old_numero="";
var id_modification_actuel=0;


$('.cancel_modification').hide();
$('.validate_modification').hide();
$('.cancel_modification_offre').hide();
$('.validate_modification_offre').hide();

$('.cancel_modification').removeClass('hidden');
$('.validate_modification').removeClass('hidden');
$('.cancel_modification_offre').removeClass('hidden');
$('.validate_modification_offre').removeClass('hidden');




$('.bouton_add_offre').click(function(){
    var url="../execute/add_offre.php?nom_offre="+$('.nom_offre_ajouter').val().trim()+"&nombre_sms="+$('.nombre_sms_ajouter').val().trim()+"&prix="+$('.prix_ajouter').val().trim();
    //alert(url);
    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'html',
        success : function(code_html, statut){
            $('.tableau_offre').html(  $('.tableau_offre').html()+code_html );
        },
        error : function(resultat, statut, erreur){
            alert(resultat.responseText);
        }


    });
});






/**********************/
/**********************/





var old_nom_offre="";
old_nombre_sms="";
old_prix="";
var id_modification_actuel_offre=0;
/***********************************************************************************************************************/

$('.modifier_offre').click(function(){
    $('.modifier_offre'+$(this).attr('data-id')).hide();
    $('.validate_modification_offre'+$(this).attr('data-id')).show();
    $('.cancel_modification_offre'+$(this).attr('data-id')).show();

    $('.cancel_modification_offre'+id_modification_actuel_offre).click();

    var class_nom_offre='.ligne_offre'+$(this).attr('data-id');
    //alert(class_nom);
    old_nom_offre=$(class_nom_offre+' td.nom_offre').html().trim();
    old_nombre_sms=$(class_nom_offre+' td.nombre_sms').html().trim();
    old_prix=$(class_nom_offre+' td.prix').html().trim();

    alert(old_nom_offre);


    id_modification_actuel_offre=$(this).attr('data-id');

    $(class_nom_offre+' td.nom_offre').html('<input type="text" class="nom_offre_modifier" value="'+old_nom_offre.trim()+'" />');
    $(class_nom_offre+' td.nombre_sms').html('<input type="text" class="nombre_sms_modifier" value="'+old_nombre_sms.trim()+'"/>');
    $(class_nom_offre+' td.prix').html('<input type="text" class="prix_modifier" value="'+old_prix.trim()+'"/>');
    alert($('table').html());
});

/***********************************************************************************************************************/

$('.validate_modification_offre').click(function() {

}

function validate_modification() {

    $('.modifier_offre'+$(this).attr('data-id')).show();
    $('.validate_modification_offre'+$(this).attr('data-id')).hide();
    $('.cancel_modification_offre'+$(this).attr('data-id')).hide();

    var class_nom_offre='.ligne_offre'+$(this).attr('data-id');
    var nom_offre=$('.nom_offre_modifier').val().trim();
    var nombre_sms=$('.nombre_sms_modifier').val().trim();
    var prix=$('.prix_modifier').val().trim();

    $(class_nom_offre+' td.nom_offre').html(nom_offre);
    id_modification_actuel_offre=0;


    var url="../execute/update_offre.php?nom="+nom_offre+"&nombre_sms="+nombre_sms+"&id_offre="+$(this).attr('data-id');
    //alert(url);
    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'html',
        success : function(code_html, statut){},
        error : function(resultat, statut, erreur){
            alert(resultat.responseText);
        }


    });
}




/***********************************************************************************************************************/


$('.cancel_modification_offre').click(function(){
    $('.modifier_offre'+$(this).attr('data-id')).show();
    $('.validate_modification_offre'+$(this).attr('data-id')).hide();
    $('.cancel_modification_offre'+$(this).attr('data-id')).hide();


    var class_nom_offre='.ligne_offre'+$(this).attr('data-id');
    $(class_nom_offre+' td.nom_offre').html(old_nom_offre);
    id_modification_actuel_offre=0;
});


/***********************************************************************************************************************/

function delete_offre() {

    $('.delete_offre').click(function(){

        var class_nom_offre='.ligne_offre'+$(this).attr('data-id');
        $(class_nom_offre).remove();

        var url="../execute/delete_offre.php?id_offre="+$(this).attr('data-id');
        //alert(url);
        $.ajax({
            url : url,
            type : 'GET',
            dataType : 'html',
            success : function(code_html, statut){},
            error : function(resultat, statut, erreur){
                alert(resultat.responseText);
            }


        });
    });
}

delete_offre();


