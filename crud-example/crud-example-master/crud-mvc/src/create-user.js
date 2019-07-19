$(function(){
	$("#submit-btn").click(function(e){
		e.preventDefault();
		// cache variables
		var $username 	= $(".username");
		var $email 		= $(".email");
		var $password 	= $(".password");
		var $city		= $(".city");

		// regex match

		// validate fields
		if($username.val() == ""){
			$username.focus();
			return false;
		}else if($email.val() == ""){
			$email.focus();
			return false;
		}else if($password.val() == ""){
			$password.focus();
			return false;
		}else if($city.val() == ""){
			$city.focus();
			return false;
		}else{
			$.ajax({
				url		:"create",
				method	:"POST",
				data	:{crudFormBtn:1, name:$username.val(), email:$email.val(), pass:$password.val(), city:$city.val() },
				success:function(data)
				{
					$("#form_message").html(data);
				}
			});	
		}
			
	});
});