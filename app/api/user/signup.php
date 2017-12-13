<?php



	$app -> post('/api/signup',function($request){

		header("Content-type: application/json");//only accept json type data
		require_once('/../dbconnect.php');

		$query = "INSERT INTO `users`(`name`, `email`, `password`, `remember_token`) VALUES (?,?,?,?)";
		$stmp = $mysqli-> prepare($query);

	
		$u_name = $request-> getParsedBody()['u_name'];
		$u_email = $request -> getParsedBody()['u_email'];
		$u_password = $request -> getParsedBody()['u_password'];
		$token = md5(uniqid(rand(), true));//token generating 
		
		$select_query = "SELECT * FROM users where email = '".$u_email."' ";
		$result = $mysqli -> query($select_query);
		$data = $result -> fetch_assoc();

		
		//checking user input validation
		if (isset($u_name) && !empty($u_name)  && emailCheck($u_email) && passCheck($u_password)) 
		{

			//we search user by user email if got any data thats means user have already a account 
			//so we will show this message to our user
			if (!isset($data)) {

				$u_password = sha1($u_password);//hashing password
				$stmp->bind_param("ssss",$u_name,$u_email,$u_password,$token);

				if ($stmp->execute()) {
					message("Successfully created account");
				}else{
					message("Faield to create a new account");
				}

			}else{
				message("This email has already a account");
			}

		}else{
			message("Enter valid input");
		}



	});

	//----------------------- all functions ---------------------

	function message($str){
		echo $str.'<br>';
	}


	//email format checker method
	function emailCheck($email){
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			message("Invalid email format");
  			return false;
		}else{
			return true;
		}
	}

	// password format checker method
	//password must be contain at lest one lower case, digit and its length will be 6 to 20 digit
	function passCheck($pass){
		$pattern = "/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/";
		if(!preg_match($pattern, $pass)){           
		   message("Invalid passwod format password must be contain 6-20 digit with at lest one lowe,specific charecter and at lest one digit");
		   return false;
		}else{
		   return true;
		}

	}

?>


