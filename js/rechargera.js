/***********************************************************************************************************************/

$('.valider_souscription').click(function(){
        var url="../execute/valider_rechargement.php?id_rechargement="+$(this).attr('data-id')+"&quantite="+$(this).attr('data-pack');

       // alert(url);
        window.location=url;
        /* $.ajax({
            url : url,
            type : 'GET',
            dataType : 'html',
            success : function(code_html, statut){},
            error : function(resultat, statut, erreur){
                alert(resultat.responseText);
            }


        });*/

});
/***********************************************************************************************************************/
