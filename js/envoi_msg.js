/**
 * Created by Melaine on 18/08/2017.
 */
var nombre_caractere_un_msg=160;
var nombre_message=1;
var tableau_numeros=[];
var identification_unique=1;
updateNumbermsg();

var nom_expediteur=$('.sender').val();



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
    $('.nombre_caractere').html(nombre_caractere);
    $('.nombre_message').html(nombre_message);
}



/***************************************************************************************/
$('.message_envoye').hide();
$('.message_envoye').removeClass('hidden');

$('.bouton_envoyer_message').click(function(){

    hideAll();
  /*  if( parseInt($('.m').val().trim())>=parseInt(nombre_message))
    {

        var url='authsms.php?sender='+$('.sender').val()+'&recipient='+$('.recipient').val()+'&message='+$('.message_sms').val()+"&nb="+nombre_message;
       //alert(url);
        $.ajax({
            url : url,
            type : 'GET',
            dataType : 'html',
            success: function(reponse, statut){

                if(reponse=='non')
                {

                }
                else
                {
                    //alert(reponse);
                    $('.message_envoye').hide();
                    $('.message_envoye').show(500);

                    //$('.sender').val('');
                    $('.recipient').val('');
                    $('.message').val('');

                    //alert(reponse);
                    $.ajax({
                        url : reponse,
                        type : 'GET',
                        dataType : 'html',
                        success: function(retour, statut2){},
                        error: function(resultat, statut){}
                    });
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

*/
    //envoyerMultiple();
    envoyerMessage(nom_expediteur,"Melaine Boue","ok");



});
/***********************************************************************************************************************/


function envoyerMultiple()
{
    for( var i=0;i<tableau_numeros.length;i++)
    {
        alert(tableau_numeros[i]);

        //tableau_numeros.splice(0,1);

    }
    //alert('ok '+tableau_numeros.length);
}


/***********************************************************************************************************************/
function envoyerMessage(expediteur,destinataire,message)
{
    var url='envoiMultiple.php?sender='+expediteur+'&recipient='+destinataire+'&message='+message+"&nb="+(parseInt(nombre_message/160)+1);
    alert(url);
    $.ajax({
        url : url,
        type : 'GET',
        dataType : 'html',
        success: function(reponse, statut){

            if(reponse=='non')
            {

            }
            else
            {
                 $.ajax({
                    url : reponse,
                    type : 'GET',
                    dataType : 'html',
                    success: function(retour, statut2){},
                    error: function(resultat, statut){}
                });
            }
        },
        error: function(resultat, statut){}
    });
}
/***********************************************************************************************************************/

function getNumber(texte)
{

    var url='../execute/get_number.php?texte='+texte;
    //alert(url);
    $.ajax({
                    url : reponse,
                    type : 'GET',
                    dataType : 'html',
                    success: function(retour, statut2){
                        return retour;
                    },
                    error: function(resultat, statut){}
                });
}


/***********************************************************************************************************************/


$('#contacts').keyup(function(e){

    if(e.keyCode==13)
    {
        setNumeroEnvoi();

    }

});


$('#contacts').change(function(){

});

$('.ajouter_numero').click(function(){
   alert( tableau_numeros.length);

});




































/***********************************************************************************************************************/
/******************************************************FONCTIONS********************************************************/
/***********************************************************************************************************************/

function ajouterNumeroDestinataire(numero)
{
    tableau_numeros.push(numero);
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






