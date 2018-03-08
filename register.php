<?php
include "init.php";
if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
	$error_message = 'Passwords should be same<br>'; 
	}

	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "Invalid Email Address";
		}
	}


	if(!isset($error_message)) {
		$conn = Connect::getInstance();
		$query = "INSERT INTO users (username, password, f_name, l_name, email) VALUES
		('" . $_POST["userName"] . "', '" . $_POST["password"] . "', '" . $_POST["f_name"] . "', '" . $_POST["l_name"] . "', '" . $_POST["email"] . "')";
		$result = $conn->query($query);
		if(!empty($result)) {
			$error_message = "";
			$success_message = "You have registered successfully!";	
			$_SESSION['f_name'] = $_POST['f_name'];
			$_SESSION['w'] = "infoUserW";
			header('location:index.php');
			unset($_POST);
		} else {
			$error_message = "Problem in registration. Try Again!";	
		}
	}
}
?>
<html>
<head>
<title>Register here</title>
<link rel="stylesheet" type="text/css" href="styles/stylesheet.css" />
</head>
<body>
<form name="frmRegistration" method="post" action="register.php">
<table border="0" width="500" align="center" class="demo-table">
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<tr>
<td>User Name</td>
<td><input type="text" class="demoInputBox" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
</tr>
<tr>
<td>First Name</td>
<td><input type="text" class="demoInputBox" name="f_name" value="<?php if(isset($_POST['f_name'])) echo $_POST['f_name']; ?>"></td>
</tr>
<tr>
<td>Last Name</td>
<td><input type="text" class="demoInputBox" name="l_name" value="<?php if(isset($_POST['l_name'])) echo $_POST['l_name']; ?>"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" class="demoInputBox" name="password" value=""></td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" class="demoInputBox" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"></td>
</tr>
<tr>
</tr>
<tr>
<td colspan=2>
<input type="submit" name="register-user" value="Register" class="btnRegister"></td>
</tr>
</table>
<a href='index.php'>Have an account, log in here</a>
</form>
</body></html>