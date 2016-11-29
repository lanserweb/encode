$(document).ready(function () {
	//login
	
	$('form[name="loginform"] input[type="submit"]').click(function() {
		
  		var lang = 2;
		var errormessage = Array();
			errormessage[0] = 'Մուտքանունը և գաղտնաբառը պետք է պարունակեն մինիմում 4 սիմվոլ';
			errormessage[1] = 'Логин и пароль должны содержать минимум 4 символов';
		    errormessage[2] = 'Minimum length of username and password must be 4';
		var login = $('form[name="loginform"] input[name="login"]');
		var pass  = $('form[name="loginform"] input[name="password"]');
		if(login.val().length>=4 && pass.val().length>=4) {
			$.ajax({
				url: "user/login",
  				method: "POST",
  				dataType: "text",
  				contentType: 'application/x-www-form-urlencoded',
  				success:function(event) {
  					$.ajax({
						url: "application/components/usererrors.json",
		  				method: "GET",
		  				dataType: "json",
		  				success :function(event) {
		  					if(event) {
		  						for(var i=0;i<event[lang].length;i++) {
		  							$("#hereerrors").html(event[lang][i]+"<br>");
		  						}
		  						login.val("");
		  						pass.val("");
		  					}else {
		  						login.val("");
		  						pass.val("");
		  						window.location.href="user/profile";
		  					}
		  					
		  					
		  				}
		  			});
  				},
  				data:{login:login.val(),password:pass.val()},
  				cache:false
			});
			}else {
				$("#hereerrors").html(errormessage[lang]);
		}
	});


	//register
	$('form[name="registerform"] button').click(function() {
		var errormessage = Array();
			errormessage[0] = 'Մուտքանունը և գաղտնաբառը պետք է պարունակեն մինիմում 4 սիմվոլ';
			errormessage[1] = 'Логин и пароль должны содержать минимум 4 символов';
		    errormessage[2] = 'Minimum length of username and password must be 4';
		var login = $(this).parent().find('input[name="login"]');
		var pass  = $(this).parent().find('input[name="password"]');
		if(login.val().length>=4 && pass.val().length>=4) {
			$.ajax({
				url: "user/register",
  				method: "POST",
  				dataType: "text",
  				contentType: 'application/x-www-form-urlencoded',
  				success:function(event) {
  					$('body').append(event);
  					$.ajax({
						url: "application/components/usererrors.json",
		  				method: "GET",
		  				dataType: "json",
		  				success :function(event) {
		  					alert('event');
		  					for(var i=0;i<event[lang].length;i++) {
		  						$('body').append(event[lang][i]+"<br>");
		  					}
		  				}
		  			});
  				},
  				data:{login:login.val(),password:pass.val()},
  				cache:false
			});
		}else {
				alert(errormessage[lang]);
		}

	});
});