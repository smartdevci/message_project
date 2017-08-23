var login_message_erreur=$('.login_message_erreur');
	login_message_erreur.hide();
	login_message_erreur.removeClass('hidden');

//alert('oooooook');
	
$('.bouton_valider_connexion').click(function(){
	

//$nom,$prenom,$email,$password,$numero,$nom_compte

	var email=$('.email').val();
	var password=$('.password').val();
	var url="execute/se_connecter.php?email="+email+"&password="+password;
	//alert(url);

	$.ajax({

	       url : url,
	       type : 'GET',
	       dataType : 'html',
	       success : function(code_html, statut){ 
	       		login_message_erreur.hide();
	       		code_html=code_html.trim();
	       		//alert("/"+code_html.trim()+"/"+(code_html==1));
	       		if(code_html!=0)
	       		{
	       			var id=code_html;

	       			//alert("../dashboard/session_var.php?id="+id+"&inscription=false");
	       			window.location="dashboard/session_var.php?id="+id;
	       			//window.location="../dashboard/session_var.php?id="+code_html;
	       			
	       		}
	       		else
	       		{
	       			login_message_erreur.hide();
	       			login_message_erreur.show(500);
	       		}

	       },
	       error : function(resultat, statut, erreur){

	       		alert(resultat.responseText);
	       }


    });


	
	
	//alert('ok');
});
