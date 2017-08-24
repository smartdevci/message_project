/**
 * Created by Melaine on 22/08/2017.
 */

//alert('ok');
var old_nom="";
var old_numero="";
var id_modification_actuel=0;


$('.cancel_modification').hide();
$('.validate_modification').hide();
$('.cancel_modification_groupe').hide();
$('.validate_modification_groupe').hide();

$('.cancel_modification').removeClass('hidden');
$('.validate_modification').removeClass('hidden');
$('.cancel_modification_groupe').removeClass('hidden');
$('.validate_modification_groupe').removeClass('hidden');



/***********************************************************************************************************************/
function modifier_contact() {
    $('.modifier_contact').click(function(){
        $('.modifier_contact'+$(this).attr('data-id')).hide();
        $('.validate_modification'+$(this).attr('data-id')).show();
        $('.cancel_modification'+$(this).attr('data-id')).show();


        $('.cancel_modification'+id_modification_actuel).click();
        var class_nom='.ligne_contact'+$(this).attr('data-id');
        //alert(class_nom);
        old_nom=$(class_nom+' td.nom').html();
        old_numero=$(class_nom+' td.numero').html();
        id_modification_actuel=$(this).attr('data-id');

        $(class_nom+' td.nom').html('<input type="text" class="nom_modifier" value="'+$(class_nom+' td.nom').html()+'"/>');
        $(class_nom+' td.numero').html('<input type="number" class="numero_modifier" value="'+$(class_nom+' td.numero').html()+'"/>');
    });
}
modifier_contact();

/***********************************************************************************************************************/

