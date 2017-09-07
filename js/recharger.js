/***********************************************************************************************************************/

$('.commander').click(function(){

        var url="../execute/recharger_sms.php?id_offre="+$(this).attr('data-id')+"&quantite="+$(this).attr('data-pack');
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
