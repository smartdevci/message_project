/**
 * Created by Melaine on 18/08/2017.
 */
var nombre_caractere_un_msg=160;
var nombre_message=1;
var nombre_message_tout=1;
var tableau_numeros=[];
var identification_unique=1;
var numeroGroupe="";
var numberSeparator="///";
updateNumbermsg();

code_bouton='<button type="button" class="btn btn-primary texte_a_afficher les_contacts" data-nom=""  data-numero="" data-toggle="button">Single toggle..</button>';

var nom_expediteur=$
('.sender').val();



$('.message_sms').keyup(function(){
    updateNumbermsg();
});


/************MASQUER******************/
hideAll();
$('nombre_message_insuffisant').removeClass('hidden');







function hideAll()
{
    $('.nombre_message_insuffisant').hide();
}


function updateNumbermsg() {
    nombre_caractere=$('.message_sms').val().length;
    nombre_message=parseInt(nombre_caractere/nombre_caractere_un_msg)+1;
    nombre_message_tout=nombre_message*tableau_numeros.length;
    $('.nombre_caractere').html(nombre_caractere);
    $('.nombre_message').html(nombre_message);

    //alert(nombre_message_tout);
}



/***************************************************************************************/
$('.message_envoye').hide();
$('.message_envoye').removeClass('hidden');

$('.bouton_envoyer_message').click(function(){

    hideAll();
    //envoyerMultiple();
    //alert(numeroGroupe);

    if( parseInt($('.m').val().trim())>=parseInt(nombre_message)) {

        grouperNumeros();
        var message = $('.message_sms').val();
        envoyerMultiple(nom_expediteur, numeroGroupe, message);

        $('.message_envoye').hide();
        $('.message_envoye').show(500);

        //$('.sender').val('');
        $('.recipient').val('');
        $('.liste_contacts_vue').html('');
        $('.message_sms').val('');
    }
    else
    {
        $('.nombre_message_insuffisant').show(500);
    }

});

/***********************************************************************************************************************/
function grouperNumeros()
{
    numeroGroupe=$('.recipient').val();

    for( var i=0;i<tableau_numeros.length;i++)
    {
        numeroGroupe=numeroGroupe+numberSeparator+tableau_numeros[i];
    }
}
/***********************************************************************************************************************/

function envoyerMultiple(expediteur,groupe_numero_nom_destinataire,message)
{
    nombre_caractere=$('.message_sms').val().length;
    nombre_message=parseInt(nombre_caractere/nombre_caractere_un_msg)+1;
    nombre_message=nombre_message*tableau_numeros.length;


    if( parseInt($('.m').val().trim())>=parseInt(nombre_message_tout))
    {
        var url='authsms.php?sender='+expediteur+'&message='+message+"&nb="+nombre_message+'&recipient='+groupe_numero_nom_destinataire;
        alert(url);
        $.ajax({
            url : url,
            type : 'GET',
            dataType : 'html',
            success: function(reponse, statut){

                if(reponse=='non')
                {}
                else
                {
                    //alert(reponse);
                    var reponses=reponse.split("///");
                    //alert(reponses.length);
                    /*$('.message_envoye').hide();
                    $('.message_envoye').show(500);

                    //$('.sender').val('');
                    $('.recipient').val('');
                    $('.message').val('');*/

                    //alert(reponse);
                    for(var j=0;j<reponses.length;j++)
                    {
                        if(reponses[j].trim()!="")
                        {
                            $.ajax({
                                url : reponses[j],
                                type : 'GET',
                                dataType : 'html',
                                success: function(retour, statut2){},
                                error: function(resultat, statut){}
                            });
                            //alert('dedan');
                        }
                    }

                }


            },
            error: function(resultat, statut){

            }


        });

    }
    else
    {
        $('.nombre_message_insuffisant').show(500);
    }

}


/***********************************************************************************************************************/


$('#contacts').keyup(function(e){

    if(e.keyCode==13)
    {
        setNumeroEnvoi();
    }
});