function validate_modification() {
    $('.validate_modification').click(function(){
        $('.modifier_contact'+$(this).attr('data-id')).show();
        $('.validate_modification'+$(this).attr('data-id')).hide();
        $('.cancel_modification'+$(this).attr('data-id')).hide();

        var class_nom='.ligne_contact'+$(this).attr('data-id');
        var nom=$('.nom_modifier').val();
        var numero=$('.numero_modifier').val();

        $(class_nom+' td.nom').html(nom);
        $(class_nom+' td.numero').html(numero);
        id_modification_actuel=0;


        var url="../execute/update_contact.php?nom="+nom+"&numero="+numero+"&id_contact="+$(this).attr('data-id');
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

validate_modification();
/***********************************************************************************************************************/

function cancel_modification() {
    $('.cancel_modification').click(function(){
        $('.modifier_contact'+$(this).attr('data-id')).show();
        $('.validate_modification'+$(this).attr('data-id')).hide();
        $('.cancel_modification'+$(this).attr('data-id')).hide();


        var class_nom='.ligne_contact'+$(this).attr('data-id');
        $(class_nom+' td.nom').html(old_nom);
        id_modification_actuel=0;
        $(class_nom+' td.numero').html(old_numero);
    });
}

cancel_modification();
/***********************************************************************************************************************/

function delete_contact() {
    $('.delete_contact').click(function(){

        var class_nom='.ligne_contact'+$(this).attr('data-id');
        $(class_nom).remove();

        var url="../execute/delete_contact.php?id_contact="+$(this).attr('data-id');
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

delete_contact();

/***********************************************************************************************************************/


$('.bouton_add_contact').click(function(){
    var url="../execute/add_contact.php?nom="+$('.ajout_nom').val()+"&numero="+$('.ajout_numero').val();
    //alert(url);
    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'html',
        success : function(code_html, statut){
            $('.tableau_contact').html(  $('.tableau_contact').html()+code_html );
        },
        error : function(resultat, statut, erreur){
            alert(resultat.responseText);
        }


    });
});

/***********************************************************************************************************************/


$('.bouton_add_groupe').click(function(){
    var url="../execute/add_groupe.php?nom="+$('.nom_groupe_ajouter').val();
    //alert(url);
    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'html',
        success : function(code_html, statut){
            $('.tableau_groupe').html(  $('.tableau_groupe').html()+code_html );
        },
        error : function(resultat, statut, erreur){
            alert(resultat.responseText);
        }


    });
});






/**********************/
/**********************/





var old_nom_groupe="";
var id_modification_actuel_groupe=0;
/***********************************************************************************************************************/

$('.modifier_groupe').click(function(){
    $('.modifier_groupe'+$(this).attr('data-id')).hide();
    $('.validate_modification_groupe'+$(this).attr('data-id')).show();
    $('.cancel_modification_groupe'+$(this).attr('data-id')).show();

    $('.cancel_modification_groupe'+id_modification_actuel_groupe).click();
    var class_nom_groupe='.ligne_groupe'+$(this).attr('data-id');
    //alert(class_nom);
    old_nom_groupe=$(class_nom_groupe+' td.nom_groupe').html();
    id_modification_actuel_groupe=$(this).attr('data-id');


    $(class_nom_groupe+' td.nom_groupe').html('<input type="text" class="nom_groupe_modifier" value="'+$(class_nom_groupe+' td.nom_groupe').html()+'"/>');
});

/***********************************************************************************************************************/

$('.validate_modification_groupe').click(function(){
    $('.modifier_groupe'+$(this).attr('data-id')).show();
    $('.validate_modification_groupe'+$(this).attr('data-id')).hide();
    $('.cancel_modification_groupe'+$(this).attr('data-id')).hide();

    var class_nom_groupe='.ligne_groupe'+$(this).attr('data-id');
    var nom_groupe=$('.nom_groupe_modifier').val();

    $(class_nom_groupe+' td.nom_groupe').html(nom_groupe);
    id_modification_actuel_groupe=0;


    var url="../execute/update_groupe.php?nom="+nom_groupe+"&id_groupe="+$(this).attr('data-id');
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

/***********************************************************************************************************************/


$('.cancel_modification_groupe').click(function(){
    $('.modifier_groupe'+$(this).attr('data-id')).show();
    $('.validate_modification_groupe'+$(this).attr('data-id')).hide();
    $('.cancel_modification_groupe'+$(this).attr('data-id')).hide();


    var class_nom_groupe='.ligne_groupe'+$(this).attr('data-id');
    $(class_nom_groupe+' td.nom_groupe').html(old_nom_groupe);
    id_modification_actuel_groupe=0;
});


/***********************************************************************************************************************/

function delete_groupe() {

    $('.delete_groupe').click(function(){

        var class_nom_groupe='.ligne_groupe'+$(this).attr('data-id');
        $(class_nom_groupe).remove();

        var url="../execute/delete_groupe.php?id_groupe="+$(this).attr('data-id');
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

delete_groupe();




/***********************************************************************************************************************/
/**********************************************RECHERCHE****************************************************************/
/***********************************************************************************************************************/

$('.recherche_contact').keyup(function(){

    var class_nom_groupe='.ligne_groupe'+$(this).attr('data-id');
    $(class_nom_groupe).remove();

    var valeur=$('.recherche_contact').val().trim();
    var texte=(valeur=='')?'Tous les contacts':'Contacts';
    majContact(0,valeur,texte);
});


$('.colonne').click(function(){
    var nom_groupe=$(this).attr('data-name');
    var valeur=$(this).attr('data-id');
    majContact(1,valeur,nom_groupe);

});


$('.ligne_tout').click(function(){
    majContact(0,'',"Tous les contacts");
});






$('.voir_groupe').click(function(){


    var url="../execute/gerer_contact_groupe.php?id_groupe="+$(this).attr('data-id');
    //alert(url);
    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'html',
        success : function(code_html, statut){
            //Format de retour : Total des contact##nom du groupe##données
            $('.contenu_gestion_groupe').html(code_html);
            gestion_contact_data();
        },
        error : function(resultat, statut, erreur){
            alert(resultat.responseText);
        }


    });
});


function gestion_contact_data() {

    $('.contact_dans_groupe').change(function(){

       var url="";
       if($(this).prop('checked')){
           //on a cocher, on doit ajouter
           url="../execute/ajouter_contact_in_groupe.php?id_groupe="+$(this).attr('data-id_groupe')+"&id_contact="+$(this).attr('data-id_contact');
       }
       else
       {
           //on a decocher, on doit supprimer
           url="../execute/supprimer_contact_in_groupe.php?id_groupe="+$(this).attr('data-id_groupe')+"&id_contact="+$(this).attr('data-id_contact');
       }

       alert(url);


    });
}













/***********************************************************************************************************************/
/**********************************************FONCTION*****************************************************************/
/***********************************************************************************************************************/


function majContact(type,valeur,texteRecherche)
{
    var url="../execute/recherche_contact.php?type="+type+"&valeur="+valeur;
    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'html',
        success : function(code_html, statut){
            //Format de retour : Total des contact##nom du groupe##données
            var tab_retour=code_html.split("##");
            var nombre=tab_retour[0];
            var code=tab_retour[1];
            $('.titre_recherche').html(texteRecherche);
            $('.tableau_contact').html(code);
            $('.nombre_contact').html(nombre);

            addAllEvent();
        },
        error : function(resultat, statut, erreur){
            alert(resultat.responseText);
        }


    });
}






function addAllEvent() {
    delete_groupe();
    modifier_contact();
    validate_modification();
    cancel_modification();
    delete_contact();

}