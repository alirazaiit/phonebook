<!DOCTYPE html>

<html lang="en">
	<head>
		<!--title of the web page-->
		<title>Login - Mas Agency</title>
		
		<!--web page meta tags-->
		<meta charset="utf-8" />
		
		<!--specific web page meta tags-->
		
		
		<!--CSS Links-->
		<link rel="stylesheet" type="text/css" href="style.css">
		
		
	</head>
<body>

<!--Register users-->

<form name="register" method="post" 
	action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
	
	
	<strong> Register Account</strong> <br /><br /> 
	
		
	User name:
		<input type="text" name="username"><br /><br />
	
	Password:
		<input type="text" name="password"><br /><br />
	
		<br /><br />
		<input type = "submit" value = "register" / >
		
	
</form>

<?php

session_start();

//validate registration form

if ( (empty($_POST['username'])) OR (empty($_POST['password'])) )
{
	//if the values are empty - 
	
	echo "<br /> Please fill in all the above inputs";

	}else{
		echo "<br> Process Validation";
		//if the inputs has values
	
		//store the data into local variables
	
		$Username = $_POST['username'];
		$Password = $_POST['password'];
	
		$Check=true;
		
		//Validate password - has to be more than 5 char
		if (strlen($Username) <5 )
		{
			echo "<br> Username or Password is incorrect";
			$Check=false;
		}
	
		//if first name has any special characters
		if (is_numeric($Username))
		{
			echo "<br> error - username has number...";
			$Check=false;
		}
	
		//if username is email format
	
		// Variable to check

		// Validate email
		if(filter_var($_POST['username'],FILTER_VALIDATE_EMAIL)){
		}
		else{
			echo '<br>Invalid email format';
			$Check=false;
		}
	
		//all the password validations
	
		if (strlen($Password) <5 )
		{
			echo "<br> error - password has less than 5 characters";
			$Check=false;
		}
	
		//if all the validation are true then prepare
	
		//to store to online database
		if ($Check == true)
		{
		echo "<br> Checking.....";
		
		require_once('db.php'); //connect the database
		
		$SQL = "SELECT * FROM user WHERE username='$Username' and password='$Password'";
		
		$result = $conn->query($SQL); //execute the SQL query and store the data in $result as an array
		
		if ($result->num_rows>0)
		{
			$_SESSION['username'] = $username;
			//user information available in database
			echo "Login successful";
			echo "<br><br> re-directing to members page";
			header ( 'refresh:5; url=member.php?id='.$Username ); //re-directing to member page
		}
		else{
			//users info not found
			echo "<br> Username or Password incorrect";
		if(isset($_GET['logout'])){
			session_unregister('username');
		}
	}
	
	
}
	
	
	
}

?>


</body>
</html>