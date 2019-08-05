$(document).ready(function(){
	$('#logoLogin').attr('src' , location.protocol + "//" + document.domain + "/cakephp/app/webroot/img/logoLogin.png");
	$('#loginForm').show();
	$('#registerForm').hide();

	$('#loginBtn').click(function(event) {
		$email = $('#loginEmail').val();
		$password = $('#loginPassword').val();
		if (!($email==null || $password==null)){
			$.ajax({
			url: location.protocol + "//" + document.domain +"/cakephp/users/index",
			type: 'POST',
			data: {
				email: $email,
				password: $password,
			}
			}).done(function(res) {
				res = $.parseJSON(res);
				if(res['email']){
					window.location.href = location.protocol + "//" + document.domain +"/cakephp/";
				}else{
					$.toast({
						heading: 'Error',
						text: res[0],
						icon: 'error',
						position: 'bottom-right',
						loader: false
					})
				}
			});
		}
	});

	$('#registerBtn').click(function(event) {
		$registerUsername = $('#registerUsername').val();
		$firstName = $('#firstName').val();
		$lastName = $('#lastName').val();
		$email = $('#email').val();
		$email2 = $('#email2').val();
		$password = $('#registerPassword').val();
		$password2 = $('#registerPassword2').val();
		if (!($registerUsername==null || $registerUsername=="",$firstName==null || $firstName=="",$lastName==null || $lastName=="",$email==null || $email=="",$email2==null || $email2=="",$password==null || $password=="",$password2==null || $password2==""))
		{
			$.ajax({
			url: location.protocol + "//" + document.domain +"/cakephp/users/register",
			type: 'POST',
			data: {
				username: $registerUsername ,
				firstName: $firstName,
				lastName: $lastName,
				email: $email,
				email2: $email2,
				password: $password,
				password2: $password2
			}
			}).done(function(res) {
				res = $.parseJSON(res);
				if(res['username']){
					window.location.href = location.protocol + "//" + document.domain +"/cakephp/users/login";
				}else{
					$.toast({
						heading: 'Error',
						text: res[0],
						icon: 'error',
						position: 'bottom-right',
						loader: false
					})
				}
			});
		}		
	});

	$('#hideRegister').click(function(event) {
		$('#loginForm').show();
		$('#registerForm').hide();
	});
	
	$('#hideLogin').click(function(event) {
		$('#loginForm').hide();
		$('#registerForm').show();
	});
});