/***********************************************************************************************************************/
$('.ajouter_contact_envoi_msg').click(function(){

    var url="../execute/ajouter_contact_groupe_envoi_sms.php?id_groupe="+$(this).attr('data-id');
    //alert(url);
    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'html',
        success : function(code_html, statut){
            //Format de retour : Total des contact##nom du groupe##données
            $('.contenu_gestion_groupe').html(code_html);
            addEvent();
            //gestion_contact_data();
        },
        error : function(resultat, statut, erreur){
            alert(resultat.responseText);
        }


    });
});

/***********************************************************************************************************************/








/***********************************************************************************************************************/

function addEvent() {


    $('.selectionner_tout_contact').click(function () {

        if($(this).prop('checked')==true)
        {
            $('.boutonCocher').prop('checked',$('.selectionner_tout_contact').prop('checked') );
            $('.status_contact').html('Deselectionner');

            //alert( $('.liste_contacts_vue').html());


            $('.boutonCocher').each(function() {

                var code_bouton='<button type="button" class="btn btn-primary les_contacts '+$(this).attr('data-numero')+'" data-nom="'+$(this).attr('data-contact')+'"  data-numero="'+$(this).attr('data-numero')+'" data-toggle="button">'+$(this).attr('data-contact')+'</button>';
                $('.liste_contacts_vue').html(  $('.liste_contacts_vue').html()+code_bouton);
                ajouterNumeroDestinataire($(this).attr('data-contact'));

            });

        }
        else
        {
            //quand on decoche tout
            $('.boutonCocher').prop('checked',$('.selectionner_tout_contact').prop('checked') );
            $('.status_contact').html('Deselectionner');

            $('.boutonCocher').each(function() {
                $('.'+$(this).attr('data-numero')).remove();
                supprimerNumeroDestinataire($(this).attr('data-contact'));
            });
        }

    });




    $('.boutonCocher').click(function () {
        if($(this).prop('checked'))
        {
            var code_bouton='<button type="button" class="btn btn-primary les_contacts '+$(this).attr('data-numero')+'" data-nom="'+$(this).attr('data-contact')+'"  data-numero="'+$(this).attr('data-numero')+'" data-toggle="button">'+$(this).attr('data-contact')+'</button>';
            $('.liste_contacts_vue').html(  $('.liste_contacts_vue').html()+code_bouton);
            ajouterNumeroDestinataire($(this).attr('data-contact'));

        }
        else
        {
            $('.'+$(this).attr('data-numero')).remove();
            supprimerNumeroDestinataire($(this).attr('data-contact'));
        }
    });





}



/***********************************************************************************************************************/






























/***********************************************************************************************************************/
/******************************************************FONCTIONS********************************************************/
/***********************************************************************************************************************/

function ajouterNumeroDestinataire(numero)
{
    tableau_numeros.push(numero);
    identification_unique++;
}

function supprimerNumeroDestinataire(numero)
{
    tableau_numeros.splice( tableau_numeros.indexOf(numero),1);
}



function setNumeroEnvoi()
{
    var nom=$('#contacts').val().trim();

    if(nom!='')
    {
        $('#contacts').val('');
        $('.texte_a_afficher').html(nom);
        $('.texte_a_afficher').addClass('nouveau'+identification_unique);
        $('.liste_contacts_vue').html(  $('.liste_contacts_vue').html()+$('.bouton_cacher_utilise').html());
        //$('.liste_contacts_vue button').addClass('nouveau'+identification_unique);
        $('.liste_contacts_vue button').removeClass('texte_a_afficher');
        ajouterNumeroDestinataire(nom);
        var nombre=identification_unique;
        //$('.liste_des_contact option[value=\''+nom+'\']').remove();
        //alert($('.liste_contacts_vue').html( ));

        var url="../execute/NumberFromNom.php?numero="+nom;
        //alert(url);
        $.ajax({
            url : url,
            type : 'GET',
            dataType : 'html',
            success : function(code_html, statut){
                //Format de retour : Total des contact##nom du groupe##données
                //alert(code_html);
                $('.nouveau'+nombre).html(code_html.trim());
            },
            error : function(resultat, statut, erreur){
                alert(resultat.responseText);
            }
        });

        identification_unique++;
    }











    // $('.liste_des_contact option[value=\''+nom+'\']').remove();

}






